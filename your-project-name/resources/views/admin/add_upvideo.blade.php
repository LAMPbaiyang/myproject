@extends('admin/gonggong')
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span>视频添加</div>

                    </div>
                   
                </div>
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                          
                               
                                <div class="widget-function am-fr">
                                   
                               
                            </div>


                            <div class="widget-body am-fr">
                                    
                                <form class="am-form tpl-form-border-form">

                    
                                     <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-6 am-form-label  am-text-left">选择视频:</label>
                                        <div class="am-u-sm-12 am-margin-top-xs">
                                            <div class="am-form-group am-form-file">
                                               <!--  <div class="tpl-form-file-img">
                                                    <img src="/houtai/img/a5.png" alt="">
                                                </div> -->
                                                <button type="button" class="am-btn am-btn-danger am-btn-sm ">
                                                    <i class="am-icon-cloud-upload"></i>添加视频</button>
                                                <input id="doc-form-file" type="file" multiple="">
                                            </div>

                                        </div>
                                    </div>

                                   
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">视频名称</label>
                                        <div class="am-u-sm-3">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入视频名称">
                                         </div>

                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">视频简介</label>
                                        <div class="am-u-sm-3 ">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="介绍">
                                       </div>
                                    

                                  
                                        <label for="user-phone" class="am-u-sm-12 am-form-label am-text-left">所属频道</label>
                                        <div class="am-u-sm-12 am-margin-top-xs">
                                            <select data-am-selected="{searchBox: 1}" style="display: none;">
                                            <option value="a">-The.CC</option>
                                            <option value="b">夕风色</option>
                                            <option value="o">Orange</option>
                                            </select>

                                        </div>
                       

                                    
                                     
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">作者</label>
                                        <div class="am-u-sm-2">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入作者">
                                            
                                        </div>
                            

                                  
                                        <label for="user-email" class="am-u-sm-12 am-form-label am-text-left">发布时间</label>
                                        <div class="am-u-sm-2">
                                            <input type="text" class="am-form-field tpl-form-no-bg am-margin-top-xs" placeholder="发布时间" data-am-datepicker="" readonly="">
                                        </div>
                                    <div class="am-form-group">
                                        <div class="am-u-sm-12 am-u-sm-push-12">
                                            <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection