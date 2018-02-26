@extends('admins.parent')
@section('content')
 <div class="tpl-content-wrapper">

           

            <div class="row-content am-cf">     

                <div class="row">
					
                          
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
						
                        <div class="widget am-cf">
							 <div class="widget-head am-cf">
								<div class="widget-title  am-cf">用户管理表</div>
							</div>
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">
									 <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> <a href="{{url('admins/users/create')}}">新增</a></button>
                                                
                                            </div>
                                        </div>
								
								</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body  widget-body-lg am-fr">
                                
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th>用户手机号</th>
                                            <th>用户昵称</th>
											<th>用户权限</th>
                                            <th>用户状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $v)
                                        <tr class="gradeX{{$v->uid}}">
                                            <td>{{$v->tel}}</td>
                                            <td>{{$v->uname}}</td>
											<td>
                                                @if ($v->auth== 2)
													VIP用户
												@elseif($v->auth== 1)
													普通用户
												@endif
                                              
                                            </td>
                                            <td>
												@if ($v->status==0)
													禁用
												@elseif($v->status==1)
													启用
												@endif
											
											</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="javascript:;">
                                                        <i class="am-icon-pencil"></i><a href="{{url('admins/users/'.$v->uid.'/edit')}}"> 修改</a>
                                                    </a>
                                                    <button id="del" class="am-btn-default am-text-danger" onclick="del({{$v->uid}})">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                       @endforeach
                                        <!-- more data -->
                                    </tbody>
                                </table>
                               
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
        function del(uid){
            // alert(111);
            layer.confirm('确定删除?',{
                btn:['确定','取消']//按钮
                },function(){
                    $.post('{{url("admins/users/")}}/'+uid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
							var className = '.gradeX'+uid;
							$(className).remove();
                            layer.msg('删除成功');
                        }else{
                            layer.msg('删除失败');
                        }

                    });
                }    
            );
        }
		//js实现点击删除tr行,尚未成功
		// document.getElementById("del").onclick=function(){
		// this.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode);
		// }
		
    </script>





    


@endsection('content')