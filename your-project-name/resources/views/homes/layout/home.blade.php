<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/qiantai/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="/qiantai/css/common.css" rel="stylesheet" type="text/css" />
<script src="/qiantai/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/qiantai/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/qiantai/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/qiantai/js/common.js" type="text/javascript"></script>
<!--聊天css-->
    <link href="/qiantai/css/bootstrap.min.css" rel="stylesheet">
    <link href="/qiantai/css/font-awesome.min.css" rel="stylesheet">
    <link href="/qiantai/css/plugins/jsTree/style.min.css" rel="stylesheet">
    <link href="/qiantai/css/animate.min.css" rel="stylesheet">
    <link href="/qiantai/css/style.min.css" rel="stylesheet">

<title>腾龙TV视频网站</title>

<!--HTML5播放插件,运行良好 -->
<!-- Chang URLs to wherever Video.js files will be hosted -->
<link href="/qiantai/videoplayer/video-js.css" rel="stylesheet" type="text/css">
<!-- video.js must be in the head for older IEs to work. -->
<script src="/qiantai/videoplayer/video.js"></script>

<!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
<script>
videojs.options.flash.swf = "/qiantai/videoplayer/video-js.swf";
</script>
<!--HTML5播放插件,运行良好 -->
<style>
  .foot_a > a{
    color:#666;
  }
  .foot_a > a:hover{
    color:#337ab7;
  }

</style>
</head>

<body class="background_color">
<div id="header_top">
<div class="page_header  navbar-fixed-top">
 <div class="header_style">
  <div class="clearfix">
    <a href="#" class="logo_style"><img src="/qiantai/images/logo.png"  width="150px"/></a>
    <ul class="nav_list">
     <li class="nav_link"><a href="{{url('/')}}" class="Channel_name"><i class="i icon_home"></i>首页</a></li>
     <li class="nav_link Channel_link">
     <a href="javascript:" class="Channel_name"><i class="i icon_nav"></i>频道<i class="i i_arw2"></i></a>
     <div class="Channel_nav_list">
  <ul class=" clearfix">
		  <li class="Channel_color split_line"><a href="{{url('list')}}"><i class="icon_TV"></i>全部</a></li>
         <li class="Channel_color split_line"><a href="{{url('detail/6')}}"><i class="icon_TV"></i>热播精选</a></li>
         <li class="Channel_color split_line"><a href="{{url('detail/1')}}"><i class="icon_TV"></i>电影</a></li>
         <li class="Channel_color split_line"><a href="{{url('detail/3')}}"><i class="icon_TV"></i>电视剧</a></li>
         <li class="Channel_color split_line"><a href="{{url('detail/2')}}"><i class="icon_TV"></i>Vip专区</a></li>
         <li class="Channel_color split_line"><a href="{{url('detail/4')}}"><i class="icon_TV"></i>动漫专区</a></li>
		 <li class="Channel_color split_line"><a href="{{url('detail/5')}}"><i class="icon_TV"></i>原创专区</a></li>
  </ul>
     </div>
     </li>
    </ul>

    <div class="headsearch">
     <form class="navbar-form navbar-left"  action="{{ url('homes/search') }}" method="post">
      {{ csrf_field() }}
        <div class="form-group">
          <input type="text"  name=search  class="form-control"  placeholder="搜索">
        </div>
        <button type="submit" class="btn btn-primary">搜索</button>
      </form>
      <!-- <div style="font-size: 16px"><a href="#">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">注册</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">开通VIP</a></div> -->
      <div class="nav pull-right" style="margin-top: 13px;">
          @if(session('name') == null)
                  <button  class='btn' type='button'><a href='{{ url('homes/login') }}'class='Channel_name'>登录</a></button>
                  <button  class='btn' type='button'><a href='{{ url('homes/register') }}'class='Channel_name'>注册</a></button>
          @else
                  <button  class='btn' type='button'><a href='{{ url('homes/center') }}'class='Channel_name'>{{session('name')}}&nbsp;&nbsp;&nbsp;&nbsp;<a>积分{{session('score')}}</a></a></button></a></button>
                  <button  class='btn' type='button'><a href='{{ url('homes/center') }}'class='Channel_name'>个人中心</a></button>
                  <button  class='btn' type='button'><a href='{{ url('homes/huiyuan') }}'class='Channel_name'>开通VIP</a></button>
				  <button  class='btn' type='button'><a href='{{ url('homes/exit') }}'class='Channel_name'>退出</a></button>
          @endif    
      </div>

    </div>
    
    
  </div>
 </div>
</div>
</div>
@yield('content')

<!--底部样式-->
<div class="container-fluid footer_style">
  <div class="col-md-12 ">
    <div class="copys copys-list clearfix foot_a">
   <a href="#">网络文化经营许可证 京网文[2014]xxxxx-236号</a>
   <a href="#">京卫网审[2013]第0209号 网络110报警服务</a>
   <a href="#">药品服务许可证(京)-经营2222-0029</a>
  <a href="#">节目制作经营许可证京字670号</a>
 </div>

<div class="link_name foot_a">
<a href="#">关于我们</a>|<a href="#">媒体合作</a>|<a href="#">开放平台</a>|<a href="#">广告服务</a>|<a href="#">联系我们</a>|<a href="#">工作机会</a>|<a href="#">友情链接</a></div>
<div class="Copyright">Copyright © 2004-2017 视频名称（xx.com）All rights reserved.</div>
<div class="align clearfix  foot_a">
 <a href="#"><img src="qiantai/images/ghs.png" />京公网安备：xxxxxxxxxxxxxxxx号</a> &nbsp;&nbsp;&nbsp;
 <a href="#"><img src="qiantai/images/xy.png" />中国互联网诚信联盟</a>
</div>
  </div>
</div>
<div class="go-top dn" id="go-top">
    
    <a href="zhuce.html" target="_blank" class="feedback"></a>
    <a href="javascript:;" class="go"></a>
</div>
</body>
</html>
<script>
/*********搜索*********/
function submit_btn(){
   $(".search_style input[type$='text']").each(function(n){
      if($(this).val()=="")
          {
               
           layer.open({
    title: [
      '我是标题',
      'background-color:#8DCE16; color:#fff;'
    ]
    ,anim: 'up'
    ,content: '展现的是全部结构'
    ,btn: ['确认', '取消']
    }); 
            return false;            
          } 
     else{
       location.href="search_page.html";
       
       }
     })   
}
</script>