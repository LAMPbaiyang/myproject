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
											<th>VIP</th>
                                            <th>用户状态</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="gradeX">
                                            <td>15001184741</td>
                                            <td>白杨</td>
											<td>会员</td>
                                            <td>启用</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="javascript:;">
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>
                                                    <a href="javascript:;" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>12345678900</td>
                                            <td>哈哈</td>
                                            <td>会员</td>
											<td>启用</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="javascript:;">
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>
                                                    <a href="javascript:;" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 删除
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                       
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




@endsection('content')