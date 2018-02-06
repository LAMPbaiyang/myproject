@extends('admin/gonggong')
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span>添加友情链接</div>

                    </div>
                   
                </div>
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
 
                            <div class="widget-body am-fr">
                                    
                                <form class="am-form tpl-form-border-form">
                                    
                                     <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-12 am-form-label am-text-left">所属上级栏目<span class="tpl-form-line-small-title">Author</span></label>
                                        <div class="am-u-sm-12  am-margin-top-xs">
                                            <select data-am-selected="{searchBox: 1}" style="display: none;">
                                            <option value="a">-The.CC</option>
                                            <option value="b">夕风色</option>
                                            <option value="o">Orange</option>
                                            </select>

                                        </div>
                                    </div>

                                    
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">栏目名称</label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入标题文字">
                                            
                                        </div>
                                    </div>

                                  
                                   

                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-12 am-form-label am-text-left">介绍</label>
                                        <div class="am-u-sm-12">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入标题文字">
                                            
                                        </div>
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