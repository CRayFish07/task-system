<?php

namespace App\Http\Controllers\View;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Usernotice;
use App\Model\Band;
use App\Model\Members;

class HomeController extends Controller
{

    public function home(){
       $user = session("member");
       $band = Band::where("boss_id",$user->member_id)->where('status',0)->get();
       $bossf = Band::where("under_id",$user->member_id)->lists('boss_id');
       $bossfriend = Members::whereIn("member_id",$bossf)->get();
       $underf = Band::where("boss_id",$user->member_id)->lists('under_id');
       $underfriend = Members::whereIn("member_id",$underf)->get();
       return View("home")->with('user',$user)->with('band',$band)->with('bossfriend',$bossfriend)->with("underfriend",$underfriend);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
