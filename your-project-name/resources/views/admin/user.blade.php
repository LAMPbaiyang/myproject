@extends('admin/gonggong')
@section('content')

        <!-- 内容区域 -->

        <div class="tpl-content-wrapper">
           <div class="am-u-sm-12 am-u-md-12 am-u-lg-26">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">用户列表</div>

                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body  widget-body-lg am-fr">
                                <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>
                                            </div>
                                        </div>
                                    </div>
                                <table width="100%" class="am-table am-table-compact am-table-bordered tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th>用户ID</th>
                                            <th>用户名</th>
                                            <th>注册时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user as $v)
                                        <tr class="gradeX">
                                            <td>{{$v->uname}} </td>
                                            <td>{{$v->tel}}</td>
                                            <td>{{$v->upass}}</td>
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
                                 @endforeach
                                        <!-- more data -->
                                    </tbody>
                                </table>

                            </div>
                        </div>
                   
            </select>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
@endsection