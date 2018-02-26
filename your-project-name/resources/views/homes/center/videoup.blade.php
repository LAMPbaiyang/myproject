@extends('homes/layout/centermother')
@section('content')
    <!--right-->
<style type="text/css">
	.page-header h1 {
	font-family: 'Open Sans', sans-serif;
	font-weight: 400;
	font-size: 30px;
	color: #848484;
	display: inline-block;
	margin-right: 15px;
}

.breadcrumb {
	display: inline-block;
	background: none;
	margin: 0;
	padding: 0 10px;
}

.breadcrumb li a {
	color: #999999;
	font-size: 11px;
	padding: 0px;
	margin: 0px;	
}

.breadcrumb li:last-child a {
	color: #1e91cf;
}

.breadcrumb li a:hover {
	text-decoration: none;
}

.breadcrumb li + li:before {
	content: "/";
	font-family: FontAwesome;
	color: #BBBBBB;
	padding: 0 5px;	
}

input[type=file] {
  filter: alpha(opacity=0);
}

.image-upload > input
{
    display: none;
}


.input-file { visibility: hidden; position: absolute;}
h4 { margin-top: 30px;}
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="page-header">
      <div class="container-fluid">
      <h1>视频上传</h1>
      <ul class="breadcrumb">
      <li><a href="">{{session('name')}}</a></li>
      <li><a href="">文件</a></li>
      </ul>					
      </div>
      </div>
      </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="{{ url('homes/videoup') }}" method="post" enctype="multipart/form-data" id="form-banner" class="form-horizontal">

             {{ csrf_field() }}

            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-banner-name">视频标题</label>
            <div class="col-sm-6">
            <input type="text" name="title" value="" placeholder="Banner Name" id="input-banner-name" class="form-control" />
            </div>
            </div>
			<br>
		    <div class="form-group">
            <label class="col-sm-2 control-label" for="input-banner-name">视频描述</label>
            <div class="col-sm-10">
            <input type="text" name="desc" value="" placeholder="Banner Name" id="input-banner-name" class="form-control" />
            </div>
            </div>
				<br>
				<div class="" >
					<input type="file" name="video" class="input-file" >
					<div class="input-group col-xs-12" style="float:right;">
						<span class="input-group-addon"><i class="fa fa-video-camera"></i></span>
						<input type="text" class="form-control" disabled placeholder="Upload Video">
						<span class="input-group-btn">
							<button class="upload-field btn btn-success" type="button"><i class="fa fa-search"></i> 选择上传</button>
						</span>
					</div>
				</div>
				<br>
				<br>
				<br>
				<center>
            	<div >           
                	<button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">确认上传</button>
            	</div>
        		</center>
         
          </form>
        </div>
    </div>
      
  </div>
</div>

<script type="text/javascript">
$(function($){
    $('body').tooltip({
      selector: '[rel=tooltip]'
    });
  });

var image_row = 1;

function addImage() {
  
  
html  = '<tr id="image-row' + image_row + '">';
html += ' <td class="text-left"><input type="text" name="title[]" value="" placeholder="Title" class="form-control" style="margin-top: 10%;"/></td>';
html += '<td class="text-left"><input type="text" name="link[]" value="" placeholder="Link" class="form-control" style="margin-top: 10%;"/></td>'; 
html += '<td class="text-center">';
html += '<div class="image-upload">'; 
html += '<label for="file_' + image_row + '">';
html += '<img src="http://placehold.it/100x100" class="img-thumbnail" style="cursor: pointer;" rel="tooltip" data-toggle="tooltip" data-trigger="hover" data-placement="right" data-html="true" data-title="Click To Choose File"/>';
html += '</label>';  
html += '<input type="file" name="uploadedimages'+ image_row + '" size="20"  multiple="" id="file_'+ image_row + '"/>';
html += '<p class="text-mute">Click To Choose File</p>';  
html += '</div>';  
html += '</td>';
html += '</tr>';

$('#images tbody').append(html);

image_row++;

}


$(document).on('click', '.upload-field', function(){
  var file = $(this).parent().parent().parent().find('.input-file');
  file.trigger('click');
});
$(document).on('change', '.input-file', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});
</script>  
@if(!empty(session('msg')))
                        <script>
                            alert("{{session('msg')}}");
                        </script>
                    @endif
@endsection