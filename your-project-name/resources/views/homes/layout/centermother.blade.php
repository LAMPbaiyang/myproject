<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
<title>用户中心</title>

<link href="/qiantai/center/bootstrap-3.3.5-dist/css/bootstrap.min.css" title="" rel="stylesheet" />
<link title="" href="/qiantai/center/css/style.css" rel="stylesheet" type="text/css"  />
<link title="blue" href="/qiantai/center/css/dermadefault.css" rel="stylesheet" type="text/css"/>
<link href="/qiantai/center/css/templatecss.css" rel="stylesheet" title="" type="text/css" />
<script src="/qiantai/center/script/jquery-1.10.2.js"></script>
<script src="/qiantai/center/script/jquery.cookie.js" type="text/javascript"></script>
<script src="/qiantai/center/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<!--标题头-->
<nav class="nav navbar-default navbar-mystyle navbar-fixed-top">
  <div class="navbar-header">
     <a href="#" class="logo_style"><img src="/qiantai/images/logo.png"  width="120px"/></a>
  </div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="li-border"><a class="mystyle-color" href="{{url('/')}}">首页</a></li>
      <li class="li-border"><a class="mystyle-color" href="#">个人中心</a></li>
    </ul>
	<!--
    <ul class="nav navbar-nav pull-right"> 
      <li class="dropdown li-border"><a href="{{ url('homes/center') }}" class="dropdown-toggle mystyle-color" data-toggle="dropdown">{{session('name')}}</a></li>
      <li class="dropdown li-border"><a href="{{ url('homes/huiyuan') }}" class="dropdown-toggle mystyle-color" data-toggle="dropdown">开通会员</a></li>
      <li class="dropdown li-border"><a href="{{ url('homes/exit')}}" class="dropdown-toggle mystyle-color" data-toggle="dropdown">退出</a></li>
    </ul>
	-->
  </div>
</nav>
<!--标题头结束-->

<!--左边栏-->
<div class="down-main">
  <div class="left-main left-full">
    <div class="sidebar-fold"><span class="glyphicon glyphicon-menu-hamburger"></span></div>
    <div class="subNavBox">
      <div class="sBox">
       <div class="subNav sublist-down"><span class="title-icon glyphicon glyphicon-chevron-down"></span><span class="sublist-title">用户中心</span>
        </div>
        <ul class="navContent" style="display:block">
          <li >
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />个人信息</div>
            <a href="{{ url('homes/center') }}"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">个人信息</span></a> </li>
          <li>
             <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />信息修改</div>
            <a href="{{url('homes/center/'.session('name').'/edit')}}"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">信息修改</span></a> </li>
            
          <li>
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />开通会员</div>
            <a href="{{ url('homes/huiyuan') }}"><span class="sublist-icon glyphicon glyphicon-envelope"></span><span class="sub-title">开通会员</span></a> </li>
           <li>
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />开通会员</div>
            <a href="{{ url('homes/pinglun') }}"><span class="sublist-icon glyphicon glyphicon-envelope"></span><span class="sub-title">我的评论</span></a> </li>
          <li>
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />上传视频</div>
            <a href="{{ url('homes/videoup') }}"><span class="sublist-icon glyphicon glyphicon-bullhorn"></span><span class="sub-title">上传视频</span></a></li>
          <li>
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />管理视频</div>
            <a href="{{ url('homes/personvideo') }}"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">管理视频</span></a></li>
            <li>
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />历史记录</div>
            <a href="{{ url('homes/history') }}"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">历史记录</span></a></li>
			  <li>
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />历史记录</div>
            <a href="{{ url('homes/store') }}"><span class="sublist-icon glyphicon glyphicon-credit-card"></span><span class="sub-title">收藏记录</span></a></li>
        </ul>
      </div>
      <div class="sBox">
        <div class="subNav sublist-up"><span class="title-icon glyphicon glyphicon-chevron-up"></span><span class="sublist-title">关于我们</span></div>
        <ul class="navContent" style="display:none">
          <li>
            <div class="showtitle" style="width:100px;"><img src="/qiantai/center/img/leftimg.png" />联系方式</div>
            <a href="#"><span class="sublist-icon glyphicon glyphicon-user"></span><span class="sub-title">联系方式</span></a></li>
        </ul>
      </div>
    </div>
  </div>
<!--左边栏结束-->
 <div class="right-product  view-product right-full">
@yield('content')


 </div>
<!--左边栏特效管理-->
<script type="text/javascript">
$(function(){
/*换肤*/
$(".dropdown .changecolor li").click(function(){
	var style = $(this).attr("id");
    $("link[title!='']").attr("disabled","disabled"); 
	$("link[title='"+style+"']").removeAttr("disabled"); 

	$.cookie('mystyle', style, { expires: 7 }); // 存储一个带7天期限的 cookie 
})
var cookie_style = $.cookie("mystyle"); 
if(cookie_style!=null){ 
    $("link[title!='']").attr("disabled","disabled"); 
	$("link[title='"+cookie_style+"']").removeAttr("disabled"); 
} 

/*左侧导航栏显示隐藏功能*/
$(".subNav").click(function(){				
			/*显示*/
			if($(this).find("span:first-child").attr('class')=="title-icon glyphicon glyphicon-chevron-down")
			{
				$(this).find("span:first-child").removeClass("glyphicon-chevron-down");
			    $(this).find("span:first-child").addClass("glyphicon-chevron-up");
			    $(this).removeClass("sublist-down");
				$(this).addClass("sublist-up");
			}
			/*隐藏*/
			else
			{
				$(this).find("span:first-child").removeClass("glyphicon-chevron-up");
				$(this).find("span:first-child").addClass("glyphicon-chevron-down");
				$(this).removeClass("sublist-up");
				$(this).addClass("sublist-down");
			}	
		// 修改数字控制速度， slideUp(500)控制卷起速度
	    $(this).next(".navContent").slideToggle(300).siblings(".navContent").slideUp(300);
	})
/*左侧导航栏缩进功能*/
$(".left-main .sidebar-fold").click(function(){

	if($(this).parent().attr('class')=="left-main left-full")
	{
		$(this).parent().removeClass("left-full");
		$(this).parent().addClass("left-off");
		
		$(this).parent().parent().find(".right-product").removeClass("right-full");
		$(this).parent().parent().find(".right-product").addClass("right-off");
		
		}
	else
	{
		$(this).parent().removeClass("left-off");
		$(this).parent().addClass("left-full");
		
		$(this).parent().parent().find(".right-product").removeClass("right-off");
		$(this).parent().parent().find(".right-product").addClass("right-full");
		
		}
	})	
 
  /*左侧鼠标移入提示功能*/
		$(".sBox ul li").mouseenter(function(){
			if($(this).find("span:last-child").css("display")=="none")
			{$(this).find("div").show();}
			}).mouseleave(function(){$(this).find("div").hide();})	
})
</script>
<!--左边栏特效管理结束-->
</body>
</html>