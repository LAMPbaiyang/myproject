@extends('layout/home')
@section('视频网站')
@section('content')
<!--视频播放-->
<div class="Video_playback_style">
<div class="page_style clearfix">
 <!--面包屑-->
 <div class="Location_link">
  <em></em><a href="index.html">首页</a>  &lt;   <a href="list_page.html">电视剧</a> &lt; <span>大秦帝国之崛起</span> 
 </div>
 <!---->
 <div class="Video_playback">
  <div class="playback_title">如果我爱你未删减版 第1集 <span class="label_name"><a href="#">都市言情</a></span><span class="label_name"><a href="#">情感生活</a></span><span class="label_name"><a href="#">偶像</a></span></div>
  <div class="page_style clearfix" id="videoArea">
  <div id="a1" class="videoArea"></div>

  <div id="playerlist_style"> 
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
      <div class="l_f information_img"><img src="video/d9.jpg"></div>
      <div class="r_f play_information_b ">
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
</div>
<!---->
<div class="play_video_b">
 <div class="page_style">
 <div class="l_f  frequency" id="play_vod_hits"><em class="icon_tup"></em><i>9,020</i>次播放</div>
 <div class="l_f  frequency" id="play_vod_hits"><em class="icon_tup"></em><a href="#">收藏</a></div>
 
 </div>
</div>
<div class="page_style">
 <!--评论+滚动 -->
 <div class="container-fluid">

  <!--评论-->

    <div class="col-md-10 column" style="margin-top: 10px;">
    评论功能
    </div>

    <!--滚动 -->

    <div class="col-md-2 column" style="margin-top: 10px;">
      <div class="Launch_style bg" id="picMarquee-top">
       <div class="label_title"><span class="name">即将上线</span></div>
       <div class="bd">
       <ul class="Launch_list">
        <li class="video_name">
        <div class="clearfix">
        <a href="#" class="link_name"><img src="/homes/video/5.jpg"/></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">愿有人陪你颠沛流离</a>
        <p class="set_number">集数：23集</p>
        </span></div><p class="time">上线时间：2017-03-30</p></li>
         <li class="video_name">
         <div class="clearfix">
        <a href="#" class="link_name"><img src="/homes/video/5.jpg"/></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">愿有人陪你颠沛流离</a>
       <p class="set_number">集数：23集</p>
        </span> </div><p class="time">上线时间：2017-03-30</p></li>
         <li class="video_name">
         <div class="clearfix">
        <a href="#" class="link_name"><img src="/homes/video/5.jpg"/></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">愿有人陪你颠沛流离</a>
        <p class="set_number">集数：23集</p>
        </span></div><p class="time">上线时间：2017-03-30</p></li>
         <li class="video_name">
         <div class="clearfix">
        <a href="#" class="link_name"><img src="/homes/video/5.jpg"/></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">愿有人陪你颠沛流离</a>
        <p class="set_number">集数：45集</p>
        </span></div><p class="time">上线时间：2017-03-30</p></li>
         <li class="video_name">
         <div class="clearfix">
        <a href="#" class="link_name"><img src="/homes/video/5.jpg"/></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">愿有人陪你颠沛流离</a>
        <p class="set_number">集数：23集</p>
        </span></div><p class="time">上线时间：2017-03-30</p></li>
       </ul>
       </div>
     </div>
    </div>
    <script>jQuery("#picMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,trigger:"click"});</script>
 </div>
    
  </div>   
<!--底部样式-->
<script type="text/javascript" src="/homes/js/ckplayer/ckplayer.js" charset="utf-8"></script>
 <script>
 $(".bd").niceScroll({  
  cursorcolor:"#888888",  
  cursoropacitymax:1,  
  touchbehavior:false,  
  cursorwidth:"5px",  
  cursorborder:"0",  
  cursorborderradius:"5px"  
});
    function playerstop() {
            setTimeend();
        }
        function setTimeend() {//获取下一部视频的播放ID
            nowD++;
            if (nowD >= videoarr.length ) {
                nowD = 0;
            }
            playvideo(nowD);
        }
        var nowD = 0;//目前播放的视频的编号(在数组里的编号)
        var frontTime = false;//前置广告倒计时是否在运行中
        var frontHtime = false;//后置广告是否在进行中
        var videoarr = new Array();//新建一个数组来存flash端视频地址，添加方法就像下面一样
        videoarr.push('http://player.video.qiyi.com/2e97d0a59f6278c62046517b4f2f6728/0/2715/v_19rraev46g.swf-albumId=205153601-tvId=637184900-isPurchase=0-cnId=2');
        videoarr.push('http://movie.ks.js.cn/flv/2012/02/6-1.flv');
        videoarr.push('http://movie.ks.js.cn/flv/2011/11/8-1.flv');
        videoarr.push('http://movie.ks.js.cn/flv/2014/04/24-2.flv');
        var html5arr = new Array();//新建一个数组来保存HTML5端用到的视频地址，注意，因为本演示只有一种mp4文件，所以html5下所有用到的视频地址都是相同的，请见谅，另外，该数组是一个二维数组
        html5arr.push(['http://player.video.qiyi.com/2e97d0a59f6278c62046517b4f2f6728/0/2715/v_19rraev46g.swf-albumId=205153601-tvId=637184900-isPurchase=0-cnId=2']);
        html5arr.push(['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4']);
        html5arr.push(['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4']);
        html5arr.push(['http://movie.ks.js.cn/flv/other/1_0.mp4->video/mp4']);
        function playvideo(n) {
            nowD = n;
            var flashvars = {
                f: videoarr[n],
                c: 0,
                p: 1,
                e: 0,
                my_url: encodeURIComponent(window.location.href)
            };
           // for (i = 0; i < videoarr.length; i++) {//这里是用来改变右边列表背景色
//                if (i != nowD) {
//                    CKobject._K_('vli_' + i).style.backgroundColor ='#262626';
//                }
//                else {
//                    CKobject._K_('vli_' + i).style.backgroundColor ='#DAF2FF';
//                }
//            }

            var video = ['http://player.video.qiyi.com/2e97d0a59f6278c62046517b4f2f6728/0/2715/v_19rraev46g.swf-albumId=205153601-tvId=637184900-isPurchase=0-cnId=2'];
            CKobject.embed('/homes/js/ckplayer/ckplayer.swf', 'a1', 'ckplayer_a1', '100%', '100%', false, flashvars, html5arr[n]);
        } 
        playvideo(0);
 </script>
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
<script>
/*********搜索*********/
function submit_btn(){
   $(".search_style input[type$='text']").each(function(n){
      if($(this).val()=="")
          {
               
         layer.alert("搜索框不能为空！",{
                title: '提示框',       
        icon:0,               
          });         
            return false;            
          } 
     else{
       location.href="search_page.html";
       
       }
     })   
}
</script>
@endsection