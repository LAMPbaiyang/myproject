<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/qiantai/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="/qiantai/css/common.css" rel="stylesheet" type="text/css" />
<script src="/qiantai/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="/qiantai/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/qiantai/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/qiantai/js/common.js" type="text/javascript"></script>
<title>列表页</title>
<!--聊天css-->
    <link href="/qiantai/css/bootstrap.min.css" rel="stylesheet">
    <link href="/qiantai/css/font-awesome.min.css" rel="stylesheet">
    <link href="/qiantai/css/plugins/jsTree/style.min.css" rel="stylesheet">
    <link href="/qiantai/css/animate.min.css" rel="stylesheet">
    <link href="/qiantai/css/style.min.css" rel="stylesheet">

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
								   <li class="Channel_color"><a href="#" ><i class="icon_TV"></i>娱乐</a></li>
								   <li class="Channel_color split_line"><a href="#" ><i class="icon_TV"></i>电视剧</a></li>
								   <li class="Channel_color split_line"><a href="#"><i class="icon_TV"></i>电影</a></li>
								   <li class="Channel_color split_line"><a href="#" ><i class="icon_TV"></i>网络电影</a></li>
								   <li class="Channel_color split_line"><a href="#" ><i class="icon_TV"></i>综艺</a></li>
								   <li class="Channel_color split_line"><a href="#" ><i class="icon_TV"></i>动漫</a></li>
								   <li class="Channel_color split_line"><a href="#" ><i class="icon_TV"></i>纪录片</a></li>
								   <li class="Channel_color split_line"><a href="#" ><i class="icon_TV"></i>公开课</a></li>
								   <li class="Channel_color split_line"><a href="#" ><i class="icon_TV"></i>公开课</a></li>
								</ul>
							</div>
						</li>
				</ul>

			<div class="headsearch">
				<form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control"  placeholder="搜索">
					</div>
						<button type="submit" class="btn btn-primary"><a href="{{url('search')}}">搜索</a></button>
				</form>
				  <!-- <div style="font-size: 16px"><a href="#">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">注册</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">开通VIP</a></div> -->
				 <div class="nav pull-right">
					  <button  class="btn" type="button"><a href="{{ url('login') }}" class="Channel_name">登录</a></button>
					  <button  class="btn" type="button"><a href="{{ url('register') }}" class="Channel_name">注册</a></button>
					  <button  class="btn" type="button"><a href="#" class="Channel_name">开通VIP</a></button>
				  </div>

			</div>
    
    </div>
  </div>
 </div>
</div>

@yield('content')



<!--底部样式-->
<div class="footer_style">
<div class="footer">
 <div class="copys copys-list clearfix">
   <a href="#">网络文化经营许可证 京网文[2014]xxxxx-236号</a>
   <a href="#">京卫网审[2013]第0209号 网络110报警服务</a>
   <a href="#">药品服务许可证(京)-经营2222-0029</a>
  <a href="#">节目制作经营许可证京字670号</a>
 </div>
<div class="link_name">
<a href="#">关于我们</a>|<a href="#">媒体合作</a>|<a href="#">开放平台</a>|<a href="#">广告服务</a>|<a href="#">联系我们</a>|<a href="#">工作机会</a>|<a href="#">友情链接</a>
</div>
<div class="Copyright">Copyright © 2004-2017 视频名称（xx.com）All rights reserved.</div>
<div class="align clearfix">
 <a href="#"><img src="/qiantai/images/ghs.png" />&nbsp;京公网安备：xxxxxxxxxxxxxxxx号</a> &nbsp;&nbsp;&nbsp;
 <a href="#"><img src="/qiantai/images/xy.png" />&nbsp;中国互联网诚信联盟</a>
</div>
</div>

</div>
<!-- 代码 开始 -->
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





