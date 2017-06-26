<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Band;
use App\Model\Members;
use App\Tools\M3result;
use App\Http\Controllers\Controller;
use App\Websend;

class BandController extends Controller
{
    public function to_band(Request $request,$phone)
    {
        //号码不存在的
        //是否已经绑定
        $m3 = new M3result();
        $user = session('member');
        $boosMember = Members::where("phone",$phone)->first();
        if ($boosMember !=null) {
              $band = Band::where('under_id',$user->id)->where('boss_id',$boosMember->id)->first();
            if ($band != null) {
              $m3->status =1;
              $m3->message= "已存在";
              return $m3->toJson();
             }
           
            //存进BIND表
            else{
                $newBand = new Band();
                $newBand->boss_id = $boosMember->id;
                $newBand->under_id = $user->id;
                $newBand->status = 0;
                $newBand->send_name = $user->user_name;
                $newBand->save();
                Websend::send($user->user_name);
                $m3->status = 0;
                $m3->message= "已发送请求";
                return $m3->toJson();

            }
        }
        else{ 

              $m3->status =1;
              $m3->message= "不存在的电话号码";
              return $m3->toJson();
        }
      
        //站内信通知
        
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
