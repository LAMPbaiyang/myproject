<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>网站注册</title>
<link rel="stylesheet" href="/qiantai/register/css/style.css" />
<body style="background:url('/qiantai/register/img/demo.jpg') no-repeat;
  background-size:100%;">

<div class="register-container">
  <h1>注册</h1>
  
  <div class="connect">
    <p>亲！您的到来我们感到非常荣幸，欢迎您成为我们中的一员</p>
  </div>
  
  <form action="{{url('homes/doregister')}}"  method="post" id="registerForm">
    {{csrf_field()}}
    @if(!empty(session('msg')))
      <div>
        <ul>
          <li style="color:red;">{{ session('msg') }}</li>
        </ul>
      </div>
    @endif
    @if (count($errors) > 0)
      <div class="label">
        <ul>
          @if(is_object($errors))
            @foreach ($errors->all() as $error)
              <li style="color:red;">{{ $error }}</li>
            @endforeach
          @else
            <li style="color:red;">{{ $errors }}</li>
          @endif
        </ul>
      </div>
    @endif

    <div>
      <input type="text" name="name" class="name" placeholder="请设置用户名" oncontextmenu="return false" autocomplete="off" onpaste="return false" value="{{old('name')}}" />
    </div>
    <div>
      <input type="password" name="password" class="password" placeholder="请设置密码" oncontextmenu="return false"  autocomplete="off" onpaste="return false" value="{{old('password')}}" />
    </div>

    <div>
      <input type="password" name="confirm_password" class="confirm_password" placeholder="再次输入密码" autocomplete="off" oncontextmenu="return false" onpaste="return false" />
    </div>
    <div>
      <input type="text" name="phone_number" class="phone_number" placeholder="请输入您的11位手机号" autocomplete="off"  onblur="upperCase()" id="number" value="{{old('phone_number')}}"/>
    </div>
      <a href="javascript:;" onclick="sendcode()" id = "sendcode">发送验证码</a>
      <input type = "text" name="code" id="writecode" placeholder="请输入验证码" class = "code" oncontextmenu="return false" onpaste="return false" value="{{old('code')}}" />
    
    

    <button id="submit" type = "submit" onclick="register()">注 册</button>
  </form>
  <a href="{{url('homes/login')}}">
    <button type="button" class="register-tis">已经有账号？</button>
  </a>

</div>


<script src="/qiantai/register/js/jquery-1.8.3.min.js"></script>
<script src="/qiantai/register/js/common.js')}}"></script>
<!--背景图片自动更换-->
<script src="/qiantai/register/js/supersized.3.2.7.min.js"></script>
<script src="/qiantai/register/js/supersized-init.js"></script>
<!--表单验证-->
<script src="/qiantai/register/js/jquery.validate.min.js?var1.14.0"></script>
<script type="text/javascript">


function upperCase()
        {
        var phone = document.getElementById('number').value;
        if(!(/^1[34578]\d{9}$/.test(phone))){ 
            alert("手机号码有误，请重填");  
            return false; 
        } 
        }


  if ($('#sendcode').html() == '发送验证码')
  {
      var zhuce = $("#submit");
      zhuce.attr("disabled",true).html("您未发送验证码");
  }else {
      zhuce.html('注册');
  }
    //获取用户输入的手机号
    function sendcode() {
        var phone_number = $("#number").val();
        if (true == this.stop) return false;//防止重复点击
        this.stop = true;
        //alert(phone_number);

        var btn = $('#sendcode');
        btn.attr("disabled", true).html("正在发送");
        var _no = 60;
        var time = setInterval(function () {
            _no--;
            btn.html(_no + "秒后重发");
            if (_no == 0) {
                //btn.attr("disabled", false).html("获取验证码");
                btn.removeAttr('disabled').html("重新获取验证码");
                this.stop = false;
                _no = 60;
                clearInterval(time);
            }
        }, 1000);

        if ($('#sendcode').html() == '发送验证码')
        {
            var zhuce = $("#submit");
            zhuce.attr("disabled",true).html("您未发送验证码");
        }else {
            $('#submit').removeAttr('disabled').html('注册');
        }




//    alert(phone_number);
        $.post('{{url('register/SMS')}}',{'phone':phone_number,'_token':'{{csrf_token()}}'},function(data){
            console.log(data);
            var data = JSON.parse(data);
            if(data.status == 0){
                alert(data.message);
            }else{
                alert('发送失败，请重新发送');
            }
        })
    }
</script>


</body>
</html>
