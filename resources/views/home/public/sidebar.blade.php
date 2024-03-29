     <!--引用弹窗-->
  <link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
    <script src="/layui-v2.4.5/layui/layui.js"></script>
    <script>
    layui.use(['layer', 'form'], function(){

      var layer = layui.layer;
      
     
    });
    </script>
 <div class=tip>
            <div id="sidebar">
                <div id="wrap">
                    <div id="prof" class="item ">
                        <a href="# ">
                            <span class="setting "></span>
                        </a>
                        @if(session('home_login')) 
                        <div class="ibar_login_box status_login ">
                            <div class="avatar_box ">
                                <p class="avatar_imgbox "><img src="/uploads/{{session('home_userinfo')->profile}} " /></p>
                                <ul class="user_info ">
                                    <li>{{session('home_user')->uname}}</li>
                                </ul>
                            </div>
                            <div class="login_btnbox ">
                                <a href="# " class="login_order ">我的订单</a>
                                <a href="# "  class="login_favorite" onclick="collect()">我的收藏</a>
                            </div>
                            <i class="icon_arrow_white "></i>
                        </div>
                        @else
                        <div class="ibar_login_box status_login ">
                            <div class="avatar_box ">
                                <p class="avatar_imgbox "><img src="/ho/images/no-img_mid_.jpg " /></p>
                                <ul class="user_info ">
                                    <li>游客{{ rand(0001,9999) }},你好</li>
                                </ul>
                            </div>
                            <div class="login_btnbox ">
                                <a href="/home/login" class="login_order ">亲，请登录</a>
                                <a href="/home/register" class="login_favorite ">免费注册</a>
                            </div>
                            <i class="icon_arrow_white "></i>
                        </div>
                        @endif
                    </div>
                    <div id="shopCart shopCart-aabbcc" class="item ">
                        <a href="/home/car/index">
                            <span class="message "></span>
                        </a>
                        <p>
                            购物车
                        </p>
                        <p class="cart_num ">{{ $car_count }}</p>

                    </div>
                    <div id="brand " class="item ">
                        <a href="/home/car/index">
                            <span class="wdsc "><img src="/ho/images/wdsc.png " /></span>
                        </a>
                        <div class="mp_tooltip " onclick="collect()">
                            我的收藏
                            <i class="icon_arrow_right_black "></i>
                        </div>
                    </div>

                    <div class="quick_toggle ">
                        <!--二维码 -->
                        <li class="qtitem ">
                            <a href="#none "><span class="mpbtn_qrcode "></span></a>
                            <div class="mp_qrcode " style="display:none; "><img src="/ho/images/weixin_code_145.png " /><i class="icon_arrow_white "></i></div>
                        </li>
                        <li class="qtitem ">
                            <a href="#top " class="return_top "><span class="top "></span></a>
                        </li>
                    </div>

                    <!--回到顶部 -->
                    <div id="quick_links_pop " class="quick_links_pop hide "></div>

                </div>

            </div>
            <div id="prof-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    我
                </div>
            </div>
            <div id="shopCart-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    购物车
                </div>
            </div>
            <div id="asset-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    资产
                </div>

                <div class="ia-head-list ">
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">优惠券</div>
                    </a>
                    <a href="# " target="_blank " class="pl ">
                        <div class="num ">0</div>
                        <div class="text ">红包</div>
                    </a>
                    <a href="# " target="_blank " class="pl money ">
                        <div class="num ">￥0</div>
                        <div class="text ">余额</div>
                    </a>
                </div>

            </div>
            <div id="foot-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    足迹
                </div>
            </div>
            <div id="brand-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    收藏
                </div>
            </div>
            <div id="broadcast-content " class="nav-content ">
                <div class="nav-con-close ">
                    <i class="am-icon-angle-right am-icon-fw "></i>
                </div>
                <div>
                    充值
                </div>
            </div>
        </div>


<!--收藏夹提示信息-->
             <script type="text/javascript">
                function collect(){
                $.get('/home/login/collect',function(res){

                    if(res.msg == 'err'){
                            layer.msg(res.info);
                        }else {
                             window.location.href='/home/myself/collect';
                        
                        }

                },'json')
         
                }
            </script>
<!--收藏夹提示信息结束-->