
<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/ho/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
    	<script src="/layui-v2.4.5/layui/layui.js"></script>
	</head>
 <script>
	    layui.use(['layer', 'form'], function(){

	      var layer = layui.layer;
	      
	     
	    });
    </script>

	<body>
	
		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/ho/images/logobig.png" /></a>

		</div>

	
		<div class="login-banner">

			<div class="login-main">
				
				<div class="login-banner-bg"><span></span><img src="/ho/images/big.jpg" />
				</div>
			
				<div class="login-box">
					
							<h3 class="title">登录商城</h3>
							
							<div class="clear"></div>
						
						<div class="login-form">
						 <form action="javascript:;" method="post">
						 {{ csrf_field() }}
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="uname" id="uname" placeholder="邮箱/手机/用户名">
						
                 				</div>
                 				<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="upass" id="" placeholder="请输入密码">
                 				</div>

              
           				</div>
            
            		<div class="login-links">
                		<label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="#" class="am-fr">忘记密码</a>
								<a href="/home/register" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            		</div>
								<div class="am-cf">
									<input type="submit" name=""  onclick="login()" value="登录" class="am-btn am-btn-primary am-btn-sm">
								</div>
					</form>
				</div>
			</div>
		</div>


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有</em>
							</p>
						</div>
					</div>
	</body>

</html>
<script type="text/javascript">
	//生成Ajax的保护令牌
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	
	function login(){

		//获取用户输入的用户和密码	
		let uname = $('.login-form input[ name =uname]').eq(0).val();
		let upass = $('.login-form input[ name =upass]').eq(0).val();

		$.post('/home/dologin',{uname,upass},function(res){

			if(res.msg == 'err'){

				layer.msg(res.info);
				
			}else{
						
				 window.location.href='/';
			}

		},'json')

		
	}

</script>