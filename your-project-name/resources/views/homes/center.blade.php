<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>会员中心</title>
<!--[if IE]>
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="/qiantai/css/ie7.css">
<![endif]-->
<link rel="stylesheet" type="text/css" href="/qiantai/css/jiazaitoubu.css">
<link rel="stylesheet" type="text/css" href="/qiantai/css/css.css">
<script src="/qiantai/js/jquery-1.8.3.min.js"></script>
<script src="/qiantai/js/index2.js"></script>
<link rel="stylesheet" type="text/css" href="/qiantai/css/center.css">
</head>
<body>
<!--top-->

<!--导航加搜索框-->

<!--导航-->
<div class="dao_hang">
    <div class="nav_css">
        <div class="dao_list">
            <a href="#">首页</a>
            <a href="#">我的视频</a>
        </div>    
    </div>
</div>

<!--当前位置-->
<div class="now_positionm">
<span>当前位置：</span><a href="#">首页></a><a href="#">个人中心</a>
</div>
<!--centers-->
<div class="centers_m">
    <!--清除浮动-->
    <div class="clear_sm"></div>
    <!--left-->
    <div class="centers_ml">
        <!--头像-->
        <div class="center_header">
            <a href="#"><img src="/qiantai/images/66f625e1ecfd7ad8244efabaa744aa73.png"/></a>
            <em>您好，<font>admin</font></em>
        </div>
        <!--列表go-->
        <div class="centers_listm">
            <div class="centers_listm_one">
                <img src="/qiantai/images/zshy.png"/>
                <em>会员中心</em>
            </div>
            <!--一条开始-->
            <div class="centers_listm_one_in">
                <img src="/qiantai/images/shezhi.png"/>
                <em>资料管理</em>
                <b></b>
            </div>
            <span class="gjszmdm">
                <a href="#" class="center_in_self"><font>信息资料</font></a>
                <a href="#" class="center_in_self"><font>收藏管理</font></a>
            </span>
            <!--一条开始-->
            <div class="centers_listm_one_in">
                <img src="/qiantai/images/ddgl.png"/>
                <em>上传管理</em>
                <b></b>
            </div>
            <span class="gjszmdm">
                <a href="#" class="center_in_self"><font>上传视频</font></a>
                <a href="#" class="center_in_self"><font>管理视频</font></a>
            </span>
            <!--一条开始-->
            <div class="centers_listm_one_in">
                <img src="/qiantai/images/suo.png"/>
                <em>账户安全</em>
                <b></b>
            </div>
            <span class="gjszmdm">
                <a href="#" class="center_in_self"><font>账号安全</font></a>
                <a href="#" class="center_in_self"><font>个人中心</font></a>
            </span>    
            <!--一条开始-->
            <div class="centers_listm_one_in">
                <img src="/qiantai/images/wdssc.png"/>
                <em>收藏管理</em>
                <b></b>
            </div>
            <span class="gjszmdm">
                <a href="#" class="center_in_self"><font>视频收藏</font></a>
                <a href="#" class="center_in_self"><font>视频收藏</font></a>
            </span>    
            <!--一条开始-->
            <div class="centers_listm_one_in">
                <img src="/qiantai/images/myfridend.png"/>
                <em>好友管理</em>
                <b></b>
            </div>
            <span class="gjszmdm">
                <a href="#" class="center_in_self"><font>我的消息</font></a>
                <a href="#" class="center_in_self"><font>我的好友</font></a>
            </span>
        </div>
        <script type="text/javascript">
        $(function(){//第一步都得写这个
            $(".centers_listm_one_in").click(function(){
            $(this).next(".gjszmdm").slideToggle().siblings("gjszmdm").slideUp()
            });
        })
        </script>
    </div>
    <!--right-->
    <div class="centers_mr">
    <h1 class="welcom_tm">欢迎您，超级会员     <font>admin</font>！您上次登录时间为 2016-10-28 14:23</h1>
    <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">登录密码修改</div>
            <!--提示信息--> 
            <div class="tip_notem">
                <ul>
                    <li>1.请牢记登录密码</li>
                    <li>2.如果丢失密码，可以通过绑定的手机或邮箱找到</li>
                </ul>
            </div>
            <div class="public_m4">
                <p>
                    <em>原密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p>
                    <em>新的密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <p>
                    <em>确认密码：</em>
                    <input type="text" style=" height:23px; border:1px solid #eaeaea; width:140px">
                </p>
                <a href="#" class="public_m3">确认修改</a>
            </div>
        </div>  
   
    <!--一条开始-->
        <div class="public_m1">
            <div class="public_m2">浏览历史</div>
            <!--一个订单信息-->
            <div class="public_m5">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr style=" border-bottom:1px solid #000">       
                            <th class="olist1">视频名</th>       
                            <th class="olist2">视频链接</th>       
                            <th class="olist3">收藏人气</th>            
                            <th class="olist4">操作</th>
                        </tr>   
                        <tr>        
                            <td><a href="#">琅琊榜</a></td>     
                            <td>.........</td>      
                            <td>1000</td>
                            <td><a href="#">取消收藏</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--当没有东西时的东西-->
            <div class="public_m6">
                <img src="/qiantai/images/danmgydxm.png"/>
            </div>
        </div>
   
   
    
   
    
    
                                                   
    </div>
</div>
<!--页脚-->
<!--底部样式-->
<
</body>
</html>

 
            
                    
          
        
                
            
            
                          
    
           
        
                     
                    
            
           
        
                 
            
       
            
            
            
            
        
                         
       
                                                     
                            
                          
                
        
        
                         
           
            
             
            
                    
            
            
                
                           
                

        
                
                        
                
                
                        
               
             
                 
                
                
                
                
                
            
                  
        
        
    
            

                
    
