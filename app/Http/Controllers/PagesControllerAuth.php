<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PagesModel;
use App\SettingsModel;
use Illuminate\Support\Facades\Storage;
use App\Http\Helpers\PhpWordCounter;
use App\RecycleBinModel;
use App\CommentsModel;

class PagesControllerAuth extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_data = PagesModel::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
        $doc_info = array();

        if ($user_data->isNotEmpty())
        {
            foreach ($user_data as $userdata)
            {
                $named = substr($userdata->doc_name,0,strrpos($userdata->doc_name,'_'));
                $doc_info[$userdata->doc_name] = [$userdata->doc_location, $userdata->id, $named];
            }
            return view('pages.dashboard')->with('user_data', $doc_info);
        }
        else
        {
            return view('pages.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.uploads');
    }

    /**
     * examine a resource to be stored.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function examine(Request $request)
    { 
        // Validate Request
        $request->validate([
            'user_file' => 'required|max:1999',
            'cloudstorage' => 'required_without_all:proofreading,copyediting,publishing'
        ]);

        // Get Number Of Pages In Document
        $no_of_pages = CountWords($request->file('user_file'), $request->file('user_file')->getClientOriginalExtension());


        // Get Price List
        $pricing = SettingsModel::where('genre','pricing')->where('name','services')->get();

        if ($pricing->isNotEmpty())
        {
            foreach ($pricing as $key)
            {
                $price_list = json_decode($key->value, true);
            }
        }
        else
        {
            $price_list = ['proofreading' => 0,'copyediting' => 0,'publishing' => 0,'cloudstorage' => 0];
        }


        // Get Selected Check Boxes With Calculated Service Price
        $user_input = $request->toArray();
        $checked_boxes = array();
        $service_price = array();

        foreach($user_input as $name => $value)
        {
            if ($value === 'on')
            {
                if ($price_list[$name])
                {
                    $price = $no_of_pages * $price_list[$name];
                    $service_price[$name] = $price;
                }
                
                $checked_boxes[] = $name;
            }
        }

        // Handle File Upload
        if($request->hasFile('user_file'))
        {
            $doc_name_ext = $request->file('user_file')->getClientOriginalName();
            $doc_name = pathinfo($doc_name_ext, PATHINFO_FILENAME);
            $file_ext = $request->file('user_file')->getClientOriginalExtension();
            $doc_name_to_store = $doc_name.'_'.time().'.'.$file_ext;

            // Temporal Store
            $path = $request->file('user_file')->storeAS('public/temp_user_files', $doc_name_to_store);

            // Return Response
            $evaluation_outcome = (object)
            [
                'doc_name' => $doc_name_to_store,
                'doc_location' => 'public/temp_user_files/'.$doc_name_to_store,
                'checked_boxes' => $checked_boxes,
                'service_price' => $service_price
            ];

            // Save Retrun Response To Session
            $request->session()->put('evaluation_outcome', $evaluation_outcome);

            return view('pages.uploads')->with('evaluation_outcome', $evaluation_outcome);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate Session Data
        if ($request->session()->has('evaluation_outcome'))
        {
            //Get Specific Session Data
            $evaluation_outcome = $request->session()->get('evaluation_outcome');
            $request->session()->forget('evaluation_outcome');

            //Moving Saved File To Permanent Location
            if (Storage::exists($evaluation_outcome->doc_location))
            {
                // Move File To Permanent Location
                Storage::move($evaluation_outcome->doc_location, 'public/user_files/'.$evaluation_outcome->doc_name);

                // Store New Document
                $user_data = new PagesModel;
                $user_data->user_id = auth()->user()->id;
                $user_data->doc_name = $evaluation_outcome->doc_name;
                $user_data->doc_details = json_encode([
                    'checked_boxes' => $evaluation_outcome->checked_boxes,
                    'service_price' => $evaluation_outcome->service_price
                ]);
                $user_data->doc_location = 'user_files/'.$evaluation_outcome->doc_name;
                $user_data->save();
                
                session()->flash('success', 'Task was successful!');
                return view('pages.uploads');
            }
            else
            {
                session()->flash('error', 'Task was unsuccessful!');
                return view('pages.uploads');
            }
        }
        else
        {
            session()->flash('error', 'Task was unsuccessful!');
            return view('pages.uploads');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_data = PagesModel::find($id);
        $doc_info = new \stdClass;

        if (!is_null($user_data) && $user_data->user_id == auth()->user()->id)
        {
            $doc_info->id         = $user_data->id;
            $doc_info->name       = $user_data->doc_name;
            $doc_info->named      = substr($user_data->doc_name,0,strrpos($user_data->doc_name,'_'));
            $doc_info->location   = $user_data->doc_location;
            $doc_info->details    = json_decode($user_data->doc_details, true);
            $doc_info->comments   = $user_data->comments();

            return view('pages.details')->with('doc_info', $doc_info);
        }
        else
        {
            return view('pages.details');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get Specific ID Data To Delete
        $user_data = PagesModel::find($id);
        $comments = CommentsModel::where('doc_id',$id);

        if (!is_null($user_data) && $user_data->user_id == auth()->user()->id)
        {
            //List ID Data
            $user_id = $user_data->user_id;
            $doc_name = $user_data->doc_name;
            $doc_details = $user_data->doc_details;
            $doc_location = $user_data->doc_location;

            $user_data->delete();
            if (!is_null($comments)){$comments->delete();}
           

            //Moving Saved File To Recycle Bin
            if (Storage::exists('public/'.$doc_location))
            {
                // Move File To New Permanent Location
                //Storage::move('public/'.$doc_location, 'public/recycle_bin/'.$doc_name);

                // Store New Document
                $user_data = new RecycleBinModel;
                $user_data->user_id = $user_id;
                $user_data->doc_name = $doc_name;
                $user_data->doc_details = $doc_details;
                $user_data->doc_location = 'recycle_bin/'.$doc_name;
                //$user_data->save();
                
                session()->flash('success', 'Task was successful!');
                return $this->index();
            }
            else
            {
                session()->flash('error', 'Task was unsuccessful!');
                return $this->index();
            }
        }
        else
        {
            session()->flash('error', 'Task was unsuccessful!');
            return $this->index();
        }
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function commentary(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        CommentsModel::create($input);
   
        return back();
    }
}