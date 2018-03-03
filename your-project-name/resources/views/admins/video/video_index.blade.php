@extends('admins.parent')
@section('content')


        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">视频管理表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a href="{{url('admins/video/create')}}"> 新增</a></button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                 <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                    <div class="am-form-group tpl-table-list-select">
                                        <select data-am-selected="{btnSize: 'sm'}" name="city" id="cid" >
                                            <option>影视类别</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                   <form action="{{ url('admins/video') }}">


                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                         
                                        <input type="text" class="am-form-field " name="vid"><br>
                                        <!-- <input type="submit" class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" name="name"> -->
                                        <span class="am-input-group-btn">
                                            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit"></button>
                                        </span>
                                        
                                    </div>
                                </form>
                                </div>





                                <div class="am-u-sm-14">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="video">
                                        <thead>
                                            <tr>
                                                <th>视频缩略图</th>
                                                <th>视频分类</th>
                                                <th>视频名称 </th>
                                                <th>上传时间</th>
                                                <th>审核状态</th>
												<th>操作</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($video as $v)
                                            <tr class="gradeX{{$v->vid}}">
                                                <td>
                                                    <img src="/houtai/img/k.jpg" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">{{$v->actor}}</td>
                                                <td class="am-text-middle">{{$v->vname}}</td>
                                                <td class="am-text-middle">{{$v->year}}</td>
												<td class="am-text-middle">未通过</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                     @if($v->jinyong == 0)
                                                        <button onclick="xiaoran({{$v->vid}},this)">
                                                            <i class="am-icon-pencil"></i> 通过
                                                        </button>
                                                     @else
                            
                                                        <button onclick="xiaoran({{$v->vid}},this)">
                                                            <i class="am-icon-pencil"></i> 未通过
                                                        </button>

                                                    @endif
                                                        <a href="{{url('admins/video/'.$v->vid.'/edit')}}">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;" class="tpl-table-black-operation-del" onclick="del({{$v->vid}})">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <!-- more data -->
                                        </tbody>
                                    </table>

                                <div class="">
                                 <ul class="">
                                    @foreach($video as $v )
                                        <li>{{ $v->name }}</li>
                                    @endforeach
                                </ul>
                               </div>
                               {!! $video->render() !!}
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
    <script src="{{ asset('admin/js/jquery-1.8.3.min.js') }}"></script>
    <!-- <script src="{{ asset('admin/js/jquery.js') }}"></script> -->
    <script src="{{ asset('admin/js/layer.js') }}"></script>



    @if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif
    <script src="/houtai/layer/layer.js"></script>
    <script>
        function del(vid){
            // alert(111);
            layer.confirm('确定删除?',{
                btn:['确定','取消']//按钮
                },function(){
                    $.post('{{url("admins/video/")}}/'+vid,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
                        if(data == 1){
                            var className = '.gradeX'+vid;
                            $(className).remove();
                            layer.msg('删除成功');
                        }else{
                            layer.msg('删除失败');
                        }

                    });
                }    
            );
        }

        function xiaoran(vid){
            // alert(111);
            layer.confirm('确定这么操作吗?亲',{
                btn:['确定操作','速度取消']//按钮
                },function(){
                    $.post('{{url("admins/video/")}}/'+vid,{'_token':'{{csrf_token()}}','_method':'update'},function(data){
                        if(data == 1){
                             var className = '.gradeX'+vid;
                            // $(className).remove();
                            layer.msg('操作成功' ,{icon: 1});
                        }else{
                            layer.msg('操作失败', {icon: 1});
                        }

                    });
                }    
            );
        }


        //js实现点击删除tr行,尚未成功
        // document.getElementById("del").onclick=function(){
        // this.parentNode.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode.parentNode);
        // }
        
    
      function hre(){
            location.href = "{{ url('/admins/video')}}";
        }
       
     $('select').live('change',function(){
                var id = $(this).val();
            $.get("{{ url('admins/video') }}"+"vid"+"="+id,function(data){
                // console.log(data);

                var info =  "<thead>";
                    info += "<tr>";
                     info +=   "<th>视频缩略图</th>";
                     info +=   "<th>视频分类</th>";
                     info +=   "<th>视频名称 </th>";
                     info +=   "<th>上传时间</th>";
                     info +=   "<th>审核状态</th>";
                      info +=   "<th>操作</th>";
                    info += "</tr>";
                info += "</thead>";
                info += "<tbody>";
                for (var i = 0; i < data.length; i++) {
                    info += "<tr class='even gradeC'>";
                    info += "<td>";
                    info += "<img src='"+data[i].vpic+"' class='tpl-table-line-img' alt=''>";
                    info += "</td>";
                    info += "<td class='am-text-middle'>"+data[i].vname+"</td>";
                    info += "<td class='am-text-middle'>"+data[i].actor+"</td>";
                    info += "<td class='am-text-middle'>"+data[i].year+"</td>";
                    info += "<td class='am-text-middle'>";
                    info += "<div class='tpl-table-black-operation'>";
                    info += "<a href='javascript:;'><i class='am-icon-pencil'></i>编辑</a>";
                    info += "<a href='javascript:;' class='tpl-table-black-operation-del' onclick='dele("+data[i].vid+")'><i class='am-icon-trash'></i> 删除</a>";
                    info += "</div>";
                    info += "</td>";
                    info += "</tr>";
                }
                info += "</tbody>";
                document.getElementById('video').innerHTML = info;
            });
        });

</script>
@endsection