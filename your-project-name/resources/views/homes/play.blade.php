@extends('homes/layout/home')
@section('视频网站')
@section('content')
<!--视频播放-->
<!-- 七牛播放器 -->
<link href="https://player.qiniucc.com/sdk/latest/qiniuplayer.min.css" rel="stylesheet">
<script src="https://player.qiniucc.com/sdk/latest/qiniuplayer.min.js"></script>
<!-- 七牛播放器 -->
<div class="Video_playback_style">
<div class="page_style clearfix">
 <!--面包屑-->
 <div class="Location_link">
  <em></em><a href="{{url('/')}}">首页</a>  &lt;   <a href="list_page.html">电视剧</a> &lt; <span>大秦帝国之崛起</span> 
 </div>
 <!---->
 <div class="Video_playback">
  
 
<!-- jsModern播放插件 创建视频容器，设置明确宽高，不含任何内容 
 <div class="page_style clearfix col-md-8" id="video" style="width:800px;height:450px;margin-left:2px;">
	<video src="/qiantai/uploads/demo.mp4"></video>
 </div>  
 -->
 
 
<div class="page_style clearfix col-md-8" id="video" style="width:800px;height:450px;margin-left:2px;">
	<!-- <video id="example_video" class="video-js vjs-default-skin" controls preload="none" width="800" height="450" poster="/qiantai/uploads/oceans-clip.png" data-setup="{}">
		<source src="http://os4vho7yf.bkt.clouddn.com/shipin/15199164939846.mp4" type='video/mp4' />
		<source src="/qiantai/uploads/oceans-clip.webm" type='video/webm' />
		<source src="/qiantai/uploads/oceans-clip.ogv" type='video/ogg' />
		<track kind="captions" src="/qiantai/uploads/demo.captions.vtt" srclang="en" label="English"></track> --><!-- Tracks need an ending tag thanks to IE9
		<track kind="subtitles" src="/qiantai/uploads/demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
	<!-- </video>  -->
  
<!-- 七牛播放器 -->
 
  <h2>{{$res[0]->title}}</h2>
    <video id="demo-video" class="video-js vjs-big-play-centered"></video>

<!-- 七牛播放器 -->
</div>

  <div id="playerlist_style" class="col-md-3"> 
    
  <div id="a2" class="listcontrol-btn close_btn" title="收起列表"><i class="site-icons-play icon-listcontrol-right"></i></div>
 
  <div id="a3" class="show_btn" title="展开列表"><div class="listcontrol-pack-con"><i class="site-icons-play icon-listcontrol-left"></i>展开列表</div></div>
  
   <div class="listcontrol_content">
   <div id="playerlist">
    <div class="hd"><ul><li>视频描述<i class="jt"></i></li><li>介绍<i class="jt"></i></li></ul></div>
    <div class="bd" id="videomenu_style">
     <ul class="Episodes_list clearfix">
      <h3>{{$res[0]->miaoshu}}</h3>
      
     </ul>
    
       <li class="first_content bg">
       
        <img src="{{$res[0]->picpath}}"  width="100%"/>
        <span class="first_bg"><i class="icon_bf"></i></span>
      
     </li>
      <!-- <div class="l_f information_img col-md-8"><img src="{{$res[0]->picpath}}"  width="50px" height="50px"></div> -->
     
      
    </div>
    </div>
    <script>jQuery("#playerlist").slide({delayTime:0});</script>
   </div>
  </div>


  </div>

 </div>
</div>
<!---->
<div class="play_video_b">

 <div class="page_style">
 <div class="l_f  frequency" id="play_vod_hits"><em class="icon_tup"></em><i>9,020</i>次播放</div>
 <div class="l_f  frequency" id="play_vod_hits"><em class="icon_tup"></em><a href="#">收藏</a></div>
 
 <!-- 为分享按钮设置一个空的容器 -->
        <div id="share-box"></div>
        <script>
            /* 传入按钮容器，再设置相应按钮为 false 即可移除指定的按钮 */
            /* 五个按钮分别是: qrcode, douban, qzone, sina, qq */
            /* 想移除哪一个按钮，只需将其设置为 false 即可 */
            jsModern.share("#share-box", {
                qzone: false,
                qq: false
            });	
        </script>
 <!-- 分享功能尚未实现!!!!! -->
		

		<script>
			jsModern.share({
			    qrcode: "#share-qrcode",
			    douban: "#share-douban",
			    qzone: "#share-qzone",
			    sina: "#share-sina",
			    qq: "#share-qq"
			});  
		</script>
 
 </div>
</div>
<div class="page_style">
 <!--评论+滚动 -->
 <div class="container-fluid">
  <!--评论-->
    <div class="col-md-9 ">
                                <div class="chat-discussion">
                                   @foreach($com as $v)
                                    <div class="chat-message">
                                        <img class="message-avatar" src="{{ $v['uface'.$v->id] }}" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> {{$v->name}}</a>
                                            <span class="message-date"> 2015-02-02 18:39:23 </span>
                                            <span class="message-content">
                                            {{$v->comment}}
                                            </span>
                                        </div>
                                    </div>
                                   @endforeach
                                </div>

    </div>


    <!--滚动 开始-->
    <div class="col-md-3 column" style="margin-top: 10px;">
      <div class="Launch_style bg" id="picMarquee-top">
       <div class="label_title"><span class="name">即将上线</span></div>
       <div class="bd">
       <ul class="Launch_list">

        @foreach($er as $v)
        <li class="video_name">
        <div class="clearfix">
        <a href='{{url("homes/play/$v->vid")}}' class="link_name"><img src="{{$v->picpath}}"/></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">{{$v->title}}</a>
        <p class="set_number">标清</p>
        </span></div><p class="time">上线时间：2017-03-30</p></li>
         @endforeach
       </ul>
       </div>
     </div>
    </div>
    <script>jQuery("#picMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,trigger:"click"});</script>
 </div>
 <!--滚动 结束-->
 <!--评论框开始-->
  <div class="row">
     @if(session('name') == null)
            <br><br><br>
            <center>
              <h2>
                <a href="">请登录后评论</a>
              </h2>
            </center>
            <br><br><br>
          @else
                 <form action="{{url('homes/comment/'.$res[0]->vid)}}" method='post'>
                          {{ csrf_field() }}
                          <input type="hidden" name="_method" value="put">

                            <div class="col-sm-9">
                                <div class="chat-message-form">
                                      <div class="form-group">
                                        <textarea class="form-control message-input" name="message" placeholder="输入消息内容，按回车键发送"></textarea>
                                      </div>
                                </div>
                            </div>
                            <div class="col-sm-">
                                <div class="form-group">
                                  <br><br><br>
                                  <button  class='btn' type='submit'>提交评论</button> 
                                </div>
                             </div>
                  </form>
          @endif    
                        
  </div>
 <!--评论框结束--> 
<center>
<div class="link_name">
<a href="#">关于我们</a>|<a href="#">媒体合作</a>|<a href="#">开放平台</a>|<a href="#">广告服务</a>|<a href="#">联系我们</a>|<a href="#">工作机会</a>|<a href="#">友情链接</a></div>
<div class="Copyright">Copyright © 2004-2017 视频名称（xx.com）All rights reserved.</div>
</center>
</div>


<!-- 代码 开始 -->
<div class="go-top dn" id="go-top">
    
    <a href="zhuce.html" target="_blank" class="feedback"></a>
    <a href="javascript:;" class="go"></a>
</div>
</body>
</html> 

<!--jsMorden播放插件  暂时不用 
<link rel="stylesheet" href="/qiantai/videoplay/jsmodern.min.css">
<script src="/qiantai/videoplay/jquery.min.js"></script>
<script src="/qiantai/videoplay/jsmodern.min.js"></script>
<script>
	$(function () {
		jsModern.video("#video");
	})
</script>
-->

<!-- 未知js特效 -->
<script type="text/javascript">
 
$(function() { 
  $("#videoArea").fix({
    float : 'right',  //default.left or right
    //minStatue : true,
    skin : 'green', //default.gray or blue
    durationTime :300
  });
});
 </script>

<!--聊天js-->
 <!-- 全局js -->
 
    <script src="/qiantai/js/jquery-2.1.1.min.js"></script>
    <script src="/qiantai/js/bootstrap.min.js"></script>

    <!-- 自定义js -->
    <script src="/qiantai/js/content.min.js?v=1.0.0"></script>
  
   <!-- 七牛播放器 -->
    <script type="text/javascript">
      var options = {
    controls: true,
    url: '{{$res[0]->videopath}}',
    type: 'hls',
    preload: true,
    autoplay: false // 如为 true，则视频将会自动播放
};
var player = new QiniuPlayer('demo-video', options);

    </script>
    <!-- 七牛播放器 -->

    @if(!empty(session('msg')))
                        <script>
                            alert("{{session('msg')}}");
                        </script>
                    @endif       

@endsection