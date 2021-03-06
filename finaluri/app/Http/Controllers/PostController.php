<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddPostRequest;
use App\Models\Post;
use App\Models\User;
use App\Notifications\AddPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('posts')->with('posts', $posts);
    }

    public function myPosts() {
        $posts = Post::where('user_id', '=', Auth::id())->get();
        return view('myposts')->with('posts', $posts);
    }

    public function show($id) {
        $post = Post::findOrFail($id);

        return view('post')->with('post', $post);
    }

    public function create() {
        return view('create');
    }

    public function save(AddPostRequest $request) {
        $validated = $request->validated();
        $post = new Post($validated);
        $post->user_id = Auth::id();
        $post->likes = $request->likes;
        $post->save();
        $data = [
            'postId' => $post->id,
        ];

        $user = User::find(Auth::id());
        $user->notify(new AddPost($data));

        $posts = DB::table('posts')->where('user_id', $user->id)->get();
        return redirect()->action([PostController::class, 'myPosts']);
    }

    public function edit($id) {
        $post = Post::findOrFail($id);

        return view('edit')->with('post', $post);
    }

    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        $user = User::findOrFail(Auth::id());
        $posts = DB::table('posts')->where('user_id', $user->id)->get();
        return redirect()->action([PostController::class, 'myPosts']);

    }

    public function delete(Post $post) {
        $post->delete();
        $user = User::findOrFail(Auth::id());
        $posts = DB::table('posts')->where('user_id', $user->id)->get();
        return redirect()->action([PostController::class, 'myPosts']);

    }
}
