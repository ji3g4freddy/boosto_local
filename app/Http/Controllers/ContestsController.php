<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contest;
use App\Http\Requests\ContestRequest;
use Illuminate\Support\Facades\Auth;
use Mail;
use Session;

class ContestsController extends Controller
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
        //join the users table and get all the contests
        $contests = Contest::join('users','contests.user_id','=','users.id')
                    ->select('contests.*','users.name')
                    ->where('users.id', '=', $loginID )
                    ->get();
        $s_contests = Contest::join('users','contests.user_id','=','users.id')
                    ->select('contests.*','users.name')
                    ->orderBy('contests.verify', 'asc')
                    ->get();   
        // load the view and pass the contests
        return view('contests.index')
            ->with('contests', $contests)
            ->with('s_contests', $s_contests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContestRequest $request)
    {
        //
        $request->user()->contests()->create([
                'title' => $request->title,
                'office' => $request->office,
                'deadline' => $request->deadline,
                'intro' => $request->intro,
                'info' => $request->info,
                'register' => $request->register,
                'link' => $request->link,
                'logo' => $request->logo->getClientOriginalName(),
                'image' =>$request->image->getClientOriginalName()
            ]);

        $logoName =  $request->logo->getClientOriginalName();
        $imageName = $request->image->getClientOriginalName();
        $request->logo->move(public_path('img/competition_logo'), $logoName);
        $request->image->move(public_path('img/competition_image'), $imageName);

        return redirect()->route('contests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the contest
        $contest = contest::find($id);

        // show the view and pass the contest to it
        return view('contests.show')
            ->with('contest', $contest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // get the contest
        $contest = contest::find($id);

        // show the edit form and pass the contest
        return view('contests.edit')
            ->with('contest', $contest);
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
        // get the contest
        $contest = contest::find($id);

        // update the edit form
        if($request->hasFile('logo') && $request->hasFile('image')){
            $contest ->update([
                'title' => $request->title,
                'office' => $request->office,
                'deadline' => $request->deadline,
                'intro' => $request->intro,
                'info' => $request->info,
                'register' => $request->register,
                'link' => $request->link,
                'logo' => $request->logo->getClientOriginalName(),
                'image' =>$request->image->getClientOriginalName()
                ]);
                $logoName =  $request->logo->getClientOriginalName();
                $imageName = $request->image->getClientOriginalName();
                $request->logo->move(public_path('img/competition_logo'), $logoName);
                $request->image->move(public_path('img/competition_image'), $imageName);

        }elseif($request->hasFile('logo')){
            $contest ->update([
                'title' => $request->title,
                'office' => $request->office,
                'deadline' => $request->deadline,
                'intro' => $request->intro,
                'info' => $request->info,
                'register' => $request->register,
                'link' => $request->link,
                'logo' => $request->logo->getClientOriginalName(),
                ]);
                $logoName =  $request->logo->getClientOriginalName();
                $request->logo->move(public_path('img/competition_logo'), $logoName);

        }elseif($request->hasFile('image')){
            $contest ->update([
                'title' => $request->title,
                'office' => $request->office,
                'deadline' => $request->deadline,
                'intro' => $request->intro,
                'info' => $request->info,
                'register' => $request->register,
                'link' => $request->link,
                'image' =>$request->image->getClientOriginalName()
                ]);
                $imageName = $request->image->getClientOriginalName();
                $request->image->move(public_path('img/competition_image'), $imageName);
        }else{
            $contest ->update($request->except('logo','image'));
          }

        // redirect to the show page
        return redirect()->route('competition.show',$id);

    }

    public function verify($id)
    {
        // delete
        $contest = Contest::find($id);
        $contest->update(['verify' => 1]);

        // redirect
        // \Session::flash('message', 'Successfully deleted the contest!');
        session()->flash('message', '成功完成審核!');

        return redirect()->route('contests.index');
    }
    public function verify_no($id)
    {
        // delete
        $contest = Contest::find($id);
        $contest->update(['verify' => 2]);

        // redirect
        // \Session::flash('message', 'Successfully deleted the contest!');
        session()->flash('message', '請通知該用戶審核未通過原因!');

        return redirect()->route('contests.index');
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
        $contest = contest::find($id);
        $contest->delete();

        // redirect
        // \Session::flash('message', 'Successfully deleted the contest!');
        session()->flash('message', 'Successfully deleted the contest!');

        return redirect()->route('contests.index');
    }
}
