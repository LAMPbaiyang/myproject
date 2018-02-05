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
                                                <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                                <th>视频缩略图</th>
                                                <th>视频分类</th>
                                                <th>视频简介</th>
                                                <th>上传时间</th>
												<th>审核状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeX">
                                                <td>
                                                    <img src="/houtai/img/k.jpg" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">Amaze UI 模式窗口</td>
                                                <td class="am-text-middle">张鹏飞</td>
                                                <td class="am-text-middle">2016-09-26</td>
												<td class="am-text-middle">未通过</td>
                                                <td class="am-text-middle">
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
                                                <td>
                                                    <img src="/houtai/img/k.jpg" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">有适配微信小程序的计划吗</td>
                                                <td class="am-text-middle">天纵之人</td>
                                                <td class="am-text-middle">2016-09-26</td>
												<td class="am-text-middle">已通过</td>
                                                <td class="am-text-middle">
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
                                            <tr class="gradeX">
                                                <td>
                                                    <img src="/houtai/img/k.jpg" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">请问有没有amazeui 分享插件</td>
                                                <td class="am-text-middle">王宽师</td>
                                                <td class="am-text-middle">2016-09-26</td>
												<td class="am-text-middle">未审核</td>
                                                <td class="am-text-middle">
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
                                                <td>
                                                    <img src="/houtai/img/k.jpg" class="tpl-table-line-img" alt="">
                                                </td>
                                                <td class="am-text-middle">关于input输入框的问题</td>
                                                <td class="am-text-middle">着迷</td>
                                                <td class="am-text-middle">2016-09-26</td>
												<td class="am-text-middle">未审核</td>
                                                <td class="am-text-middle">
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