<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Lib\REST;
use App\Tools\ToolsFun;
use App\Model\Valicodes;
use App\Model\Members;
use App\Tools\M3result;

class MemberController extends Controller
{

    public function login(Request $request){
        $phone = $request->input("phone",'');
        $password = $request->input('password','');
        $m3 = new M3result();
        $member = new Members();
        $pwd =  $member->where('phone',$phone)->first()->password;

        if (md5($password)==$pwd){
            $request->session()->put("member",$member);
            $m3->status = 0;
            $m3->message ="登录成功";
            return $m3->toJson();
        }
        else{
            echo "fail";
        }

    }

    public function sendsms($phone){
        $valicode =  ToolsFun::getValiCode();
        $this->sendTemplateSMS($phone,array($valicode,'1'),'1');
        $valicodeModel = new Valicodes();
        $valicodeModel->valicode = $valicode;
        $valicodeModel->phone = $phone;
        $valicodeModel->save();
        return json_encode(array('error'=>'0',"message"=>"ok"));


    }

    public function register(Request $request){
         $valicodeModel = new Valicodes();
         $valicode = $valicodeModel->where('phone','15697323025')->orderBy("created_at","desc")->first();
         $vcode = $valicode->valicode;
         $yanzhengma = $request->input("yanzhengma");
        if ($vcode == $yanzhengma){
            $user_name = $request->input("zhuceuser",'');
            $pwd = $request->input("zhucepwd",'');
            $phone = $request->input('phone','');
            $member = new Members();
            $member->user_name = $user_name;
            $member->password = md5($pwd);
            $member->phone = $phone;

            if($member->save()){
                echo "ok";
            }
            else{
                echo "fail";
            }

        }
        else{
            echo "码不对";
        }


    }

    public function sendTemplateSMS($to,$datas,$tempId)
    {
        //主帐号,对应开官网发者主账号下的 ACCOUNT SID
        $accountSid= '8a216da85c09e9ba015c1a48cf5f08be';

//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        $accountToken= '32588133269148229f0f1940bcd2e3fd';

//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        $appId='8aaf07085c9b999c015ca1715ed0053b';

//请求地址
//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
//生产环境（用户应用上线使用）：app.cloopen.com
        $serverIP='app.cloopen.com';


//请求端口，生产环境和沙盒环境一致
        $serverPort='8883';

//REST版本号，在官网文档REST介绍中获得。
        $softVersion='2013-12-26';
        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            echo "result error!";
        }
        if($result->statusCode!=0) {
            echo "error code :" . $result->statusCode . "<br>";
            echo "error msg :" . $result->statusMsg . "<br>";
            //TODO 添加错误处理逻辑
        }else{

        }
    }

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
