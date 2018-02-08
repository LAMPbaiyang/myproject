<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="login/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="login/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="admins/login/css/amazeui.min.css" />
    <link rel="stylesheet" href="admins/login/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="admins/login/css/app.css">
    <script src="login/js/jquery.min.js"></script>
    @if(session('msg'))
    <script>

    alert('{{session("msg")}}');
    </script>
    @endif
</head>

<body data-type="login">
    <script src="login/js/theme.js"></script>
    <div class="am-g tpl-g">
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
        <div class="tpl-login">
            <div class="tpl-login-content">
                <div class="tpl-login-logo">

                </div>



                <form action="{{url('ad_login')}}" class="am-form tpl-form-line-form" method="post">
                    {{csrf_field()}}
                    <div class="am-form-group">
                        <input type="text" class="tpl-form-input" name="tel" id="user-name" placeholder="请输入手机号">

                    </div>

                    <div class="am-form-group">
                        <input type="password" name="upass" class="tpl-form-input" id="user-name" placeholder="请输入密码">

                    </div>

                    <div class="am-form-group">
                        <input type="password" name="code" class="tpl-form-input" id="user-name" placeholder="请输入验证码">
                        <img src="{{url('code')}}">

                    </div>
                    <div class="am-form-group tpl-login-remember-me">
                        <input id="remember-me" type="checkbox">
                        <label for="remember-me">
       
                        记住密码
                         </label>

                    </div>






                    <div class="am-form-group">

                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="login/js/amazeui.min.js"></script>
    <script src="login/js/app.js"></script>

</body>

</html>