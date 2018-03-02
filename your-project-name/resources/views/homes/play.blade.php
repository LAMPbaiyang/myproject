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
  

  <div class="playback_title">{{$res[0]->title}}<span class="label_name"><a href="#">电影</a></span><span class="label_name"><a href="#">阿汤哥</a></span><span class="label_name"><a href="#">偶像</a></span></div>
 
 
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
  <h1>腾龙TV</h1>
    <video id="demo-video" class="video-js vjs-big-play-centered"></video>

<!-- 七牛播放器 -->
</div>

  <div id="playerlist_style" class="col-md-3"> 
    
  <div id="a2" class="listcontrol-btn close_btn" title="收起列表"><i class="site-icons-play icon-listcontrol-right"></i></div>
 
  <div id="a3" class="show_btn" title="展开列表"><div class="listcontrol-pack-con"><i class="site-icons-play icon-listcontrol-left"></i>展开列表</div></div>
  
   <div class="listcontrol_content">
   <div id="playerlist">
    <div class="hd"><ul><li>选集<i class="jt"></i></li><li>介绍<i class="jt"></i></li></ul></div>
    <div class="bd" id="videomenu_style">
     <ul class="Episodes_list clearfix">

      <li id="vli_0" onclick="playvideo(0)" class="volume selected"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">1</a></li>
      <li id="vli_1" onclick="playvideo(1)" class="volume"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">2</a></li>
      <li id="vli_2" onclick="playvideo(2)" class="volume"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">3</a></li>
      <li id="vli_3" onclick="playvideo(3)" class="volume"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">4</a></li>
      <li id="vli_4" onclick="playvideo(4)" class="volume"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">5</a></li>
      <li id="vli_5" onclick="playvideo(5)" class="volume"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">6</a></li>
      <li id="vli_6" onclick="playvideo(6)" class="volume"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">7</a></li>
      <li id="vli_7" onclick="playvideo(7)" class="volume"><a href="javascript:void(0);" title="如果我爱你未删减版" rseat="sht_1">8<em class="icon_b icon_xin"></em></a></li>
     </ul>
     <ul>
      <li class="clearfix marginq">
      <div class="l_f information_img col-md-8"><img src="/qiantai/video/d9.jpg"></div>
      <div class="r_f play_information_b col-md-4">
       <dl>
        <dt>如果我爱你未删减版</dt>
        <dd class="mt10 clearfix"><label>地区：</label><span class="l_f"><a href="#">内地</a></span></dd>
        <dd class="mt10 clearfix"><label>类型：</label><span class="l_f"><a href="#">情感生活</a></span></dd>
        <dd class="mt10 clearfix"><label>导演：</label><span class="l_f"><a href="#">沈航</a></span></dd>
        <dd class="mt10 clearfix"><label>主演：</label><span class="l_f"><a href="#">王茜华</a><a href="#">沈航</a><a href="#"> 陈思斯</a><a href="#"> 陈思斯</a></span></dd>
       </dl>
      </div>
      </li>
      <li class="marginq jieshao"><label>简介：</label>沈航执导，由王茜华、沈航等主演的都市情感剧。该剧讲述了单亲母亲黄大妮独自拉扯五个儿子，跨越30年风风雨雨的亲情故事。</li>
     </ul>
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

                                    <div class="chat-message">
                                        <img class="message-avatar" src="/qiantai/images/a1.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 颜文字君</a>
                                            <span class="message-date"> 2015-02-02 18:39:23 </span>
                                            <span class="message-content">
                      H+ 是个好框架
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/qiantai/images/a4.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 林依晨Ariel </a>
                                            <span class="message-date">  2015-02-02 11:12:36 </span>
                                            <span class="message-content">
                      jQuery表单验证插件 - 让表单验证变得更容易
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/qiantai/images/a2.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 谨斯里 </a>
                                            <span class="message-date">  2015-02-02 11:12:36 </span>
                                            <span class="message-content">
                      验证日期格式(类似30/30/2008的格式,不验证日期准确性只验证格式
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/qiantai/images/a5.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 林依晨Ariel </a>
                                            <span class="message-date">  2015-02-02 - 11:12:36 </span>
                                            <span class="message-content">
                      还有约79842492229个Bug需要修复
                                            </span>
                                        </div>
                                    </div>
                                    <div class="chat-message">
                                        <img class="message-avatar" src="/qiantai/images/a6.jpg" alt="">
                                        <div class="message">
                                            <a class="message-author" href="#"> 林依晨Ariel </a>
                                            <span class="message-date">  2015-02-02 11:12:36 </span>
                                            <span class="message-content">
                      九部令人拍案叫绝的惊悚悬疑剧情佳作】如果你喜欢《迷雾》《致命ID》《电锯惊魂》《孤儿》《恐怖游轮》这些好片，那么接下来推荐的9部同类题材并同样出色的的电影，绝对不可错过哦~
                                                        
                                            </span>
                                        </div>
                                    </div>

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
                            <div class="col-sm-9">
                                <div class="chat-message-form">

                                    <div class="form-group">

                                        <textarea class="form-control message-input" name="message" placeholder="输入消息内容，按回车键发送"></textarea>
                                    </div>

                                </div>
                            </div>

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

@endsection