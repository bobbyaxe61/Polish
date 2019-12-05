@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><h2>Dashboard</h2></div>
                <div class="card-body"> @include('layouts.flash_messages') </div>

                <div class="row justify-content-space-around">
                    @if(isset($user_data) && !empty($user_data))
                        @foreach ($user_data as $key => $value)
                            <div class="row">
                                <div class="col-md-6">
                                    {{ $value[2] }}
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('/show').'/'.$value[1] }}">
                                        <button type="button" class="block btn btn-success btn-md">View</button>
                                    </a>
                                    <a 
                                        href="{{ url('storage').'/'.$value[0] }}" 
                                        class="block btn btn-primary btn-md"
                                        download="{{$value[1]}}">
                                        Download
                                    </a>
                                    <form action="{{url('/delete').'/'.$value[1]}}" method="POST" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="block btn btn-danger btn-md">Delete</button>
                                    </form>
                                </div>
                            </div><hr>
                        @endforeach
                    @else
                        <hr><h5>No Data Avaliable</h5><hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
