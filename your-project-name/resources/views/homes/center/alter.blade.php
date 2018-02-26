@extends('homes/layout/centermother')
@section('视频网站')
@section('content')
 
<!-- 内容区域 -->
 <script src='/qiantai/up/js/main.js'></script>
<script src='/qiantai/up/js/red.js'></script>
<meta charset='UTF-8'>
<meta name="robots" content="noindex">
<link rel="shortcut icon" type="/qiantai/upimage/x-icon" href="./images/1.ico" />
<link rel="mask-icon" type="" href="/qiantai/up/images/2.svg" color="#111" />
<style class="cp-pen-styles">
img{
  max-width:180px;
}
input[type=file]{
padding:10px;
background:#2d2d2d;}
</style>

 <div class="container-fluid">
				<div class="manage account-manage info-center" >
					<div class="page-header">
                        <div class="pull-left" >
							<h4>信息修改</h4>      
						</div>
                    </div>
                    <dd class="pull-left margin-large-left margin-small-top">
                    
                    		<div >
		                		<form action="{{url('homes/uface')}}" method="post" enctype='multipart/form-data'>
		                			{{ csrf_field() }}
		                			<input type='file' name="face"  onchange="readURL(this);" />
									<br>
									@if(empty($center->uface))
									<img id="blah" src="/qiantai/up/images/180.png" alt="your image" />
									@else
									<img id="blah" src="{{$center->uface}}" alt="your image" />
									@endif 
									<br><br>
									 <button  class='btn'  type="submit">          
                                       修改头像</button>
		                		</form>
							</div>
								<dd class="pull-left margin-large-left margin-small-top">
								<form action="{{url('homes/center/'.$info->id)}}" method='post'>
		                			<input type="hidden" name="_method" value="put">
		                	 		{{ csrf_field() }}
								<p>
									<span class="show pull-left base-name">会员账号</span>:
									<input type="text" class="tpl-form-input" name="name"    value="{{$info->name}}" placeholder="">
								</p>
								<p >
									<span></span><span class="show pull-left base-name">性别</span>:
									<input type="text" class="tpl-form-input" name="sex"   value="{{$info->sex}}" placeholder="">
								</p>
								<p>
									<span class="show pull-left base-name">手机号</span>:
									<input type="text" class="tpl-form-input" name="phone"    value="{{$info->phone}}" placeholder="">
								</p>
								<p>
									<span class="show pull-left base-name">个人邮箱</span>:
									<input type="text" class="tpl-form-input" name="email"   value="{{$info->email}}" placeholder="">
								</p>
								<div style="margin-left: 100px"> 
										 <button  class='btn'  type="submit">          
                                       修改信息</button>
                                </div>
						</form>
				</div>
	</div>  
<script src='/qiantai/up/js/green.js'></script>
<script src='/qiantai/up/js/yellow.js'></script>
<script >     
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
//# sourceURL=pen.js
</script>                                

@if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif
@endsection
