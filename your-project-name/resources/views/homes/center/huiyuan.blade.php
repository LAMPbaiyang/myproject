@extends('homes/layout/centermother')
@section('content')
    <!--right-->
 
 <link rel="stylesheet" type="text/css" href="/qiantai/huiyuan/css/amazeui.min.css" />
 <link rel="stylesheet" type="text/css" href="/qiantai/huiyuan/css/main.css" />
 <div class="pay">
            <!--主内容开始编辑-->
            <div class="tr_recharge">
                <div class="tr_rechtext">
                    <p class="te_retit"><img src="/qiantai/huiyuan/images/coin.png" alt="" />充值中心</p>
                    <p>1.腾龙TV欢迎您成为我们的尊贵会员用户。</p>
                    <p>2.切勿相信他人私自提供的二维码扫描,请看清官网地址后充值,谢谢合作。</p>
                </div>
                <form action="{{url('homes/huiyuan')}}" method="post" class="am-form" id="doc-vld-msg">
                    {{ csrf_field() }}
                    <div class="tr_rechbox">
                        <div class="tr_rechhead">
                            <img src="/qiantai/huiyuan/images/pay1.png" />
                            <p>充值帐号：
                                <a>腾龙tv官方账户</a>
                            </p>
                            
                        </div>
                        <div class="tr_rechli am-form-group">
                            <ul class="ui-choose am-form-group" id="uc_01">
                                <li>
                                    <label class="am-radio-inline">
                                            <input type="radio"  value="" name="docVlGender" required data-validation-message="请选择一项充值额度"> 一个月会员
                                        </label>
                                </li>
                                <li>
                                    <label class="am-radio-inline">
                                            <input type="radio" name="docVlGender" data-validation-message="请选择一项充值额度"> 两个月会员
                                        </label>
                                </li>

                                <li>
                                    <label class="am-radio-inline">
                                            <input type="radio" name="docVlGender" data-validation-message="请选择一项充值额度"> 六个月会员
                                        </label>
                                </li>
                               <li>
                                    <label class="am-radio-inline">
                                            <input type="radio" name="docVlGender" data-validation-message="请选择一项充值额度"> 年费会员
                                        </label>
                                </li>
                            </ul>
                            
                        </div>
                        <div class="tr_rechcho am-form-group">
                            <span>充值方式：</span>
                            <label class="am-radio">
                           
                                    <input type="radio" name="radio1" value="" data-am-ucheck required data-validation-message="请选择一种充值方式"><img src="/qiantai/huiyuan/images/wechatpay.png"/>
                                
                                </label>
                            <label class="am-radio" style="margin-right:30px;">
                                
                                    <input type="radio" name="radio1" value="" data-am-ucheck data-validation-message="请选择一种充值方式"><img src="/qiantai/huiyuan/images/zfbpay.png"/>
                                    
                                </label>
                        </div>
                        <div class="tr_rechnum">
                            <span>应付金额：</span>
                            <p class="rechnum">0.00元</p>
                        </div>
                    </div>
                    <div class="tr_paybox">
                        <button type="submit"  class="tr_pay am-btn" >确认支付</button>
                        <span>温馨提示：开通会员期间工作人员不会以任何方式联系您，遇到问题请拨打官方联系电话。</span>
                    </div>
                </form>
            </div>
        </div>

        <script src="/qiantai/huiyuan/js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="/qiantai/huiyuan/js/amazeui.min.js"></script>
        <script type="text/javascript" src="/qiantai/huiyuan/js/ui-choose.js"></script>

        <script type="text/javascript">
            // 将所有.ui-choose实例化
            $('.ui-choose').ui_choose();
            // uc_01 ul 单选
            var uc_01 = $('#uc_01').data('ui-choose'); // 取回已实例化的对象
            uc_01.click = function(index, item) {
                console.log('click', index, item.text())
            }
            uc_01.change = function(index, item) {
                console.log('change', index, item.text())
            }
            $(function() {
                $('#uc_01 li:eq(3)').click(function() {
                    $('.tr_rechoth').show();
                    $('.tr_rechoth').find("input").attr('required', 'true')
                    $('.rechnum').text('10.00元');
                })
                $('#uc_01 li:eq(0)').click(function() {
                    $('.tr_rechoth').hide();
                    $('.rechnum').text('10.00元');
                    $('.othbox').val('');
                })
                $('#uc_01 li:eq(1)').click(function() {
                    $('.tr_rechoth').hide();
                    $('.rechnum').text('20.00元');
                    $('.othbox').val('');
                })
                $('#uc_01 li:eq(2)').click(function() {
                    $('.tr_rechoth').hide();
                    $('.rechnum').text('60.00元');
                    $('.othbox').val('');
                })
                 $('#uc_01 li:eq(3)').click(function() {
                    $('.tr_rechoth').hide();
                    $('.rechnum').text('118.00元');
                    $('.othbox').val('');
                })
            })

            $(function() {
                $('#doc-vld-msg').validator({
                    onValid: function(validity) {
                        $(validity.field).closest('.am-form-group').find('.am-alert').hide();
                    },
                    onInValid: function(validity) {
                        var $field = $(validity.field);
                        var $group = $field.closest('.am-form-group');
                        var $alert = $group.find('.am-alert');
                        // 使用自定义的提示信息 或 插件内置的提示信息
                        var msg = $field.data('validationMessage') || this.getValidationMessage(validity);

                        if(!$alert.length) {
                            $alert = $('<div class="am-alert am-alert-danger"></div>').hide().
                            appendTo($group);
                        }
                        $alert.html(msg).show();
                    }
                });
            });
        </script>
@if (session('msg'))
            <script>
                alert("{{ session('msg') }}");
            </script>
    @endif
    
@endsection