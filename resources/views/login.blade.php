<!DOCTYPE html>
<html>
<head>
    <title>任务系统</title>
      <script type="text/javascript" src="https://cdn.bootcss.com/jquery/2.0.1/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <style>
            .loginmain{
            width: 500px;
            margin: 100px auto;

            }
            .main{
            position: relative;
            }
            .loginup{
            width: 500px;
            height: 300px;
            background-color: #3487b3;
            border: 1px solid #3487b3;
            border-radius: 5px;
            z-index: 2;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;

            display: none;
            }
    </style>
</head>
<body>
    
            <div class="main">
                <div class="loginmain">
                    <form class="form-horizontal" method="post" name="formlogin">
                        {{ csrf_field() }}
                        <div class="form-group">

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="user" name="user" placeholder="user">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-10">
                                <button type="button" class="btn btn-default col-sm-2" name="submitsingin" id="signin">Sign in</button>
                                <button type="button" class="btn btn-default col-sm-2 col-sm-offset-8"  id="zhuce">Sign up</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="loginup">
                    <form class="form-horizontal" action="/check_register" method="post" name="formzhuce" id="loginup">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="zhuceuser" name="zhuceuser" placeholder="user">
                                <div id="error1"></div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="zhucepwd" name="zhucepwd" placeholder="Password">
                                <div id="error2"></div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="checkpwd" name="checkpwd" placeholder="Password">
                                <div id="error3"></div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <div class="col-sm-8" style="padding: 0">
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="phone">
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-danger" type="button" onclick="send_sms()" id="send_btn">
                                        发送验证码
                                    </button>
                                </div>
                                <div id="error4"></div>
                            </div>
                            <div class="col-sm-"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="yanzheng" name='yanzhengma' placeholder="验证码">
                                <div id="error5"></div>
                            </div>
                            <div class="col-sm-"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-offset-0 col-sm-10">
                                <button type="submit" class="btn btn-default col-sm-2" name="chucesubmit">sign up</button>
                                <button type="button" class="btn btn-default col-sm-2 col-sm-offset-8"  id="zhuceclose">close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</body>
  <script type="text/javascript">
    $(function () {
    $("#zhuce").click(function(){
    $(".loginup").show();
    })
    $("#zhuceclose").click(function(){
    $(".loginup").hide();
    })

    //验证表单
    $("#loginup").submit(function (e) {

    var user=$("#zhuceuser").val();
    var username=/^[a-zA-Z0-9]{6,10}$/;
    if(user.length==0){
    $("#error1").html("账号不可以为空");
    return false;
    }else if(!username.test(user)){
    $("#error1").html("请输入6-10的字母");
    return false;
    }else{
    $("#error1").html("输入正确");
    }

    var password=$("#zhucepwd").val();
    var password1=/^[a-zA-Z0-9]{6,10}$/;
    if(password.length==0){
    $("#error2").html("密码不可以为空");
    return false;
    }else if(!password1.test(password)){
    $("#error2").html("请输入6-10位的字母或数字密码");
    return false;
    }else{
    $("#error2").html("输入正确");
    }

    var checkpwd =$('#checkpwd').val();
    if (checkpwd!==password)
    {
    $("#error3").html("两次输入密码不匹配");
    return false;
    }
    });
    })
    </script>

    <script>
        $("#signin").click(function () {
            var url = '/check_login';
            var phone = $("#user").val();
            var password = $("#pwd").val();
            $.ajax({
                type:'post',
                url: url,
                dataType:'json',
                data: {phone: phone,password: password, _token: "{{csrf_token()}}"},
                success: function (data) {
                    if(data.status==0){
                        location.href="/home";
                    }
                    else{
                        alert("fail");
                    }
                }
            })
        })
        function send_sms() {
            var miao = 10;
            var phone = $('#phone').val();
            if(phone!=""){
                var url ="/sendsms/"+phone;
                $.ajax({
                    type:'get',
                    url:url,
                    dataType:"json",
                    success: function (data) {
                        if(data.error=='0'){
                            var time = setInterval(function() {
                                miao--;
                                if(miao == 0){
                                    miao =10;
                                    window.clearInterval(time);
                                    $("#send_btn").text("发送验证码");
                                    $("#send_btn").attr("disabled", false);
                                }else{
                                    $("#send_btn").text(miao+"S后再发送");
                                    $("#send_btn").attr("disabled", true);
                                }
                            },1000);
                        }
                        else{
                            alert("出现异常");
                        }
                    }
                })
            }
        }
    </script>

</html>
  