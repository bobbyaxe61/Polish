@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="card">
                <h3 class="text-center text-success">{{ config('app.name','Polish') }}{{ env('APP_DOMAIN','.com') }}</h3>
                <div class="card-header"><h2>{{ $doc_info->named ?? '...'}}</h2></div>
                <div class="card-body"> @include('layouts.flash_messages') </div>

                <div class="card-body text-left">
                    @if(isset($doc_info) && !empty($doc_info))
                        <hr/>
                            <h5>Comments</h5>
                            @include('pages.comments', ['comments' => $doc_info->comments, 'doc_id' => $doc_info->id])
                        <hr/>

                        <b>Add Comment</b>
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="body"></textarea>
                                <input type="hidden" name="doc_id" value="{{ $doc_info->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                    @else
                        <hr><h5>No Data Avaliable</h5><hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
