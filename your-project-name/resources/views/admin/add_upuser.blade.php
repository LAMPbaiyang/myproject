@extends('admin/gonggong')
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">

                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span>用户添加</div>

                    </div>
                </div>
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                            <div class="widget-body am-fr">
                                    
                                
                                   

                                <form class="am-form tpl-form-border-form">
                                    <div class="am-form-group">
                                        <div class="am-u-sm-4">
                                          <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入用户名">
                                        </div>
                                    </div>
                                     <div class="am-form-group">
                                        <div class="am-u-sm-4">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入账号">
                                        </div>
                                    </div>
                                     <div class="am-form-group">
                                        <div class="am-u-sm-4">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="手机号">
                                        </div>
                                    </div>
                                     <div class="am-form-group">
                                        <div class="am-u-sm-4">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="请输入密码">
                                        </div>
                                    </div>
                                     <div class="am-form-group">
                                        <div class="am-u-sm-4">
                                            <input type="text" class="tpl-form-input am-margin-top-xs" id="user-name" placeholder="确认密码">
                                        </div>
                                    </div>
                                      <div class="am-form-group">
                                        <div class="am-u-sm-12 am-margin-top-xs">
                                            <div class="am-form-group am-form-file">
                                               
                                                <button type="button" class="am-btn am-btn-danger am-btn-sm ">
                                                    <i class="am-icon-cloud-upload"></i>选择头像</button>
                                                <input id="doc-form-file" type="file" multiple="">
                                            </div>

                                        </div>
                                    </div>
                                     <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-12 am-form-label am-text-left">权限</label>
                                        <div class="am-u-sm-12  am-margin-top-xs">
                                            <select data-am-selected="{searchBox: 1}" style="display: none;">
                                            <option value="a">普通管理</option>
                                            <option value="b">高层管理</option>
                                            <option value="o">最大BOSS</option>
                                            </select>

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
@endsection