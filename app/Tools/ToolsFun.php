<?php

namespace App\Tools;
/**
 * Created by PhpStorm.
 * User: sdp
 * Date: 2017/6/14
 * Time: 18:59
 */

class ToolsFun{
    //生成4位数字验证码
    public static function getValiCode(){
        $valicode = "";
        for($i=0;$i<4;$i++){
            $valicode.=(string)rand(0,9);
        }
        return $valicode;
    }

}