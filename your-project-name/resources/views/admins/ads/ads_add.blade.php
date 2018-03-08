@extends('admins.parent')
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 轮播图 </div>
                       
                    </div>
                   
                </div>

            </div>

            <div class="row-content am-cf">

                <div class="row">
		
					
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
						
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加轮播图</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <form action="{{url('admins/ads')}}" method="post" class="am-form tpl-form-border-form tpl-form-border-br" id="art_form">
								{{csrf_field()}}
									<div class="am-form-group">
									   <label for="ad_pic" class="am-u-sm-3 am-form-label">轮播广告图 <span class="tpl-form-line-small-title">ad_pic</span></label>
									   <div class="am-u-sm-9">
											<div class="am-form-group am-form-file">
												<div class="tpl-form-file-img">
													<input type="text" name="ad_pic" id="art_thumb"  value="{{old('art_thumb')}}" >
													<input name="file_upload" id="file_upload" type="file" value="" >  
													
													<p><img src="{{asset('houtai/img/upload.jpg')}}" id="img1" style="width:400px"></p>
												</div>
													<button type="button" class="am-btn am-btn-danger am-btn-sm">
														<i class="am-icon-cloud-upload"></i> 添加轮播图
													</button>
													 
											  </div>
										</div>
									</div>
					
								
                                    <div class="am-form-group">
                                        <label for="ad-name" class="am-u-sm-3 am-form-label">轮播图名称 <span class="tpl-form-line-small-title">ad_name</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="ad-name" name="ad_name" placeholder="请输入轮播图名称">
                                            <small>请填写名称文字5-20字左右。</small>
                                        </div>
                                    </div>
									
									
									
									
									<div class="am-form-group">
                                        <label for="ad-content" class="am-u-sm-3 am-form-label">轮播图简介 <span class="tpl-form-line-small-title">ad_content</span></label>
                                        <div class="am-u-sm-9">
                                            <textarea class="" rows="10" class="tpl-form-input" name="ad_content" id="user-name" placeholder="请输入轮播图简介"></textarea>
											
											<!--
											<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
											<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
											<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
											<script id="editor" type="text/plain" name="art_content" style="width:860px;height:500px;">
													
											</script>

											<script>
												var ue = UE.getEditor('editor');
											</script>
											
											<style>
												.edui-default{line-height: 28px;}
												div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
												{overflow: hidden; height:20px;}
												div.edui-box{overflow: hidden; height:22px;}
											</style>
                                        </div>
                                    </div>
									
											
										-->
									
									
									
									
									
									<!--
      								<div class="am-form-group">
                                        <label for="ad-url" class="am-u-sm-3 am-form-label">轮播图链接 <span class="tpl-form-line-small-title">ad_url</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入轮播图跳转视频链接">
                                            <small>请填写正确视频链接格式</small>
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="ad_ID" class="am-u-sm-3 am-form-label">轮播图编号 <span class="tpl-form-line-small-title">ad_ID</span></label>
                                        <div class="am-u-sm-9">
                                            <select data-am-selected="{searchBox: 1}" style="display: none;">
											  <option value="a">1</option>
											  <option value="b">2</option>
											  <option value="o">3</option>
											</select>

                                        </div>
                                    </div>

									-->
                                    

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                  </div>
			</div>
		</div>
    <script src="/houtai/js/amazeui.min.js"></script>
    <script src="/houtai/js/amazeui.datatables.min.js"></script>
    <script src="/houtai/js/dataTables.responsive.min.js"></script>
    <script src="/houtai/js/app.js"></script>
	
	<script src="{{ asset('layer/layer.js') }}" type="text/javascript"></script>
	
	
</body>
<script type="text/javascript">

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		
		
		  
		$("#file_upload").change(function (){
			uploadImage();
			});
		  
		function uploadImage() {
//              判断是否有选择上传文件
//              input type file
			var imgPath = $("#file_upload").val();
			if (imgPath == "") {
				alert("请选择上传图片！");
				return;
			}
			
		//判断上传文件的后缀名
			var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
			if (strExtension != 'jpg' && strExtension != 'png'
				&& strExtension != 'png' && strExtension != 'bmp') {
				alert("请选择正确格式图片文件");
				return;
			}	
			
			var formData = new FormData($( "#art_form" )[0]);
			console.log(formData);
			$.ajax({
				type: "post",
				url: "{{  url('admins/ads/imageUpload') }}",
				data: formData,
				async: true,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function(){
					  // 菊花转转图
					  $('#img1').attr('src', 'http://img.lanrentuku.com/img/allimg/1212/5-121204193R0-50.gif');
					  //
					   // a = layer.load();
				  },
				success: function(data) {
					alert("图片上传七牛云成功");
				  $('#art_thumb').val(data);
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					alert("上传失败，请检查网络后重试");
				   
				}
			});
		}
							
							
							
							
</script>
						
<!--
	<script type="text/javascript">
        var imgNum = 0;
        $('#ssi-upload').ssi_uploader({url:'/img/upload',onEachUpload:function(fileInfo,xhr ){
        imgNum++;
        var jsondata = $('.imgFiles').val();
        console.log(jsondata);
        $('.imgFiles').val(jsondata + 'img'+imgNum+':'+xhr+',');
        

		}})
	</script>   -->
</html>
@if(!empty(session('msg')))
     <script>
        alert("{{session('msg')}}");
     </script>
@endif            
@endsection('content')