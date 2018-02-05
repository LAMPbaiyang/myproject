@extends('layout/home')
@section('视频网站')
@section('content')
<!--图片-->
<div style=" background:url(/homes/images/bg_b1.png) center repeat; height:221px;"></div>
</div>
<!---->
<div class="page_style">
<div class=" clearfix">
<!--栏目-->
 <div class="home_Column_style">
 <div class="Column_list clearfix navigation_list">
  <ul class="">
   <li class="Channel_name1"><a href="#"><i class="icon_TV"></i>娱乐</a></li>
   <li class="Channel_name2"><a href="#"><i class="icon_TV"></i>电视剧</a></li>
   <li class="Channel_name3"><a href="#"><i class="icon_TV"></i>电影</a></li>
   <li class="Channel_name4"><a href="#"><i class="icon_TV"></i>网络电影</a></li>
   <li class="Channel_name5"><a href="#"><i class="icon_TV"></i>综艺</a></li>
   <li class="Channel_name6"><a href="#"><i class="icon_TV"></i>动漫</a></li>
   <li class="Channel_name7"><a href="#"><i class="icon_TV"></i>纪录片</a></li>
   <li class="Channel_name8"><a href="#"><i class="icon_TV"></i>公开课</a></li>
  </ul>
  </div>
  <!--栏目-->
  <div class="Column_list navigation" style="display: none;">
  <a href="#" class="w_logo"><img src="/homes/images/logo.png" width="100%"></a>
   <div class="navigatio_name">
     <a href="javascript:" class="mouse-enter"><i class="icon_navigatio"></i>导航</a>
     <div class="navigatio_nav">
     <ul class=" clearfix">
   <li class="Channel_name1"><a href="#"><i class="icon_TV"></i>娱乐</a></li>
   <li class="Channel_name2"><a href="#"><i class="icon_TV"></i>电视剧</a></li>
   <li class="Channel_name3"><a href="#"><i class="icon_TV"></i>电影</a></li>
   <li class="Channel_name4"><a href="#"><i class="icon_TV"></i>网络电影</a></li>
   <li class="Channel_name5"><a href="#"><i class="icon_TV"></i>综艺</a></li>
   <li class="Channel_name6"><a href="#"><i class="icon_TV"></i>动漫</a></li>
   <li class="Channel_name7"><a href="#"><i class="icon_TV"></i>纪录片</a></li>
   <li class="Channel_name5"><a href="#"><i class="icon_TV"></i>公开课</a></li>
   <li class="Channel_name8"><a href="#"><i class="icon_TV"></i>公开课</a></li>
   <li class="Channel_name3"><a href="#"><i class="icon_TV"></i>公开课</a></li>
  </ul>
     </div>
     
   </div>
   <div class="Video_search">
     <input name="" type="text" class="search"><button name="" type="button" class=" btn-success button_submit"><i class="icon_search"></i>搜索</button>
  </div>
  </div>
 </div>
</div>
<!--筛选-->
<div class="filter_style">
 <div class="selectNumberScreen">
 <div class="hasBeenSelected">
    <dl>
      <dt>电视剧：</dt>
      <dd style="display:none" class="clearDd">
        <div class="clearList"></div>
        <div style="display:none;" class="eliminateCriteria">清除筛选条件</div>
      </dd>
    </dl>
  </div>
  <div id="selectList" class="screenBox screenBackground">
     <dl class="listIndex" attr="terminal_brand_s">
      <dt class="l_f">分类：</dt>
      <dd><a href="javascript:void(0)" values2="" values1="" attrval="全部" class="selected">全部</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="人文军旅">人文军旅</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="言情偶像">言情偶像</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="情感生活">情感生活</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="历史古装">历史古装</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="刑侦悬疑">刑侦悬疑</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="武侠魔幻">武侠魔幻</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="网络剧">网络剧</a></dd>
     </dl>
     <dl class="listIndex" attr="terminal_os_s">
     <dt class="l_f">标签：</dt>
    <dd>
      <a href="javascript:void(0)" values2="" values1="" attrval="全部" class="selected">全部</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="治愈">治愈</a> 
      <a href="javascript:void(0)" values2="" values1="" attrval="校园">校园</a> 
      <a href="javascript:void(0)" values2="" values1="" attrval="推理">推理</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="宠物">宠物</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="科幻">科幻</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="热血">热血</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="剧情">剧情</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="怀旧">怀旧</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="萌宝">萌宝</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="儿歌">儿歌</a>
      <a href="javascript:void(0)" values2="" values1="" attrval="舞蹈">舞蹈</a>
     </dd>
  </dl>
    <dl class="listIndex" attr="terminal_os_s">
      <dt class="l_f">地点：</dt>
      <dd>
            <a href="javascript:void(0)" values2="" values1="" attrval="全部" class="selected">全部</a>
            <a href="javascript:void(0)" values2="" values1="" attrval="内地">内地</a>
            <a href="javascript:void(0)" values2="" values1="" attrval="港台">港台</a>
            <a href="javascript:void(0)" values2="" values1="" attrval="日韩">日韩</a>
            <a href="javascript:void(0)" values2="" values1="" attrval="日韩">欧美</a>
            <a href="javascript:void(0)" values2="" values1="" attrval="日韩">泰国</a>
            <a href="javascript:void(0)" values2="" values1="" attrval="日韩">其他</a>
      </dd>
    </dl>
   </div> 
 </div>
 <!---->
 <div class="container_style ">
 <div class="tab_box" id="sort_btn_wrap">
  <a href="javascript:" class="hover">最新</a>
  <a href="javascript:">最热</a>
  <a href="javascript:">新上映</a>
  <a href="javascript:">预告</a>
  </div>
 </div>
</div>
<!--列表展示-->
<div class="movielist" id="movie_list">
  <ul class="clearfix">
  @foreach ($data as $v)
    <li class="movie_theme">
     <i class="icon_b rb_ico"></i>
    <a href="{{url('play')}}" class="movie_img">
     <img src="/homes/video/d1.jpg"  width="183px;"/>
     <span class="v_title">
      <em>更新至24集</em><i class="fraction">4.5分</i>
     </span>
    </a>
    <div class="movie_title">
      <p class="movie_name"><a href="{{url('play')}}" class="name">{{ $v->gname }}</a><span class="status">热播</span></p>
      <p class="Description">揭秘最深政治生态</p>
     </div>
    </li>
  @endforeach  
  </ul>
  <!--分页样式-->
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
  <span class="p-skip"><em>共<b>232</b>页&nbsp;&nbsp;到第</em><input id="page_jump_num" value="1" onkeydown="javascript:if(event.keyCode==13){page_jump();return false;}" class="input-txt"><em>页</em><a href="javascript:page_jump();" class="btn btn-default">确定</a></span>
   </div>
  
</div>
</div>
<!--底部样式-->
@endsection
