@extends('admins.parent')@section('content')       <!-- 内容区域 -->     <div class="row">                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">										<!--  此处div文字未能成功显示到页面							<div class="widget-head am-cf">                                <div class="widget-title  am-cf">上传视频表</div>                            </div>					-->                        <div class="widget am-cf">                          							 <div class="widget-body am-fr">                             <form  id="art_form"   class="am-form tpl-form-line-form"  action="{{  url('admins/upload') }}"  method='post'>                                 {{ csrf_field() }}                             <div class="am-form-group">                                        <label for="title" class="am-u-sm-3 am-form-label">视频标题 <span class="tpl-form-line-small-title">Title</span></label>                                        <div class="am-u-sm-9">                                            <input type="text" name="title" class="tpl-form-input" id="user-name"  placeholder="请输入视频名称">                                            <small>请填写标题文字10-20字左右。</small>                                        </div>                            </div>                            <div class="am-form-group">                                        <label class="am-u-sm-3 am-form-label">视频概述<span class="tpl-form-line-small-title">Desc</span></label>                                        <div class="am-u-sm-9">                                            <input type="text" name="miaoshu" placeholder="请输入视频介绍">                                        </div>                            </div>                              <div class="am-form-group">                                        <label class="am-u-sm-3 am-form-label">视频分类<span class="tpl-form-line-small-title">Fenlei</span></label>                                        <div class="am-u-sm-9">                                            <input type="text" name="fenlei" placeholder="请输入视频类别">												<small>视频分类: 1 电影 ||2 VIP ||3 电视剧 ||4 动漫 ||5 原创 ||6 热播</small>                                        </div>                            </div>                                                            <div class="am-form-group">                                        <label for="user-name" class="am-u-sm-3 am-form-label">上传封面<span class="tpl-form-line-small-title">Pic</span></label>                                        <div class="am-u-sm-9">                                                    <input type="text"  name="picname" id="art_thumb"  value="{{old('picname')}}" >                                                    <input type="file" name="picpath" id="file_upload" value="">                                                    <p><img src="/houtai/img/upload.jpg" alt="" id="img1" style="width:100px" ></p>                                        </div>                                </div>                                                                 <div class="am-form-group">                                        <label for="user-name" class="am-u-sm-3 am-form-label">上传视频<span class="tpl-form-line-small-title">Video</span></label>                                        <div class="am-u-sm-9">                                                    <input type="text" name="videoname" id="video"  value="{{old('videoname')}}" >                                                    <input type="file" name="videopath" id="videoup" value="">												                                                                                         </div>                                </div>                                  <div class="am-form-group">                                        <div class="am-u-sm-9 am-u-sm-push-3">                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>                                        </div>                                   </div>                           								</form>							</div>						</div>					</div>        </div>              <script type="text/javascript">        $.ajaxSetup({            headers: {                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')            }        });                           $(function () {                                $("#file_upload").change(function (){                                     uploadImage();                                });                             });                            function uploadImage() {//                            判断是否有选择上传文件//                            input type file                                var imgPath = $("#file_upload").val();                                if (imgPath == "") {                                    alert("请选择上传图片！");                                    return;                                }                                								//==添加:判断上传图片文件的后缀名==								var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);								if (strExtension != 'jpg' && strExtension != 'png'									&& strExtension != 'png' && strExtension != 'bmp') {									alert("请选择正确格式图片文件");									return;								}									//========								                                var formData = new FormData($( "#art_form" )[0]);                                console.log(formData);                                $.ajax({                                    type: "post",                                    url: "{{  url('admins/uploads') }}",                                    data: formData,                                    async: true,                                    cache: false,                                    contentType: false,                                    processData: false,                                   // beforeSend:function(){                                          // 菊花转转图                                         // $('#img1').attr('src', 'http://img.lanrentuku.com/img/allimg/1212/5-121204193R0-50.gif');                                          //                                           // a = layer.load();                                     // },                                    success: function(data) {                                      alert("图片上传七牛云成功");                                      $('#art_thumb').val(data);                                    },                                    error: function(XMLHttpRequest, textStatus, errorThrown) {                                        alert("上传失败，请检查网络后重试");                                                                           }                                });                            }							//=========上为视频封面下为视频文件代码=========							                              $(function () {                                $("#videoup").change(function (){                                     uploadvideo();                                });							});								                            function uploadvideo() {//                            判断是否有选择上传文件//                            input type file                                var videoPath = $("#videoup").val();                                if (videoPath == "") {                                    alert("请选择上传视频！");                                    return;                                }																//==添加:判断上传影视文件的后缀名==								var strExtension = videoPath.substr(videoPath.lastIndexOf('.') + 1);								if (strExtension != 'mp4' && strExtension != 'rmvb'									&& strExtension != 'avi' && strExtension != 'swf') {									alert("请选择正确格式图片文件");									return;								}									//========								                                                                var formDatas = new FormData($( "#art_form" )[0]);                                console.log(formDatas);                                $.ajax({                                    type: "post",                                    url: "{{  url('admins/uploadv') }}",                                    data: formDatas,                                    async: true,                                    cache: false,                                    contentType: false,                                    processData: false,                                    beforeSend:function(){                                          // 菊花转转图                                         // $('#img1').attr('src', 'http://img.lanrentuku.com/img/allimg/1212/5-121204193R0-50.gif');                                          //                                           // a = layer.load();                                      },                                    success: function(data) {                                      alert("视频上传七牛云成功");                                      $('#video').val(data);                                    },                                    error: function(XMLHttpRequest, textStatus, errorThrown) {                                        alert("上传失败，请检查网络后重试");                                                                           }                                });                            }                        </script>						    <script type="text/javascript">	        var imgNum = 0;        $('#ssi-upload').ssi_uploader({url:'/moreimg/upload',onEachUpload:function(fileInfo,xhr ){        imgNum++;        var jsondata = $('.imgFiles').val();        console.log(jsondata);        $('.imgFiles').val(jsondata + 'img'+imgNum+':'+xhr+',');        }})    </script>@if(!empty(session('msg')))     <script>       alert("{{session('msg')}}");     </script>@endif            @endsection('content')