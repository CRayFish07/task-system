<?php
namespace App\Tools;
/**
 * Created by PhpStorm.
 * User: sdp
 * Date: 2017/6/20
 * Time: 21:17
 */
class M3result{
    public $status;
    public $message;


    public function toJson(){
        return json_encode($this,JSON_UNESCAPED_UNICODE);
    }

}