@extends('admins.parent')
@section('content')


<!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 添加用户 </div>

                    </div>
                    <div class="am-u-lg-3 tpl-index-settings-button">
                        <button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置</button>
                    </div>
                </div>

            </div>
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加用户表单</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{url('admins/column')}}" method='post'>
                                {{ csrf_field() }}
                              <!--   {{ method_field('PUT') }} -->
                                    
                                    
                                     <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户昵称 <span class="tpl-form-line-small-title">uname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" name="cname" id="user-name" placeholder="栏目名称">    
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户昵称 <span class="tpl-form-line-small-title">uname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" name="vname" id="user-name" placeholder="视频名称">    
                                        </div>
                                    </div>
                                    
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户昵称 <span class="tpl-form-line-small-title">uname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" name="vpic" id="user-name" placeholder="图片">    
                                        </div>
                                    </div>
                                    
									
									

                                 <!--    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">用户密码 <span class="tpl-form-line-small-title">upass</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="am-form-field tpl-form-no-bg" placeholder="请输入8到30位正确密码" data-am-datepicker="" readonly="">
                                            
                                        </div>
                                    </div>
									
									
                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">确认密码 <span class="tpl-form-line-small-title">upass</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="am-form-field tpl-form-no-bg" placeholder="请保证两次输入密码一致" data-am-datepicker="" readonly="">
                                            
                                        </div>
                                    </div>
									
									
                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">用户权限<span class="tpl-form-line-small-title">Author</span></label>
                                        <div class="am-u-sm-9">
                                            <select data-am-selected="{searchBox: 1}" style="display: none;">
  <option value="1">普通用户</option>
  <option value="2">VIP用户</option>
  <option value="o">封禁用户</option>
</select>

                                        </div>
                                    </div> -->


                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            

    </div>
  
    <script src="/houtai/js/amazeui.min.js"></script>
    <script src="/houtai/js/amazeui.datatables.min.js"></script>
    <script src="/houtai/js/dataTables.responsive.min.js"></script>
    <script src="/houtai/js/app.js"></script>

</body>

</html>
@endsection('content')