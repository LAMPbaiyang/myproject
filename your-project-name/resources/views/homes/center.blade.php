
@extends('homes/layout/centermother')
@section('视频网站')
@section('content')

    <div class="container-fluid">
				<div class="manage account-manage info-center">
					<div class="page-header">
                        <div class="pull-left">
							<h4>用户中心</h4>      
						</div>
                    </div>
					<dl class="account-basic clearfix">
						<dt class="pull-left">
						<p class="account-head">
							@if(empty($center->uface))
							<img src='/qiantai/center/img/noface.gif'>
							@else
							<img src='{{$center->uface}}'>
							@endif 
						</p>
						</dt>
						<dd class="pull-left margin-large-left margin-small-top">
						<p class="text-small">
							<span class="show pull-left base-name">会员账号</span>:<span class="margin-left">{{session('name')}}</span>
						</p>
						<p class="text-small">
							<span class="show pull-left base-name">会员状态</span>
							@if($center->vip == 1)
                  				:<span class="margin-left"><img src="/qiantai/center/img/vip.png"></span>
          					@else
                 				:<span class="margin-left">非会员</span>
          					@endif    
							<!-- <a class="margin-left text-main text-underline" href="#">立即认证</a> -->
						</p>
						<p class="text-small">
							<span class="show pull-left base-name">注册时间</span>:<span class="margin-left">2018-02-12 11:50:22</span>
						</p>
						<p class="text-small">
							<span></span><span class="show pull-left base-name">性别</span>:<span class="margin-left">{{$center->sex}} </span>
						</p>
						<p class="text-small">
							<span class="show pull-left base-name">手机号</span>:
							<span class="margin-left">{{$center->phone}}</span>
						</p>
						<p class="text-small">
							<span class="show pull-left base-name">个人邮箱</span>:<span class="margin-left">{{$center->email}}</span>
						</p>
					</dl>
				</div>
	</div>

@if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif
    @if(!empty(session('exts')))
                        <script>
                            alert("{{session('exts')}}");
                        </script>
                    @endif
@endsection

