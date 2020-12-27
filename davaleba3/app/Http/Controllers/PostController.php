<?php

namespace App\Http\Controllers;

use App\Mail\OrderShippedMail;
use App\Models\Post;
use App\Models\User;
use App\Notifications\OrderShippedNotification;
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
        $user = User::findOrFail(Auth::id());
        $posts = DB::table('posts')->where('user_id', $user->id)->get();

        return view('myposts')->with('posts', $posts);
    }

    public function show($id) {
        $post = Post::findOrFail($id);

        return view('post')->with('post', $post);
    }

    public function create() {
        return view('create');
    }

    public function save(Request $request) {
        $post = new Post($request->all());

        $post->save();
        $user = User::findOrFail(Auth::id());
        $posts = DB::table('posts')->where('user_id', $user->id)->get();
        return view('myposts')->with('posts', $posts);
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
        return view('myposts')->with('posts', $posts);

    }

    public function approve(Post $post, Request $request) {
        $data = [
            'postTitle' => $post->title
        ];

        $this->authorize("approve", $post);
        $post->is_approved = true;
        $post->save();
        $user = User::find(1);
        $user->notify(new OrderShippedNotification($data));
        $mail = new MailController();
        $mail->send($data, $request);
        return redirect()->route('posts');
//        return response(ok,200);
    }

    public function delete(Post $post) {
        $post->delete();
        $user = User::findOrFail(Auth::id());
        $posts = DB::table('posts')->where('user_id', $user->id)->get();
        return view('myposts')->with('posts', $posts);

    }
}
