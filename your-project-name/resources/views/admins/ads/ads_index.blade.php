@extends('admins.parent')
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">轮播图表</div>
                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="{{url('admins/ads/create')}}"><button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button></a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                                <th>轮播缩略图</th>
                                                <th>轮播图名称</th>
                                                <th>轮播图简介</th>                          
                                                <th>轮播图操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($advertisement as $v)
                                            <tr class="gradeX{{$v->ad_id}}">
                                                <td>
                                                    <img src="{{$v->picpath}}" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">{{$v->ad_name}}</td>
                                                <td class="am-text-middle">{{$v->ad_content}}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="javascript:;">
                                                             <i class="am-icon-pencil"></i><a href="{{url('admins/ads/'.$v->ad_id.'/edit')}}"> 修改</a>
                                                        </a>
                                                        <button id="del" class="am-btn-default am-text-danger" onclick="del({{$v->ad_id}})">
                                                        <i class="am-icon-trash"></i> 删除
														</button>
                                                    </div>
                                                </td>
                                            </tr>
                                           
                                           
                                            
											@endforeach
                                            <!-- more data -->
                                        </tbody>
                                    </table>
									 <!-- bootstrap分页-->
							   <div class="container">
									@foreach ($advertisement as $v)
										{{ $v->name }}
									@endforeach
								</div>

								{!! $advertisement->render() !!}
								
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="/houtai/js/amazeui.min.js"></script>
    <script src="/houtai/js/app.js"></script>
	<script src="/houtai/js/amazeui.datatables.min.js"></script>
    <script src="/houtai/js/dataTables.responsive.min.js"></script>
	
	@if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif
    <script src="/houtai/layer/layer.js"></script>
    <script>
        function del(ad_id){
            // alert(111);
            layer.confirm('确定删除?',{
                btn:['确定','取消']//按钮
                },function(){
                    $.post('{{url("admins/ads/")}}/'+ad_id,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
							var className = '.gradeX'+ad_id;
							$(className).remove();
                            layer.msg('删除成功');
                        }else{
                            layer.msg('删除失败');
                        }

                    });
                }    
            );
        }
		
		
    </script>
</body>

</html>
@endsection