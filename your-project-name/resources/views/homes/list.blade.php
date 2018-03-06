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
     <li>
       <a href='{{url("homes/play/$v->vid")}}' class="pic " target="_blank">
        <img src="{{$v->picpath}}"  width="200" height="200" />
       </a>
       
        <p class="tit"><a target="_blank" href="#" >{{$v->title}}</a></p>
        <p class="des">{{$v->miaoshu}}</p>
       
     </li>
     @endforeach
  </ul>

  
  
  <!--分页样式-->
   <div class="Paging">
      <a href="#" class="pn-prev disabled">&lt;上一页</a>
      <a href="#" class="on">1</a>
      <a href="#">下一页&gt;</a>
      <a href="#">尾页</a>
   </div>
  
</div>
</div>
<!--底部样式-->
@endsection
