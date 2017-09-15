<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Display in the admin
    public function index()
    {
        $loginID = Auth::id();
        //join the users table and get all the posts
        $posts = POST::join('users','posts.user_id','=','users.id')
                    ->select('posts.*','users.name')
                    ->where('users.id', '=', $loginID )
                    ->get();
        $s_posts = POST::join('users','posts.user_id','=','users.id')
                    ->select('posts.*','users.name')
                    ->orderBy('posts.verify', 'asc')
                    ->get();        
        // load the view and pass the posts
        return view('posts.index')
            ->with('posts', $posts)
            ->with('s_posts', $s_posts);
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
        if($request->hasFile('logo')){
            $logoName =  $request->logo->getClientOriginalName();
            $request->logo->move(public_path('img/logo'), $logoName);
        }else{
            $logoName = '';
        }
        if($request->hasFile('image')){
            $imageName = $request->image->getClientOriginalName();
            $request->image->move(public_path('img/studio'), $imageName);
        }else{
            $imageName = '';
        }
        $request->user()->posts()->create([
                'studio' => $request->studio,
                'content' => $request->content,
                'equip' => $request->equip,
                'level' => $request->level,
                'price' => $request->price,
                'place' => $request->place,
                'style1' => $request->style1,
                'style2' => $request->style2,
                'style3' => $request->style3,
                'link1' => $request->link1,
                'link2' => $request->link2,
                'link3' => $request->link3,
                'logo' => $logoName,
                'image' => $imageName
                //'logo' => $request->logo->getClientOriginalName(),
                //'image' =>$request->image->getClientOriginalName()
            ]);
        // $post = Post::create($request->all());
        
        // $request->file('image')->getClientOriginalExtension();
        // $request->file('image')->move(public_path('img'));
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
        if($request->hasFile('logo') && $request->hasFile('image')){
            $post ->update([
                'studio' => $request->studio,
                'content' => $request->content,
                'equip' => $request->equip,
                'level' => $request->level,
                'price' => $request->price,
                'place' => $request->place,
                'style1' => $request->style1,
                'style2' => $request->style2,
                'style3' => $request->style3,
                'link1' => $request->link1,
                'link2' => $request->link2,
                'link3' => $request->link3,
                'logo' => $request->logo->getClientOriginalName(),
                'image' =>$request->image->getClientOriginalName()
                ]);
                // $post = Post::create($request->all());
                $logoName =  $request->logo->getClientOriginalName();
                $imageName = $request->image->getClientOriginalName();
                $request->logo->move(public_path('img/logo'), $logoName);
                $request->image->move(public_path('img/studio'), $imageName);

        }elseif($request->hasFile('logo')){
            $post ->update(['studio' => $request->studio,
                'content' => $request->content,
                'equip' => $request->equip,
                'level' => $request->level,
                'price' => $request->price,
                'place' => $request->place,
                'style1' => $request->style1,
                'style2' => $request->style2,
                'style3' => $request->style3,
                'link1' => $request->link1,
                'link2' => $request->link2,
                'link3' => $request->link3,
                'logo' => $request->logo->getClientOriginalName(),
                ]);
                // $post = Post::create($request->all());
                $logoName =  $request->logo->getClientOriginalName();
                $request->logo->move(public_path('img/logo'), $logoName);

        }elseif($request->hasFile('image')){
            $post ->update([
                'studio' => $request->studio,
                'content' => $request->content,
                'equip' => $request->equip,
                'level' => $request->level,
                'price' => $request->price,
                'place' => $request->place,
                'style1' => $request->style1,
                'style2' => $request->style2,
                'style3' => $request->style3,
                'link1' => $request->link1,
                'link2' => $request->link2,
                'link3' => $request->link3,
                'image' =>$request->image->getClientOriginalName()
                ]);
                // $post = Post::create($request->all());
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('img/studio'), $imageName);
        }else{
            $post ->update($request->except('logo','image'));
          }

        // redirect to the show page
        return redirect()->route('posts.show',$id);

    }
    public function verify($id)
    {
        // delete
        $post = Post::find($id);
        $post->update(['verify' => 1]);

        // redirect
        // \Session::flash('message', 'Successfully deleted the post!');
        session()->flash('message', '成功完成審核!');

        return redirect()->route('posts.index');
    }
    public function verify_no($id)
    {
        // delete
        $post = Post::find($id);
        $post->update(['verify' => 2]);

        // redirect
        // \Session::flash('message', 'Successfully deleted the post!');
        session()->flash('message', '請通知該用戶審核未通過原因!');

        return redirect()->route('posts.index');
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
        session()->flash('message', '成功刪除錄音室!');

        return redirect()->route('posts.index');
    }
}
