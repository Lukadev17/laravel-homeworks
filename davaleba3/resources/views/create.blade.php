@extends('layout.layout')
@section('content')
    <div >
        <form method="post" action="{{route('savePost')}}">
            <h1>Create Post</h1>
            <div class="form-group">
            <label for="post-title">Post Title</label><br>
            <input class="form-control" type="text" id="post-title" name="title"><br>
            </div>
            <div class="form-group">
            <label for="post-text">Post Text</label><br>
            <input class="form-control" type="text" id="post-text" name="post_text">
            </div>
            </br>
            <label for="likes">Likes</label><br>
            <input type="number" id="likes" name="likes">
            <input type="hidden" name="_token" id="csrd_token" value="{{csrf_token()}}">
            <input type="hidden" name="user_id" id="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
            <button style="margin-left: auto; margin-right: auto; display: block"  class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
@endsection

