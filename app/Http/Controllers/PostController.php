<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        //select * from posts;
        //id, title (Var char), description(TEXT), created_at, updated_at

        $allPosts = [
            ['id' => 1, 'title' => 'Php', 'posted_by' => 'Faysal', 'created_at' => '2025-01-22 16:15'],
            ['id' => 2, 'title' => 'html', 'posted_by' => 'Osman', 'created_at' => '2024-05-03 23:45'],
            ['id' => 3, 'title' => 'css', 'posted_by' => 'ahmet', 'created_at' => '2024-12-12 19:35'],
            ['id' => 4, 'title' => 'python', 'posted_by' => 'muhammet', 'created_at' => '2024-07-04 20:35'],
            ['id' => 5, 'title' => 'java', 'posted_by' => 'ramazan', 'created_at' => '2025-01-11 12:15'],
            ['id' => 6, 'title' => 'JavaScript', 'posted_by' => 'halil', 'created_at' => '2025-03-18 15:35'],
            ['id' => 7, 'title' => 'C#', 'posted_by' => 'mahmut', 'created_at' => '2024-02-23 17:50'],

        ];
        return view('index', ['posts' => $allPosts]);
    }

    public function show($postId)
    {

        $singlePost = [
            'id' => 1,
            'title' => 'Php',
            'posted_by' => 'Faysal',
            'description' => 'dfdfds',
            'created_at' => '2025-01-22 16:15'

        ];
        return view('show', ['post' => $singlePost]);
    }

    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        //        $request = request();
        //
        //        dd($request->title, $request->all());
        //1- get the user data
        $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        //        dd($data, $title, $description, $postCreator);
        //2- store the user data in database
        //3- redirection to posts.index
        return to_route('posts.index');
    }


    public function edit()
    {
        return view('posts.edit');
    }



    public function update()
    {
        //1- get the user data
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->post_creator;
        //dd($title, $description, $postCreator);
        //2- update the user data in database
        //3- redirection to posts.show
        return to_route('posts.show', 1);
    }


    public function destroy()
    {
        //1- delete the post from database
        //2- redirect to posts.index
        return to_route('posts.index');
    }
}
