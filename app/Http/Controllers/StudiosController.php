<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Http\Requests\PostRequest;

class StudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Display in the admin
    public function index()
    {
        //join the users table and get all the posts
        $studios = POST::join('users','posts.user_id','=','users.id')
                    ->select('posts.*','users.name')
                    ->get();
        // load the view and pass the posts
        return view('studio.index')
            ->with('studio', $studios);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the post
        $studio = Post::find($id);

        // show the view and pass the post to it
        return view('studio.show')
            ->with('studio', $studio);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Display in the admin
    public function welcome()
    {
        //join the users table and get all the posts
        $studios = POST::join('users','posts.user_id','=','users.id')
                    ->select('posts.*','users.name')
                    ->orderBy('updated_at', 'desc')
                    ->take(3)
                    ->get();
        // load the view and pass the posts
        return view('welcome')
            ->with('studio', $studios);
    }
}
