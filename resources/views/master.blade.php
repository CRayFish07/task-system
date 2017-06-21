<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="http://apps.bdimg.com/libs/bootstrap/3.2.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/2.0.1/jquery.js"></script>
    <script type="text/javascript" src="http://apps.bdimg.com/libs/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('style')
    <title>@yield('title')</title>
</head>
<body>
<!-- 顶部菜单（来自bootstrap官方Demon）==================================== -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.jsp">XXXX.com</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="###" onclick="showAtRight('userList.jsp')"><i class="fa fa-users"></i> 用户列表</a></li>
                <li><a href="###" onclick="showAtRight('productList.jsp')"><i class="fa fa-list-alt"></i> 产品列表</a></li>
                <li><a href="###" onclick="showAtRight('recordList.jsp')" ><i class="fa fa-list"></i> 订单列表</a></li>
            </ul>

        </div>
    </div>
</nav>
<div class="page">
    @yield('content')
</div>
<div class="bk_toptips"><span></span></div>

</body>
<script type="text/javascript">

</script>
@yield('myscript')

</html>