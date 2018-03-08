@extends('homes/layout/home')
@section('视频网站')
@section('content')
<!--图片-->
<div style=" background:url(/qiantai/images/bg_b1.png) center repeat; height:221px;"></div>

<!---->
<div class="page_style">

<!--筛选-->
<div class="filter_style">
 <div class="selectNumberScreen">
 <div class="hasBeenSelected">
    <dl>
      <dt>影视资源</dt>
      <dd style="display:none" class="clearDd">
        <div class="clearList"></div>
        <div style="display:none;" class="eliminateCriteria">清除筛选条件</div>
      </dd>
    </dl>
  </div>
 
 </div>
</div>
<!--列表展示-->
<div class="movielist" id="movie_list">
  <ul class="clearfix">
	@foreach($qq as $v)
    <li class="movie_theme">
     <i class="icon_b rb_ico"></i>
     <a href='{{url("homes/play/$v->vid")}}' class="pic" target="_blank">
     <img src="{{$v->picpath}}"  width="100%"/>
    </a>
    <div class="movie_title">
      <p class="movie_name"><a href="#" class="name">{{$v->title}}</a><span class="status">热播</span></p>
      <p class="desc">{{$v->miaoshu}}</p>
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
     <a href="#">6</a>
   <a href="#">下一页&gt;</a>
   <a href="#">尾页</a>
  <span class="p-skip"><em>共<b>232</b>页&nbsp;&nbsp;到第</em><input id="page_jump_num" value="1" onkeydown="javascript:if(event.keyCode==13){page_jump();return false;}" class="input-txt"><em>页</em><a href="javascript:page_jump();" class="btn btn-default">确定</a></span>
   </div>
  
</div>
</div>
<!--底部样式-->
@endsection
