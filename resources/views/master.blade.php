<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/2.0.1/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/ace.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <script src='//cdn.bootcss.com/socket.io/1.3.7/socket.io.js'></script>
    <script src="layer/layer.js"></script>
    @yield('style')
    <title>@yield('title')</title>
    <style type="text/css">
       #navbar{
        height: 45px;
       }
       .page{
            margin-left: 190px;
    margin-right: 0;
    margin-top: 0;
    min-height: 100%;
    padding: 0;
       }
    </style>
</head>
<body>
<!-- 顶部菜单（来自bootstrap官方Demon）==================================== -->
 <div class="navbar navbar-default" id="navbar">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>

            <div class="navbar-container" id="navbar-container">
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <i class="icon-leaf"></i>
                            Ace Admin
                        </small>
                    </a><!-- /.brand -->
                </div><!-- /.navbar-header -->

                <div class="navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="relation">
                              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-group"></i>
                                <span class="badge badge-grey">{{count($bossfriend)+count($underfriend)}}</span>
                            </a>
                              <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="icon-warning-sign"></i>
                                     你的好友
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                                                 上司
                                            </span>
                                            <span class="pull-right badge badge-info">{{count($bossfriend)}}</span>
                                        </div>
                                    </a>
                                       <ul class="" id="shangsi" style="cursor: pointer;">
                                       @for($j=0;$j<count($bossfriend);$j++)
                                          <li><a href="#">{{$bossfriend[$j]->user_name}}</a></li>
                                       @endfor
                                       </ul>
                                </li>

                                  <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                                                下属
                                            </span>
                                            <span class="pull-right badge badge-info">{{count($underfriend)}}</span>
                                        </div>
                                    </a>
                                     <ul class="" id="shangsi" style="cursor: pointer;">
                                         @for($j=0;$j<count($underfriend);$j++)
                                          <li><a href="#">{{$underfriend[$j]->user_name}}</a></li>
                                       @endfor
                                       </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="grey">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-tasks"></i>
                                <span class="badge badge-grey">4</span>
                            </a>

                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="icon-ok"></i>
                                    4 Tasks to complete
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Software Update</span>
                                            <span class="pull-right">65%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:65%" class="progress-bar "></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Hardware Upgrade</span>
                                            <span class="pull-right">35%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:35%" class="progress-bar progress-bar-danger"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Unit Testing</span>
                                            <span class="pull-right">15%</span>
                                        </div>

                                        <div class="progress progress-mini ">
                                            <div style="width:15%" class="progress-bar progress-bar-warning"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <div class="clearfix">
                                            <span class="pull-left">Bug Fixes</span>
                                            <span class="pull-right">90%</span>
                                        </div>

                                        <div class="progress progress-mini progress-striped active">
                                            <div style="width:90%" class="progress-bar progress-bar-success"></div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        See tasks with details
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="purple">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-bell-alt icon-animated-bell"></i>
                                <span class="badge badge-important">{{count($band)}}</span>
                            </a>

                            <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close" id="messages">
                                <li class="dropdown-header">
                                    <i class="icon-warning-sign"></i>
                                    {{count($band)}} Notifications
                                </li>
                                @if ($band!=null)
                                    @for($i=0;$i<count($band);$i++)
                                          <li class="bandmsg">
                                            <a href="javascript:;" class="msg{{$band[$i]->id}}">
                                                <div class="clearfix">
                                                    <span class="pull-left">
                                                <i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                                                        <i>{{$band[$i]->send_name}}想绑定你为BOSS</i>
                                                        <input type="hidden" value="{{$band[$i]->content}}" id="hiddata">
                                                        <input type="hidden" value="{{$band[$i]->send_name}}"  id="msgdata">
                                                        <input type="hidden" value="{{$band[$i]->under_id}}"  id="send_id">
                                                        <input type="hidden" value="{{$band[$i]->boss_id}}"  id="boss_id">
                                                </span>
                                                    <span class="pull-right badge badge-info"></span>
                                                    </div>
                                                </a>
                                            </li>
                                    @endfor
                                    @endif
                            </ul>
                        </li>

                        <li class="green">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon-envelope icon-animated-vertical"></i>
                                <span class="badge badge-success">5</span>
                            </a>

                            <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                                <li class="dropdown-header">
                                    <i class="icon-envelope-alt"></i>
                                    5 Messages
                                </li>

                                <li>
                                    <a href="#">
                                        <img src="assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar">
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Alex:</span>
                                                Ciao sociis natoque penatibus et auctor ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>a moment ago</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <img src="assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar">
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Susan:</span>
                                                Vestibulum id ligula porta felis euismod ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>20 minutes ago</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <img src="assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar">
                                        <span class="msg-body">
                                            <span class="msg-title">
                                                <span class="blue">Bob:</span>
                                                Nullam quis risus eget urna mollis ornare ...
                                            </span>

                                            <span class="msg-time">
                                                <i class="icon-time"></i>
                                                <span>3:15 pm</span>
                                            </span>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="inbox.html">
                                        See all messages
                                        <i class="icon-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="light-blue">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="assets/avatars/upload/p1.jpg" alt="Jason's Photo">
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    {{$user->user_name}}
                                </span>

                                <i class="icon-caret-down"></i>
                            </a>

                            <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="icon-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="icon-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="#">
                                        <i class="icon-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- /.ace-nav -->
                </div><!-- /.navbar-header -->
            </div><!-- /.container -->
        </div>
    <div class="main-container" id="main-container">
        <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
                    <span class="menu-text"></span>
                </a>
            <div class="sidebar" id="sidebar">
                    <script type="text/javascript">
                        try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                    </script>

                    <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                            <button class="btn btn-success">
                                <i class="icon-signal"></i>
                            </button>

                            <button class="btn btn-info">
                                <i class="icon-pencil"></i>
                            </button>

                            <button class="btn btn-warning">
                                <i class="icon-group"></i>
                            </button>

                            <button class="btn btn-danger">
                                <i class="icon-cogs"></i>
                            </button>
                        </div>

                        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                            <span class="btn btn-success"></span>

                            <span class="btn btn-info"></span>

                            <span class="btn btn-warning"></span>

                            <span class="btn btn-danger"></span>
                        </div>
                    </div><!-- #sidebar-shortcuts -->

                    <ul class="nav nav-list">
                        <li class="active" id="bind">
                            <a href="javascript:;">
                                <i class="icon-exchange"></i>
                                <span class="menu-text"> 绑定上司 </span>
                            </a>
                        </li>

                        <li>
                            <a href="typography.html">
                                <i class=" icon-circle-arrow-right "></i>
                                <span class="menu-text"> 发送任务 </span>
                            </a>
                        </li>
                          <li>
                            <a href="typography.html">
                                <i class="icon-tasks"></i>
                                <span class="menu-text"> 我的任务 </span>
                            </a>
                        </li>
                          <li>
                            <a href="typography.html">
                                <i class="icon-flag-alt"></i>
                                <span class="menu-text"> 自己的计划 </span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-desktop"></i>
                                <span class="menu-text">我的任务</span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="elements.html">
                                        <i class="icon-double-angle-right">自己的计划</i>
                                        组件
                                    </a>
                                </li>

                                <li>
                                    <a href="buttons.html">
                                        <i class="icon-double-angle-right"></i>
                                        按钮 &amp; 图表
                                    </a>
                                </li>

                                <li>
                                    <a href="treeview.html">
                                        <i class="icon-double-angle-right"></i>
                                        树菜单
                                    </a>
                                </li>

                                <li>
                                    <a href="jquery-ui.html">
                                        <i class="icon-double-angle-right"></i>
                                        jQuery UI
                                    </a>
                                </li>

                                <li>
                                    <a href="nestable-list.html">
                                        <i class="icon-double-angle-right"></i>
                                        可拖拽列表
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="dropdown-toggle">
                                        <i class="icon-double-angle-right"></i>

                                        三级菜单
                                        <b class="arrow icon-angle-down"></b>
                                    </a>

                                    <ul class="submenu">
                                        <li>
                                            <a href="#">
                                                <i class="icon-leaf"></i>
                                                第一级
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="dropdown-toggle">
                                                <i class="icon-pencil"></i>

                                                第四级
                                                <b class="arrow icon-angle-down"></b>
                                            </a>

                                            <ul class="submenu">
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-plus"></i>
                                                        添加产品
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="icon-eye-open"></i>
                                                        查看商品
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-list"></i>
                                <span class="menu-text"> 表格 </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="tables.html">
                                        <i class="icon-double-angle-right"></i>
                                        简单 &amp; 动态
                                    </a>
                                </li>

                                <li>
                                    <a href="jqgrid.html">
                                        <i class="icon-double-angle-right"></i>
                                        jqGrid plugin
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-edit"></i>
                                <span class="menu-text"> 表单 </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="form-elements.html">
                                        <i class="icon-double-angle-right"></i>
                                        表单组件
                                    </a>
                                </li>

                                <li>
                                    <a href="form-wizard.html">
                                        <i class="icon-double-angle-right"></i>
                                        向导提示 &amp; 验证
                                    </a>
                                </li>

                                <li>
                                    <a href="wysiwyg.html">
                                        <i class="icon-double-angle-right"></i>
                                        编辑器
                                    </a>
                                </li>

                                <li>
                                    <a href="dropzone.html">
                                        <i class="icon-double-angle-right"></i>
                                        文件上传
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="widgets.html">
                                <i class="icon-list-alt"></i>
                                <span class="menu-text"> 插件 </span>
                            </a>
                        </li>

                        <li>
                            <a href="calendar.html">
                                <i class="icon-calendar"></i>

                                <span class="menu-text">
                                    日历
                                    <span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
                                        <i class="icon-warning-sign red bigger-130"></i>
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="gallery.html">
                                <i class="icon-picture"></i>
                                <span class="menu-text"> 相册 </span>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-tag"></i>
                                <span class="menu-text"> 更多页面 </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="profile.html">
                                        <i class="icon-double-angle-right"></i>
                                        用户信息
                                    </a>
                                </li>

                                <li>
                                    <a href="inbox.html">
                                        <i class="icon-double-angle-right"></i>
                                        收件箱
                                    </a>
                                </li>

                                <li>
                                    <a href="pricing.html">
                                        <i class="icon-double-angle-right"></i>
                                        售价单
                                    </a>
                                </li>

                                <li>
                                    <a href="invoice.html">
                                        <i class="icon-double-angle-right"></i>
                                        购物车
                                    </a>
                                </li>

                                <li>
                                    <a href="timeline.html">
                                        <i class="icon-double-angle-right"></i>
                                        时间轴
                                    </a>
                                </li>

                                <li>
                                    <a href="login.html">
                                        <i class="icon-double-angle-right"></i>
                                        登录 &amp; 注册
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle">
                                <i class="icon-file-alt"></i>

                                <span class="menu-text">
                                    其他页面
                                    <span class="badge badge-primary ">5</span>
                                </span>

                                <b class="arrow icon-angle-down"></b>
                            </a>

                            <ul class="submenu">
                                <li>
                                    <a href="faq.html">
                                        <i class="icon-double-angle-right"></i>
                                        帮助
                                    </a>
                                </li>

                                <li>
                                    <a href="error-404.html">
                                        <i class="icon-double-angle-right"></i>
                                        404错误页面
                                    </a>
                                </li>

                                <li>
                                    <a href="error-500.html">
                                        <i class="icon-double-angle-right"></i>
                                        500错误页面
                                    </a>
                                </li>

                                <li>
                                    <a href="grid.html">
                                        <i class="icon-double-angle-right"></i>
                                        网格
                                    </a>
                                </li>

                                <li>
                                    <a href="blank.html">
                                        <i class="icon-double-angle-right"></i>
                                        空白页面
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- /.nav-list -->

                    <div class="sidebar-collapse" id="sidebar-collapse">
                        <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
                    </div>

                    <script type="text/javascript">
                        try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                    </script>
                </div>
                <div class="page">
                    @yield('content')
                </div>
                
        </div>
    </div>

<div class="bk_toptips"><span></span></div>

</body>
<script type="text/javascript">
        $("#bind").click(function() {
             $.ajax({
                type:'get',
                url: 'View/bind',
                success: function(data) {
                    $(".page").html(data);
                }
            })
        })
        $("#messages .bandmsg").each(function (i) {
            var send_name = $(this).find('#msgdata').val();
            var content = $(this).find("#hiddata").val();
            var send_id = $(this).find("#send_id").val();
            var boss_id = $(this).find("#boss_id").val();
            console.log(send_name+content+send_id +boss_id);
            $(this).click(function () {
                layer.msg(send_name+"："+content, {
                    time: 0 //不自动关闭
                    ,btn: ['确定', '取消']
                    ,yes: function(index){
                        $.ajax({
                            type:"post",
                            url:"Service/bok",
                            data:{"send_id":send_id,"boss_id":boss_id,_token:"{{csrf_token()}}"},
                            dataType:'json',
                            success:function(data) {
                                if (data.status==0) {
                                     layer.close(index);
                                     layer.msg('绑定成功');
                                }
                                else{
                                     layer.close(index);
                                     layer.msg(data.message);
                                }
                            }

                        })
                       
                    }
                });
            })
        })

        $(document).ready(function () {
            // 连接服务端
            var socket = io('http://'+document.domain+':2120');
            // 连接后登录
            socket.on('connect', function(){
                socket.emit('login', {{$user->member_id}});
            });
            // 后端推送来消息时
            socket.on('new_msg', function(msg){
                 if (msg !=="") {
                     var send = msg.split("!@");
                     $(".badge-important").text(parseInt($(".badge-important").text()) + 1);
                     var html = '<li>' +
                         '<a href="javascript:;" class="msg">' +
                         '<div class="clearfix">' +
                         '<span class="pull-left">' +
                         '<i class="btn btn-xs no-hover btn-pink icon-comment"></i>' +
                         send[1] +"想绑定你为BOSS"+
                         '</span>' +
                         '<span class="pull-right badge badge-info"></span>' +
                         '</div>' +
                         '</a>' +
                         '</li>';
                     $("#messages").append(html);

                     $('.msg').on('click', function () {
                         layer.msg(send[1]+"："+send[0], {
                             time: 0 //不自动关闭
                             ,btn: ['确定', '取消']
                             ,yes: function(index){
                                      $.ajax({
                                        type:"post",
                                        url:"Service/bok",
                                        data:{"send_id":send[3],"boss_id":send[2],_token:"{{csrf_token()}}"},
                                        dataType:'json',
                                        success:function(data) {
                                            if (data.status==0) {
                                                 layer.close(index);
                                                 layer.msg('绑定成功');
                                            }
                                            else{
                                                 layer.close(index);
                                                 layer.msg(data.message);
                                            }
                                        }

                                    })
                             }
                         });
                     })

                     console.log(msg);
                 }
            })

            // 后端推送来在线数据时
            // socket.on('update_online_count', function(online_stat){
            //     $('#online_box').html(online_stat);
            // });
        });
   
</script>
@yield('myscript')

</html>