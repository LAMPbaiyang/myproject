@extends('homes/layout/centermother')
@section('content')
    <!--right-->
  <style>
	html {
    background: #ecedf2;    
}

body {
  font: 12px/150% Arial, Verdana, "\5b8b\4f53";
  color: #666;
  background: #fff;
  _background-image: url(about:blank);
  _background-attachment: fixed;
}

a {
  color: #2ea7e7;
}

a {
  text-decoration: none;
}

img {
  vertical-align: middle;
}

.payment {
  background-color: #fff;
  padding: 12px 30px 0;
  -moz-box-shadow: 0 0 6px rgba(0, 0, 0, .2);
  -webkit-box-shadow: 0 0 6px rgba(0, 0, 0, .2);
  box-shadow: 0 0 6px rgba(0, 0, 0, .2);
  -moz-transition: all .2s ease-in-out;
  -o-transition: all .2s ease-in-out;
  -webkit-transition: all .2s ease-in-out;
  transition: all .2s ease-in-out;
}

.p-w-bd,
.pay-weixin {
  zoom: 1;
}

.p-w-bd:after,
.pay-weixin:after {
  display: table;
  content: "";
  clear: both;
}

.p-w-hd {
  margin-bottom: 20px;
  font-size: 18px;
  font-family: "Microsoft Yahei";
}

.p-w-bd {
  padding-left: 130px;
  margin-bottom: 30px;
}

.font-red {
  color: #ff5d5b;
}

.p-w-box {
  float: left;
  width: 300px;
}

.pw-box-hd {
  margin-bottom: 20px;
  border: 1px solid #ddd;
  width: 298px;
  height: 298px;
}

.pw-box-hd img {
  width: 298px;
  height: 298px;
  background: url(/qiantai/pay/images/ui-modal-loading.gif) center center no-repeat;
}

.pw-retry {
  display: none;
  position: absolute;
  width: 300px;
  height: 300px;
  left: 130px;
  top: 0;
  background: rgba(0, 0, 0, .4);
  overflow: hidden;
  text-align: center;
}

.pw-retry .ui-button {
  margin-top: 135px;
}

a.ui-button {
  height: 30px;
  line-height: 30px;
}

.ui-button-gray {
  background: #f1f2f7;
  filter: none;
  box-shadow: none;
  text-shadow: none;
  border-color: #999;
  color: #666;
}

.ui-button {
  display: inline-block;
  height: 32px;
  line-height: 32px;
  padding: 0 28px;
  color: #fff;
  border: none;
  border: 1px solid #f96765;
  background-color: #ff7573;
  background-repeat: repeat-x;
  background-image: -moz-linear-gradient(top, #ff7573, #f96765);
  background-image: -webkit-linear-gradient(top, #ff7573, #f96765);
  background-image: -o-linear-gradient(top, #ff7573, #f96765);
  background-image: linear-gradient(to bottom, #ff7573, #f96765);
  filter: progid: DXImageTransform.Microsoft.gradient(startColorstr='#ff7573', endColorstr='#f96765', GradientType=0);
  border-radius: 2px;
  vertical-align: middle;
  cursor: pointer;
  text-align: center;
  text-shadow: 0 1px 2px rgba(0, 0, 0, .2);
  box-shadow: 0 1px 0 0 #fe8c8a inset;
}

.pw-box-ft {
  height: 44px;
  padding: 8px 0 8px 125px;
  background: url(/qiantai/pay/images/icon-red.png) 50px 8px no-repeat #ff7674;
}

.pw-box-ft p {
  margin: 0;
  font-size: 14px;
  line-height: 22px;
  color: #fff;
  font-weight: 700;
}

.p-w-sidebar {
  float: left;
  width: 379px;
  height: 421px;
  padding-left: 50px;
  margin-top: -20px;
  background: url(/qiantai/pay/images/phone-bg.png) 50px 0 no-repeat;
}
.payment-change .pc-wrap {
    display: block;
    height: 60px;
    line-height: 56px;
    padding: 0 20px;
    -moz-transition: all .1s;
    -o-transition: all .1s;
    -webkit-transition: all .1s;
    transition: all .1s;
}
.payment-change .pc-wrap strong {
    color: #2ea7e7;
    margin-right: 30px;
    font-size: 14px;
    float: left;
    cursor: pointer;
}
.payment-change .pc-wrap .pc-w-arrow-left, .payment-change .pc-wrap .pc-w-arrow-right {
    float: right;
    font-family: "\5b8b\4f53";
    font-style: normal;
    font-size: 22px;
    width: 20px;
    text-align: center;
    color: #2fa1dd;
}
.payment-change .pc-wrap .pc-w-arrow-left {
    float: left;
    margin-right: 15px;
}
</style>
<div class="payment">
	
  <!-- 微信支付 -->
  <div class="pay-weixin">
    <div class="p-w-hd">官方二维码支付</div>
    <div class="p-w-bd" style="position:relative">
      <div class="j_weixinInfo font-red" style="position:absolute; top: -36px; left: 130px;">二维码已过期，<a href="javascript:getWeixinImage();">刷新</a>页面重新获取二维码。</div>
      <div class="p-w-box">
        <div class="pw-box-hd">
          <img id="weixinImageURL" src="/qiantai/pay/images/erweima.png" width="298" height="298">
        </div>
        <div class="pw-retry j_weixiRetry" style="display: none;">
          <a class="ui-button ui-button-gray j_weixiRetryButton" href="javascript:getWeixinImage();">获取失败 点击重新获取二维码  </a>
        </div>
        <div class="pw-box-ft">
          <p>请使用微信/支付宝 扫一扫</p>
         
        </div>
      </div>
      <div class="p-w-sidebar"></div>
    </div>
  </div>
  <!-- 微信支付 end -->
  <!-- payment-change 变更支付方式 -->
  <div class="tr_paybox"  style="padding-left:110px">
  	
  	<button><a class="btn" href="{{url('homes/huiyuan/create')}}">如已支付页面未自动刷新,请点击此处进行查看</a></button>
 	
   </div>

  <!-- payment-change 变更支付方式 end -->
</div>

<script type="text/javascript">
  $(document).ready(function(){
            getWeixinImage();
        });
</script>  
 

@endsection