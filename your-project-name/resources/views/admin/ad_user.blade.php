@extends('admin/gonggong')
@section('content')

        <!-- 内容区域 -->
    <!-- <script src="/b/js/amazeui.min.js"></script>
    <script src="/b/js/amazeui.datatables.min.js"></script>
    <script src="/b/js/dataTables.responsive.min.js"></script>
    <script src="/b/js/app.js"></script> -->
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
                                                <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> <a href="{{url('admin/ad_user/create')}}">新增</a></button>
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
                                        <tr class="gradeX{{$v->uid}}">
                                            <td>{{$v->uname}}</td>
                                            <td>{{$v->tel}}</td>
                                            <td>2016-09-26</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="{{url('admin/ad_user/'.$v->uid.'/edit')}}">
                                                        <i class="am-icon-pencil"></i> 编辑
                                                    </a>
                                                    <a name="" href="javascript:;" class="tpl-table-black-operation" style="color
                                                    :#bbb" onclick="del({{$v->uid}})">
                                                        <i class="am-icon-trash">   删  除</i> 
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
    
@if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif

        <script src="layer/layer.js"></script>


<script type="text/javascript">
function del(uid){
    // alert(1111);
    layer.confirm('您确定要删除吗？',{btn:['确定','取消']},function(){
        $.post('{{url("admin/ad_user/")}}/'+uid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
            if(data == 1){
                var className = '.gradeX'+uid;
                $(className).remove();
                layer.msg('删除成功');
            }else{
                layer.msg('删除失败');
            }
        });
    });
}


</script>
@endsection