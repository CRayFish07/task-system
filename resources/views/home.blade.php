@extends('master')
@section('title','home')
@section('style')
    <link rel="stylesheet" href="css/index.css">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row-fluie">
            <div class="col-sm-3 col-md-2 sidebar">
                <div class="side-title">
                    项目操作
                </div>
                <ul class="nav nav-sidebar">
                    <!-- 一级菜单 -->
                    <li><a href="javascript:void(0)" class="nav-header menu-first collapsed" data-toggle="collapse">
                            <i class="fa fa-user"></i><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;用户管理 <span class="sr-only">(current)</span></a>
                        <!-- 二级菜单 -->
                        <!-- 注意一级菜单中<a>标签内的href="#……"里面的内容要与二级菜单中<ul>标签内的id="……"里面的内容一致 -->
                        <ul id="userMeun" class="nav nav-list collapse menu-second">
                            <li><a href="###" onclick="showAtRight('userList.jsp')"><i class="fa fa-users"></i><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;用户列表</a></li>
                        </ul>
                    </li>


                    <li><a href="javascript:void(0)" class="nav-header menu-first collapsed" data-toggle="collapse">
                            <i class="fa fa-globe"></i><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;产品管理 <span class="sr-only">(current)</span></a>
                        <ul id="productMeun" class="nav nav-list collapse menu-second">
                            <li><a href="###" onclick="showAtRight('productList.jsp')"><i class="fa fa-list-alt"></i><span class="glyphicon glyphicon-star" aria-hidden="true"></span>产品列表</a></li>
                        </ul>
                    </li>


                    <li><a href="javascript:void(0)" class="nav-header menu-first collapsed" data-toggle="collapse">
                            <i class="fa fa-file-text"></i><span class="glyphicon glyphicon-star" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;订单管理 <span class="sr-only">(current)</span></a>
                        <ul id="recordMeun" class="nav nav-list collapse menu-second">
                            <li><a href="###" onclick="showAtRight('recordList.jsp')" ><i class="fa fa-list"></i><span class="glyphicon glyphicon-star" aria-hidden="true"></span> 订单列表</a></li>
                        </ul>
                    </li>


                </ul>

            </div>
        </div>
    </div>

    <!-- 右侧内容展示==================================================   -->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header"><i class="fa fa-cog fa-spin"></i>&nbsp;控制台<small>&nbsp;&nbsp;&nbsp;欢迎使用XXX后台管理系统</small></h1>

        <!-- 载入左侧菜单指向的jsp（或html等）页面内容 -->
        <div id="content">

            <h4>
                <strong>使用指南：</strong><br>
                <br><br>默认页面内容……
            </h4>

        </div>
    </div>
@endsection

@section('myscript')
    <script>
        $(document).ready(function () {
            $('ul.nav > li').click(function (e) {

                //e.preventDefault();    加上这句则导航的<a>标签会失效
                $('ul.nav > li').removeClass('active');
                $(this).addClass('active');
                if($(this).find('ul').css('display')=="none"){
                    $('ul.nav > li>ul').hide();
                    $(this).find("ul").show();
                }
                else
                {
                    $(this).find("ul").hide();
                }




            });
        });
        $("#btn").click(function () {
            var url ="/test";
            $.ajax({
                type:'get',
                url:url,
                success:function (data) {
                    $("#content").html(data);
                }
            })
        })


    </script>
@endsection