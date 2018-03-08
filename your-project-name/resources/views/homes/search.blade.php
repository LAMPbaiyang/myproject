@extends('homes/layout/home')
@section('视频网站')
@section('content')
<!--搜索样式-->
<div class="page_style clearfix"> 
<div class="clearfix">
 <div class="search_results_style">
   <div class="results_name">共查询出<b>4</b>条记录</div>
  
   <div class="result_list clearfix">
     @foreach($ri as $v)
     <div class="result_content clearfix">
      <div class="v_result_img"><a href="playback_page.html" class="link_img"><img <img src="{{$v->picpath}}" /></a></div>
      <div class="v_label_content">
       <dl class="relative clearfix">
        <dt><a href="playback_page.html">{{$v->title}}</a>&nbsp;&nbsp;(2014) <span>[电视剧]</span> <span class="v_shul">预告片</span></dt>
       
   
       </dl>
       <div class="video_into">腾龙TV,您最值得信赖的视频播放网站,这里的资源免费,播放稳定流畅,体验效果较好,是您忠实的观影选择!</div>
       <div class=""><a href='{{url("homes/play/$v->vid")}}' class="btn_Play">立即观看 </a></div>
      </div>
     </div>
      @endforeach
         
              
     <div class="Paging">
		<a href="#" class="pn-prev disabled">&lt;上一页</a>
		<a href="#" class="on">1</a>
		<a href="#">2</a>
		<a href="#">3</a>
		<a href="#">4</a>
		<a href="#">...</a>
		<a href="#">12</a>
		<a href="#">下一页&gt;</a>
		<a href="#">尾页</a>
  
	</div>
   </div>
 </div>
 
 
 </div>
 
 <div class="Related_content">
    <div class="Related_title"><span>相关视频</span> <a href="javascript:" class="change_link"><i class="icon_change"></i>换一批</a></div>
    <div class="list_v_content ">
     <ul class="Notice_list">


      <li class="first_content bg">
       <a href="#" class="pic " target="_blank">
        <img <img src="/qiantai/video/14.jpg" width="100%">
        <span class="first_bg"><i class="icon_bf"></i></span>
       </a>
       <a target="_blank" href="#" class="bq">标清</a>
       <div class="tc">
        <p class="tit">
        <a target="_blank" href="#">轿车公路上行驶被闪电劈中</a></p>
        
       </div>
      </li>
      
       
     </ul>
    </div>
   </div>
</div>
<!--底部样式-->

@endsection