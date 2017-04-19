<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the posts
        // $posts = Post::all();
        //$posts = DB::table('posts')->get();
        $posts = new POST();
        //一些條件
        $posts = $posts -> join('users','users.id','=','posts.user_id');
        $posts = $posts -> get();
        //$posts = Post::where('user_id', $request->user()->id)->get();

        // load the view and pass the posts
        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $request->user()->posts()->create([
                'title' => $request->title,
                'content' => $request->content
            ]);
        // $post = Post::create($request->all());

        return redirect()->route('posts.index');
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
        $post = Post::find($id);

        // show the view and pass the post to it
        return view('posts.show')
            ->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // get the post
        $post = Post::find($id);

        // show the edit form and pass the post
        return view('posts.edit')
            ->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get the post
        $post = Post::find($id);

        // update the edit form
        $post ->update($request->all());
        // redirect to the show page
        return redirect()->route('posts.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $post = Post::find($id);
        $post->delete();

        // redirect
        // \Session::flash('message', 'Successfully deleted the post!');
        session()->flash('message', 'Successfully deleted the post!');

        return redirect()->route('posts.index');
    }
}
