<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>腾龙TV后台</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/houtai/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/houtai/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="/houtai/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/houtai/css/amazeui.min.css" />
    <link rel="stylesheet" href="/houtai/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/houtai/css/app.css">
    <script src="/houtai/js/jquery.min.js"></script>

</head>

<body data-type="index">
    <script src="/houtai/js/theme.js"></script>
    <div class="am-g tpl-g">
        <!-- 头部 -->
        <header>
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <a href="javascript:;"><img src="/houtai/img/logo.png" alt=""></a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <!-- 侧边切换 -->
                <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
                </div>
                <!-- 搜索 -->
                <div class="am-fl tpl-header-search">
                    <form class="tpl-header-search-form" action="javascript:;">
                        <button class="tpl-header-search-btn am-icon-search"></button>
                        <input class="tpl-header-search-box" type="text" placeholder="搜索内容...">
                    </form>
                </div>
                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="javascript:;">腾龙TV, <span></span>欢迎你 </a>
                        </li>                 
                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="{{url('admins/login')}}">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <!-- 侧边导航栏 -->
        <div class="left-sidebar">
            <!-- 用户信息 -->
            <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="/houtai/img/user04.png" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              视频项目组
          </span>
                </div>
            </div>

            <!-- 菜单 -->
            <ul class="sidebar-nav">
                <li class="sidebar-nav-heading">龙腾TV</li>
                <li class="sidebar-nav-link">
                    <a href="{{url('admins')}}" class="active">
                        <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                    </a>
                </li>
				
				 <li class="sidebar-nav-link">
                    <a href="{{url('admins/users')}}">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 管理员管理  
                    </a>           
                </li>
		
                <li class="sidebar-nav-link">
                    <a href="{{url('admins/user')}}">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 用户管理
                    </a>
                </li>
                
				
                <li class="sidebar-nav-link">
                    <a href="{{url('admins/video')}}">
                        <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 视频管理

                    </a>
                </li>
            
				
				 <li class="sidebar-nav-link">
                    <a href="{{url('admins/upload')}}">
                        <i class="am-icon-bar-chart sidebar-nav-link-logo"></i> 上传视频

                    </a>
                </li>
				
				
               <!--  <li class="sidebar-nav-heading">Page<span class="sidebar-nav-heading-info"> 常用页面</span></li> -->
               
                <li class="sidebar-nav-link">
                    <a href="{{url('admins/ads')}}">
                        <i class="am-icon-clone sidebar-nav-link-logo"></i> 轮播图管理
                       
                    </a>
                </li>    
				
               <!-- 暂时不写
                <li class="sidebar-nav-link">
                    <a href="login.html">
                        <i class="am-icon-key sidebar-nav-link-logo"></i> 网站配置(暂未开放)
                    </a>
                </li>
				-->
                 
            
				

            </ul>
        </div>
	</div>
		<!-- 内容正文 -->
		@yield('content')