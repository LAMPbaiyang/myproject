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
                                
                                

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                                <th>视频id</th>
                                                <th>视频名字</th>
                                                <th>视频图片</th>
                                                <th>视频分类</th>
												<th>like</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($video as $v)
                                            <tr class="gradeX">
                                                <td class="am-text-middle">{{$v->vid}}</td>
                                                <td class="am-text-middle">{{$v->vname}}</td>
                                                <td class="am-text-middle">{{$v->vpic}}</td>
                                                <td class="am-text-middle">{{$v->vsummary}}</td>
												<td class="am-text-middle">{{$v->like}}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                    <a href="javascript:;">
                                                        <i class="am-icon-pencil"></i><a href="{{url('admins/video/'.$v->uid.'/edit')}}"> 修改</a>
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
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        <ul class="am-pagination tpl-pagination">
                                            <li class="am-disabled"><a href="#">«</a></li>
                                            <li class="am-active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">5</a></li>
                                            <li><a href="#">»</a></li>
                                        </ul>
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
 <script src="/houtai/js/app.js"></script>

</body>

</html>
@endsection