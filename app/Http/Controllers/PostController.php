<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {


        //select * from posts;
        //id, title (Var char), description(TEXT), created_at, updated_at

        $postsFromDB = Post::all(); //collaction object

        return view('index', ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {

        //$singlePostFromDB = Post::where('id', $postId);


        //   $singlePostFromDB = Post::findOrFail($postId); //model object 
        //dd($singlePostFromDB);
        /* $singlePost = [
            'id' => 1,
            'title' => 'Php',
            'posted_by' => 'Faysal',
            'description' => 'dfdfds',
            'created_at' => '2025-01-22 16:15'

        ];*/
        return view('show', ['post' => $post]);
    }

    public function create()
    {

        //select * from users;
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }
    public function store()
    {

        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);

        //        $request = request();
        //
        //        dd($request->title, $request->all());

        //1- get the user data
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        //        dd($data, $title, $description, $postCreator);

        //2- store the submitted data in database
        //        $post = new Post;
        //
        //        $post->title = $title;
        //        $post->description = $description;
        //
        //        $post->save();// insert into posts ('t','d')

        Post::create([
            'title' => $title,
            'description' => $description,
            'xyz' => 'some value', //ignore,
            'user_id' => $postCreator,
        ]);

        //3- redirection to posts.index
        return to_route('posts.index');
    }


    public function edit(Post $post)
    {

        //select * from users;
        $users = User::all();

        return view('posts.edit', ['users' => $users, 'post' => $post]);
    }



    public function update($postId)
    {


        //1- get the user data

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;

        //        dd($title, $description, $postCreator);

        //2- update the submitted data in database
        //select or find the post
        //update the post data
        $singlePostFromDB = Post::find($postId);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);

        //        dd($singlePostFromDB);

        //3- redirection to posts.show

        return to_route('posts.show', $postId);
    }




    public function destroy($postId)
    {
        // Post'u bul ve varsa sil
        $post = Post::find($postId);

        if ($post) {
            $post->delete();
        }

        // Silme işleminden sonra listeye yönlendir
        return to_route('posts.index');
    }
}
