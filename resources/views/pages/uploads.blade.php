@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><h2>Uploads</h2></div>

                <div class="card-body">
                    @include('layouts.flash_messages');
                </div>
                <div>
                    <form action="{{ url('/examine') }}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="newfile" class="col-md-4 col-form-label text-left">Upload</label>
                                <input type="file" class="form-control" name="user_file" id="newfile" placeholder="" value="" required="">
                                <div class="invalid-feedback">
                                    Only files With &nbsp;<strong>.doc &nbsp;&nbsp; .docx &nbsp;&nbsp; .txt</strong>&nbsp; Extensions Are Supported.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <hr>
                                <div class="row">
                                    <div class="col-md-3 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="proofreading" id="proofreading">
                                        <label class="custom-control-label" for="proofreading">Proofreading</label>
                                    </div>
                                    <div class="col-md-3 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="copyediting" id="copyediting">
                                        <label class="custom-control-label" for="copyediting">Copy Editing</label>
                                    </div>
                                    <div class="col-md-3 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="publishing" id="publishing">
                                        <label class="custom-control-label" for="publishing">Publishing</label>
                                    </div>
                                    <div class="col-md-3 custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="cloudstorage" checked="" id="cloudstorage">
                                        <label class="custom-control-label" for="cloudstorage">Cloud Storage</label>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn btn-primary btn-md btn-block">Evaluate</button>
                            </div>
                        </div>
                    </form>
                    
                    <hr class="col-md-12">
                    @if(isset($evaluation_outcome))
                        <form action="{{ url('/store') }}" enctype="multipart/form-data" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    Your script has been evaluated and price tagged as follows:<br>
                                    For Cloud Storage :Free, For Proofreading: ${{ $evaluation_outcome->service_price['proofreading'] ?? ''}}, For Copy Editing: ${{ $evaluation_outcome->service_price['copyediting'] ?? '' }} and For Publishing: To Be Negotiated.<br>
                                </div>
                                <br>
                                <div class="col-md-4 mb-3">
                                    <button type="submit" class="btn btn-primary btn-md btn-block">Agreed</button>
                                </div>
                            </div>
                        </form>
                    @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection