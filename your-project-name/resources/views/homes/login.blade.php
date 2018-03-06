<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login</title>
<link rel="stylesheet" type="text/css" href="/qiantai/login/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/qiantai/login/css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/qiantai/login/css/component.css" />
<!--[if IE]>
<script src="/admins/i/js/html5.js"></script>
<![endif]-->
</head>
<body>
        <div class="container demo-1">
            <div class="content">
                <div id="large-header" class="large-header">
                    <canvas id="demo-canvas"></canvas>
                    <div class="logo_box">
                        <h3>欢迎你</h3>
                        <form action="{{url('homes/login')}}"  method="post">
                            {{csrf_field()}}
                            <div class="input_outer">
                                <span class="u_user"></span>
                                <input name="name" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
                            </div>
                            <div class="input_outer">
                                <span class="us_uer"></span>
                                <input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                            </div>
                            <div class="input_outer">
                                <span class="us_uer"></span>
                                <input name="codes" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="text" placeholder="请输入验证码">
                                
                            </div>
                                <div>
                                    <center>
                                    <a onclick="javascript:re_captcha();" ><img src="{{ url('homes/codes/1/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0"></a>
                                    </center>
                                </div>
                               
                                
                            <div class="mb2"><button type="submit"  class="act-but submit"  style="color: #FFFFFF">登录</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /container -->
        <script src="/qiantai/login/js/TweenLite.min.js"></script>
        <script src="/qiantai/login/js/EasePack.min.js"></script>
        <script src="/qiantai/login/js/rAF.js"></script>
        <script src="/qiantai/login/js/demo-1.js"></script>
        <div style="text-align:center;">
</div>
    </body>
    <script>  
      function re_captcha() {
        $url = "{{ URL('homes/codes/1') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;


      }
    </script>

            @if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
          @endif
</html>