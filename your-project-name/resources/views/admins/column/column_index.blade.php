@extends('admins.parent')
@section('content')

        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">栏目管理表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a href="{{url('admins/column/create')}}"> 新增</a></button>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>文章标题</th>
                                                <th>作者</th>
                                                <th>时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        @foreach ($column as $v)
                                            <tr class="gradeX{{$v->cid}}">
                                                <td>{{$v->cname}}</td>
                                                <td>{{$v->vname}}</td>
                                                <td>2016-09-26</td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="javascript:;">
                                                            <i class="am-icon-pencil"></i><a href="{{url('admins/column/'.$v->cid.'/edit')}}"> 修改</a>
                                                        </a>
                                                        <button id="del" class="am-btn-default am-text-danger" onclick="del({{$v->cid}})">
                                                        <i class="am-icon-trash"></i> 删除
                                                        </button>
                                                        <span onclick="column({{$v->cid}},this)"><a>+</a></span>

                                                         <span onclick="columnadd({{$v->cid}},this)">添加</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach   
                                            <!-- more data -->
                                        </tbody>
                                    </table>


                                    <!-- //分页 -->
                                     <div class="">
                                 <ul class="">
                                    @foreach($column as $v )
                                        <li>{{ $v->name }}</li>
                                    @endforeach
                                </ul>
                               </div>
                               {!! $column->render() !!}
                            </div>


                                </div>
                                
                            </div>
                        </div>
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
        function del(cid){
            // alert(111);
            layer.confirm('确定删除?',{
                btn:['确定','取消']//按钮
                },function(){
                    $.post('{{url("admins/column/")}}/'+cid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
                            var className = '.gradeX'+cid;
                            $(className).remove();
                            layer.msg('删除成功');
                        }else{
                            layer.msg('删除失败');
                        }

                    });
                }    
            );
        }

         function columnadd(cid){
        layer.confirm('<input type="text" id="name" name="cname" style="border:1px solid #ddd">', {
          btn: ['添加','取消'] //按钮
        }, function(){
            var cname = $("#name").val();
            
          $.post('{{url("admins/column/columnadd")}}',{'_token':'{{csrf_token()}}','vid':cid,'cname':cname},function(data){
                // alert('请确认添加');
          });
        });
       }


        function column(cid,column){
                    $.post('{{url("admins/column/cdr")}}',{'_token':'{{csrf_token()}}','cid': cid},function(data){
                    // alert(1111);
                    var data = data
                    // var vid = vid;
                    str="";
                    $.each(data,function(index, n){
                     str=str+'<div><span>'+data[index].cname+'</span><div>';
                    });
                   
                    $(column).parents('tr').after(str);
                });
            
       }


</script> 
@endsection('content')