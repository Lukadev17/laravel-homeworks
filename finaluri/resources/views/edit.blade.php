@extends('layout.layoutWithNavbar')
@section('content')
    <div>
        <form method="post" action="{{route('updatePost', $post->id)}}">
            @method('PUT')
            <h1>Edit Post</h1>
            <div class="form-group">
                <label for="post-title">Post Title</label><br>
                <input type="text" class="form-control" id="post-title" name="title" value="{{old('title', $post->title)}}"><br>
            </div>
            <div class="form-group">
                <label for="post-text">Post Text</label><br>
                <input type="text" class="form-control" id="post-text" name="post_text" value="{{old('post_text', $post->post_text)}}"><br>
            </div>
            <label for="post-likes">Likes</label><br>
            <input type="number" id="likes" name="likes" value="{{old('likes', $post->likes)}}"><br>
            <input type="hidden" name="_token" id="csrd_token" value="{{csrf_token()}}"><br>
            <button class="btn btn-primary"  style="margin-left: auto; margin-right: auto; display: block" type="submit">Update Post</button>
        </form>
    </div>
@endsection
