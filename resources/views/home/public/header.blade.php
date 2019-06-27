<body>
  
      <!--引用弹窗-->
  <link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
    <script src="/layui-v2.4.5/layui/layui.js"></script>
    <script>
    layui.use(['layer', 'form'], function(){

      var layer = layui.layer;
      
     
    });
    </script>
<!--引用弹窗结束-->

            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd"> 
                            @if(session('home_login'))    
                            <a href="/home/personal" target="_top" class="h">{{session('home_user')->uname}}</a>
                            <a href="/home/loginout" target="_top">退出</a>
                            @else
                                 
                            <a href="/home/login" target="_top" class="h">亲，请登录</a>
                            <a href="/home/register" target="_top">免费注册</a>
                            @endif
                         </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng"><a href="JavaScript:;" onclick="myself()" 
                            target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                    </div>
                    <div class="topMessage mini-cart">
                        <div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
                    </div>
                    <div class="topMessage favorite">
                        <div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
                </ul>
            </div>
            <script type="text/javascript">
                function myself(){
                    $.get('/home/login/myself',function(res){
                        
                        if(res.msg == 'err'){
                            layer.msg(res.info);
                        }else {
                             window.location.href='/home/personal';
                        
                        }

                    },'json');

                }
            </script>
