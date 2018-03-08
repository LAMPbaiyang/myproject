@extends('homes/layout/home')
@section('视频网站')
@section('content')

 <div class="wrapper" id="wrapper_slideBox"> 
 </div>
 <script>jQuery("#wrapper_slideBox").slide({mainCell:".bd ul",autoPlay:true,delayTime:1000});</script>


<!--首页轮播大图-->
<div class="col-md-12 column" style="margin-top:35px;">
      <div class="carousel slide" id="carousel-658587">
        <ol class="carousel-indicators">
          <li class="active" data-slide-to="0" data-target="#carousel-658587">
          </li>
          <li data-slide-to="1" data-target="#carousel-658587">
          </li>
          <li data-slide-to="2" data-target="#carousel-658587">
          </li>
        </ol>
        <div class="carousel-inner" id="lunbo" style="box-shadow:0 0 5px 1px gray; border-radius:5px;" class="carousel-inner" role="listbox">
		@foreach($advertisement as $v)
          <div class="item">
            <img alt="" src="{{ $v->picpath }}" />
          </div>
        @endforeach
        </div>
      </div>
</div>

 

<div class="home_style  Channel">
<!--栏目-->
 <div class="home_Column_style">
 <div class="Column_list clearfix navigation_list">
  <!--无意义代码
  <ul class="">
   <li class="Channel_name"><a href="index.tml" ><i class="icon_TV"></i>首页</a></li>
   <li class="Channel_name1"><a href="list_page.html" ><i class="icon_TV"></i>电影</a></li>
   <li class="Channel_name2"><a href="#" ><i class="icon_TV"></i>电视剧</a></li>
   <li class="Channel_name3"><a href="#"><i class="icon_TV"></i>VIP专区</a></li>
   <li class="Channel_name4"><a href="#" ><i class="icon_TV"></i>动漫专区</a></li>
   <li class="Channel_name5"><a href="#" ><i class="icon_TV"></i>原创视频</a></li>
  </ul> 
  -->
  </div>
  <!--栏目-->
  <div class="Column_list navigation">
<!-- 无意义代码
  <a href="#" class="w_logo"><img src="/qiantai/images/logo.png"  width="100%"/></a>
   <div class="navigatio_name">
     <a href="javascript:" class="mouse-enter"><i class="icon_navigatio"></i>导航</a>
     <div class="navigatio_nav">
     <ul class=" clearfix">
   <li class="Channel_name"><a href="#" ><i class="icon_TV"></i>首页</a></li>
   <li class="Channel_name1"><a href="#" ><i class="icon_TV"></i>电影</a></li>
   <li class="Channel_name2"><a href="#" ><i class="icon_TV"></i>电视剧</a></li>
   <li class="Channel_name3"><a href="#"><i class="icon_TV"></i>VIP专区</a></li>
   <li class="Channel_name4"><a href="#" ><i class="icon_TV"></i>动漫专区</a></li>
   <li class="Channel_name5"><a href="#" ><i class="icon_TV"></i>原创视频</a></li>
  </ul>
     </div>
   </div>
   <div class="Video_search">
     <input name="" type="text"  class="search"/><button name="" type="button" class=" btn-success button_submit"><i class="icon_search"></i>搜索</button>
  </div>
  -->
 </div>
</div>

 <!--热播精选-->
 
 <div class="Hot_selection_style Channels">
   <div class="title_name clearfix"><i class="icon_title"><img src="/qiantai/images/icon_title_TV.png" /></i>热播精选 <span class="link_name"><a href="#">3月观影指南:炫酷大片不容错过</a>| <a href="#">致命诱惑!这些制服妹子好美</a>|</span></div>
   <div class="Video_list margintb clearfix">
    <div class="left_Video_list Channel_bg bg">
     <span class="Signs_img"></span>
     <a href='{{url("homes/play/".$qq7[0]->vid)}}' class="Video_img_link" target="_blank">
      <img src="{{$qq7[0]->picpath}}" width="460px" height="350px" />
      <span class="xianshi"><i class="icon_bofang"></i></span>
     </a>
     <div class="heading_name">
      <A href="#">{{$qq7[0]->title}}</A>
      <H4>{{$qq7[0]->miaoshu}}</H4>
     </div>
    </div>
    <div class="right_Video_list">
     <ul class="list_v_content">
		 @foreach($qq6 as $v)
	 
      <li class="first_content bg">
       <a href='{{url("homes/play/$v->vid")}}' class="pic " target="_blank">
        <img src="{{$v->picpath}}"  width="100%"/>
        <span class="first_bg"><i class="icon_bf"></i></span>
       </a>
       <a target="_blank" href="#" class="bq" >超清</a>
       <div class="tc">
        <p class="tit">
        <a target="_blank" href="#" >{{$v->title}}</a></p>
        <p class="des">{{$v->miaoshu}}</p>
       </div>
      </li>
	  @endforeach
     </ul>
    </div>   
   </div>
   
   <!--电影-->
   <div class="Channels margintb">
    <div class="title_name clearfix">
    <i class="icon_title"><img src="/qiantai/images/icon_film.png" /></i>电影 <span class="link_name"><a href="#">欧美大片</a>| <a href="#">国产影片</a>| <a href="{{ url('list') }}">更多</a></span></div>
    <div class="clearfix mb40"> 
     <div class="var_list_fort">
     <ul class="video_list list_v_content">
	  @foreach($qq1 as $v)  
     <li class="first_content bg">
       <a href='{{url("homes/play/$v->vid")}}' class="pic " target="_blank">
        <img src="{{$v->picpath}}"  width="100%"/>
        <span class="first_bg"><i class="icon_bf"></i></span>
       </a>
       <a target="_blank" href="#" class="bq" >超清</a>
       <div class="tc">
        <p class="tit">
        <a target="_blank" href="#" >{{$v->title}}</a></p>
        <p class="des">{{$v->miaoshu}}</p>
       </div>
      </li>
	  @endforeach
     </ul>
     </div>
     <!--右-->
     <div class="Launch_style bg" id="picMarquee-top">
       <div class="label_title"><span class="name">即将上线</span></div>
       <div class="bd">
       <ul class="Launch_list">
		@foreach($qq1 as $v)	
        <li class="video_name">
        <div class="clearfix">
        <a href='{{url("homes/play/$v->vid")}}' class="link_name"><img src="{{$v->picpath}}"/></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">{{$v->title}}</a>
        <p class="set_number">标清</p>
        </span></div><p class="time">上线时间：2018-03-30</p></li>
		@endforeach
       </ul>
       </div>
     </div>
     <script>jQuery("#picMarquee-top").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,trigger:"click"});</script>
    </div>
   </div>
   
      <!--电视剧-->
   <div class="Channels margintb">
    <div class="title_name clearfix">
    <i class="icon_title"><img src="/qiantai/images/icon_title_TV.png" /></i>电视剧 <span class="link_name"><a href="#">偶像言情</a>| <a href="#">古装</a>| <a href="#">更多</a></span></div>
    <div class="clearfix mb40"> 
   
	 
	  <div class="var_list_fort">
		<ul class="video_list list_v_content">
		@foreach($qq3 as $v)  
			<li class="first_content bg">
			<div class="clearfix">
			<a href='{{url("homes/play/$v->vid")}}' class="pic " target="_blank">
				<img src="{{$v->picpath}}"  width="100%"/>
				<span class="first_bg"><i class="icon_bf"></i></span>
			</a>
		   <a target="_blank" href="#" class="bq" >超清</a>
		   <div class="tc">
				<p class="tit">
				<a target="_blank" href="#" >{{$v->title}}</a></p>
				<p class="des">{{$v->miaoshu}}</p>
		   </div>
		   </div>
		</li>
	  @endforeach
		</ul>
     </div>
     <!--右-->
	  
     <div class="Launch_style bg" id="picMarquee-top1">
       <div class="label_title"><span class="name">即将上线</span></div>
       <div class="bd">
       <ul class="Launch_list">
	     @foreach($qq3 as $v)
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
     <script>jQuery("#picMarquee-top1").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,trigger:"click"});</script>
    </div>
   </div>
   
 <!--VIP-->
   <div class="Channels margintb">
    <div class="title_name clearfix">
    <i class="icon_title"><img src="/qiantai/images/icon_title_TV.png" /></i>VIP专区 <span class="link_name"><a href="#">电视剧专区</a>|<a href="#">欧美影区</a>|<a href="#">更多</a></span></div>
    <div class="clearfix mb40"> 
	  <div class="var_list_fort">
		<ul class="video_list list_v_content">
		@foreach($qq2 as $v)  
			<li class="first_content bg">
			<div class="clearfix">
			<a href='{{url("homes/play/$v->vid")}}' class="pic " target="_blank">
				<img src="{{$v->picpath}}"  width="100%"/>
				<span class="first_bg"><i class="icon_bf"></i></span>
			</a>
		   <a target="_blank" href="#" class="bq" >超清</a>
		   <div class="tc">
				<p class="tit">
				<a target="_blank" href="#" >{{$v->title}}</a></p>
				<p class="des">{{$v->miaoshu}}</p>
		   </div>
		   </div>
		</li>
	  @endforeach
		</ul>
     </div>
	 
     <!--右-->
     <div class="Launch_style bg" id="picMarquee-top2">
       <div class="label_title"><span class="name">即将上线</span></div>
       <div class="bd">
       <ul class="Launch_list">
       
	    @foreach($qq2 as $v)
         <li class="video_name">
         <div class="clearfix">
        <a href='{{url("homes/play/$v->vid")}}' class="link_name"><img src="{{$v->picpath}}"></a>
        <span class="Introduction">
        <a href="#" title="愿有人陪你颠沛流离" class="p_title_name">{{$v->title}}</a>
        <p class="set_number">标清</p>
        </span></div><p class="time">上线时间：2017-03-30</p></li>
		@endforeach
		
       </ul>
       </div>
     </div>
     <script>jQuery("#picMarquee-top2").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,trigger:"click"});</script>
    </div>
	
   <!--动漫-->
   <div class="Channels margintb">
    <div class="title_name clearfix">
    <i class="icon_title"><img src="/qiantai/images/icon_title_TV.png" /></i>动漫专区 <span class="link_name"><a href="#">日本专区</a>|<a href="#">儿童专区</a>|<a href="#">更多</a></span></div>
    <div class="clearfix mb40"> 
      <div class="var_list_fort">
		<ul class="video_list list_v_content">
		@foreach($qq4 as $v)  
			<li class="first_content bg">
			<div class="clearfix">
			<a href='{{url("homes/play/$v->vid")}}' class="pic " target="_blank">
				<img src="{{$v->picpath}}"  width="100%"/>
				<span class="first_bg"><i class="icon_bf"></i></span>
			</a>
		   <a target="_blank" href="#" class="bq" >超清</a>
		   <div class="tc">
				<p class="tit">
				<a target="_blank" href="#" >{{$v->title}}</a></p>
				<p class="des">{{$v->miaoshu}}</p>
		   </div>
		   </div>
		</li>
	  @endforeach
		</ul>
     </div>
     <!--右-->
     <div class="Launch_style bg" id="picMarquee-top3">
       <div class="label_title"><span class="name">即将上线</span></div>
       <div class="bd">
       <ul class="Launch_list">
         @foreach($qq4 as $v)
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
     <script>jQuery("#picMarquee-top3").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,trigger:"click"});</script>
    </div>
	
    <!--原创专区-->
     <div class="Channels margintb">
    <div class="title_name clearfix">
    <i class="icon_title"><img src="/qiantai/images/icon_title_TV.png" /></i>原创专区 <span class="link_name"><a href="#">个人专区</a>|<a href="#">团队专区</a>|<a href="#">更多</a></span></div>
    <div class="clearfix mb40"> 
     <div class="var_list_fort">
		<ul class="video_list list_v_content">
		@foreach($qq5 as $v)  
			<li class="first_content bg">
			<div class="clearfix">
			<a href='{{url("homes/play/$v->vid")}}' class="pic " target="_blank">
				<img src="{{$v->picpath}}"  width="100%"/>
				<span class="first_bg"><i class="icon_bf"></i></span>
			</a>
		   <a target="_blank" href="#" class="bq" >超清</a>
		   <div class="tc">
				<p class="tit">
				<a target="_blank" href="#" >{{$v->title}}</a></p>
				<p class="des">{{$v->miaoshu}}</p>
		   </div>
		   </div>
		</li>
	  @endforeach
		</ul>
     </div>
     <!--右-->
     <div class="Launch_style bg" id="picMarquee-top4">
       <div class="label_title"><span class="name">即将上线</span></div>
       <div class="bd">
       <ul class="Launch_list">
        @foreach($qq5 as $v)
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
     <script>jQuery("#picMarquee-top4").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:3,interTime:50,trigger:"click"});</script>
    </div>
	
    <!--网站公告-->
    <div class="l_f width50">
     <div class="bg mr10">
      <div class="n_title_name"><em class=""></em>网站公告</div>
      <ul class="notice_list clearfix">
       <li><a href="#"><i class="icon_yuan"></i>通知公告内容是什么的内容的介绍信息</a> </li>
       <li><a href="#"><i class="icon_yuan"></i>通知公告内容是什么的内容的介绍信息</a> </li>
       <li><a href="#"><i class="icon_yuan"></i>通知公告内容是什么的内容的介绍信息</a> </li>
       <li><a href="#"><i class="icon_yuan"></i>通知公告内容是什么的内容的介绍信息</a> </li>
       <li><a href="#"><i class="icon_yuan"></i>通知公告内容是什么的内容的介绍信息</a> </li>
      </ul>
     </div>
    </div>
    <div class="l_f width50">
     <div class="bg ml10">     
		<div class="n_title_name">合作伙伴</div>
			<div class="notice_list clearfix">
			  <a href="#" class="Cooperation_name">华数</a>
			  <a href="#" class="Cooperation_name">万达电影网</a>
			  <a href="#" class="Cooperation_name">华谊兄弟</a>
			  <a href="#" class="Cooperation_name">星美</a>
			  <a href="#" class="Cooperation_name">光线影业</a>
			  <a href="#" class="Cooperation_name">电影网</a>
			  <a href="#" class="Cooperation_name">华策影视</a>
			  <a href="#" class="Cooperation_name">百度视频</a>
			  <a href="#" class="Cooperation_name">百度百科</a>
			  <a href="#" class="Cooperation_name">微博视频台</a>
			  <a href="#" class="Cooperation_name">百度贴吧</a>
			  <a href="#" class="Cooperation_name">央广网</a>
			  <a href="#" class="Cooperation_name">hao123</a>
			  <a href="#" class="Cooperation_name">爱奇艺</a>
			  <a href="#" class="Cooperation_name">天猫店</a>
			</div>
		</div>
    </div>
 </div>
</div>
</div>

<script>
	$("#lunbo").children("div:first").addClass('active');
</script>
<!--底部样式-->
@endsection