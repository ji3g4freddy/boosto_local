<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
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
        //join the users table and get all the articles
        $articles = Article::join('users','articles.user_id','=','users.id')
                    ->select('articles.*','users.name')
                    ->where('users.id', '=', $loginID )
                    ->get();
        // load the view and pass the articles
        return view('articles.index')
            ->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //
        $request->user()->articles()->create([
                'title' => $request->title,
                'hashtag' => $request->hashtag,
                'content' => $request->content,
                'logo' => $request->logo->getClientOriginalName(),
                'image' =>$request->image->getClientOriginalName()
            ]);
        // $article = article::create($request->all());
        $logoName =  $request->logo->getClientOriginalName();
        $imageName = $request->image->getClientOriginalName();
        $request->logo->move(public_path('img/blog_logo'), $logoName);
        $request->image->move(public_path('img/blog_image'), $imageName);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the article
        $article = Article::find($id);

        // show the view and pass the article to it
        return view('articles.show')
            ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // get the article
        $article = article::find($id);

        // show the edit form and pass the article
        return view('articles.edit')
            ->with('article', $article);
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
        // get the article
        $article = article::find($id);

        // update the edit form
        if($request->hasFile('logo') && $request->hasFile('image')){
            $article ->update([
                'title' => $request->title,
                'hashtag' => $request->hashtag,
                'content' => $request->content,
                'logo' => $request->logo->getClientOriginalName(),
                'image' =>$request->image->getClientOriginalName()
                ]);
                $logoName =  $request->logo->getClientOriginalName();
                $imageName = $request->image->getClientOriginalName();
                $request->logo->move(public_path('img/blog_logo'), $logoName);
                $request->image->move(public_path('img/blog_image'), $imageName);

        }elseif($request->hasFile('logo')){
            $article ->update([
                'title' => $request->title,
                'hashtag' => $request->hashtag,
                'content' => $request->content,
                'logo' => $request->logo->getClientOriginalName(),
                ]);
                $logoName =  $request->logo->getClientOriginalName();
                $request->logo->move(public_path('img/blog_logo'), $logoName);

        }elseif($request->hasFile('image')){
            $article ->update([
                'title' => $request->title,
                'hashtag' => $request->hashtag,
                'content' => $request->content,
                'image' =>$request->image->getClientOriginalName()
                ]);
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('img/blog_image'), $imageName);
        }else{
            $article ->update($request->except('logo','image'));
          }

        // redirect to the show page
        return redirect()->route('blog.show',$id);

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
        $article = article::find($id);
        $article->delete();

        // redirect
        // \Session::flash('message', 'Successfully deleted the article!');
        session()->flash('message', 'Successfully deleted the article!');

        return redirect()->route('articles.index');
    }
}
