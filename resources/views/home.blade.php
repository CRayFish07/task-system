@extends('master')
@section('title','home')
@section('style')
    
@endsection

@section('content')
  

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