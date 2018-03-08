@extends('admins.parent')
@section('content')
 <div class="tpl-content-wrapper">

           

            <div class="row-content am-cf">     

                <div class="row">
					
                          
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
						
                        <div class="widget am-cf">
							 <div class="widget-head am-cf">
								<div class="widget-title  am-cf">前台用户管理</div>
							</div>
                        
                            <div class="widget-body  widget-body-lg am-fr">
                                
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th>用户手机号</th>
                                            <th>用户昵称</th>
											<th>用户邮箱</th>
                                            <th>用户权限</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $v)
                                        <tr class="gradeX{{$v->id}}">
                                            <td>{{$v->phone}}</td>
                                            <td>{{$v->name}}</td>
											<td>{{$v->email}}</td>
                                            <td>
											 @if ($v->vip== 1)
													会员用户
												@elseif($v->vip== 0)
													普通用户
											@endif
											
											</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="javascript:;">
                                                        @if( $v->quanxian == 0)
															<i class="am-icon-pencil"></i><a href="{{url('admins/user/'.$v->id.'/edit')}}">禁用</a>
                                                        @else
															<i class="am-icon-pencil"></i><a href="{{url('admins/stop/'.$v->id)}}">启用</a>
                                                        @endif
                                                    </a>
                                                    <button id="del" class="am-btn-default am-text-danger" onclick="del({{$v->id}})">
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
									@foreach ($user as $v)
										{{ $v->xxx }}
									@endforeach
								</div>

								{!! $user->render() !!}
							   
                            </div>
                        </div>
                    </div>




                </div>

            </div>
        </div>
    <script src="/houtai/js/amazeui.min.js"></script>
    <script src="/houtai/js/amazeui.datatables.min.js"></script>
    <script src="/houtai/js/dataTables.responsive.min.js"></script>
    <script src="/houtai/js/app.js"></script>
	
	
	 

	@if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif
    <script src="/houtai/layer/layer.js"></script>
    <script>
        function del(id){
            // alert(111);
            layer.confirm('确定删除?',{
                btn:['确定','取消']//按钮
                },function(){
                    $.post('{{url("admins/user/")}}/'+id,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
							var className = '.gradeX'+id;
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


    


@endsection('content')