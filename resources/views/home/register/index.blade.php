<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/ho/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/ho/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/ho/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

		<link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
		<script src="/layui-v2.4.5/layui/layui.js"></script>
		

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/ho/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/ho/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
								  <form method="post" action="/home/register/insert" class="layui-form" lay-filter="test1" >
								  	{{ csrf_field() }}
								    <div class="user-email">
								      <label for="email">
								        <i class="am-icon-envelope-o"></i>
								      </label>
								      <input type="email" name="email" id="email" lay-verify="required|email" placeholder="请输入邮箱账号"></div>
								    <div class="user-pass">
								      <label for="password">
								        <i class="am-icon-lock"></i>
								      </label>
								      <input type="password" name="upass" lay-verify="pass" id="password"  placeholder="设置密码"></div>
								    <div class="user-pass">
								      <label for="passwordRepeat">
								        <i class="am-icon-lock"></i>
								      </label>
								      <input type="password" name="repass" lay-verify="repass" id="passwordRepeat" placeholder="确认密码"></div>
								  	 <div class="am-cf">
								  	 	<button lay-submit lay-filter="goemail" class="am-btn am-btn-primary am-btn-sm am-fl">注册</button>  
									</div>
								  </form>
								  <div class="login-links">
								    <label for="reader-me">
								      <input id="reader-me" type="checkbox">点击同意商城《服务协议》 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/home/login">直接登录</a></label></div>
								</div>

								<div class="am-tab-panel">
									<form method="post" action="/home/register/store" class="layui-form" lay-filter="test2">
										{{ csrf_field() }}
									  <div class="user-phone">
									    <label for="phone">
									      <i class="am-icon-mobile-phone am-icon-md"></i>
									    </label>
									    <input type="tel" name="phone" id="phone" lay-verify="required|phone|number" placeholder="请输入手机号"></div>
									  <div class="verification">
									    <label for="code">
									      <i class="am-icon-code-fork"></i>
									    </label>
									    <input type="tel" name="code" id="code" lay-verify="code" placeholder="请输入验证码">
									    <a class="btn" href="javascript:void(0);" onClick="sendMobileCode(this);" id="sendMobileCode">
									      <span id="dyMobileButton">获取</span></a>
									  </div>
									  <div class="user-pass">
									    <label for="password">
									      <i class="am-icon-lock"></i>
									    </label>
									    <input type="password" name="upass" lay-verify="pass" id="password" placeholder="设置密码"></div>
									  <div class="user-pass">
									    <label for="passwordRepeat">
									      <i class="am-icon-lock"></i>
									    </label>
									    <input type="password" name="repass" lay-verify="repass" id="passwordRepeat" placeholder="确认密码"></div>
										<div class="am-cf">
											<button lay-submit lay-filter="gophone" class="am-btn am-btn-primary am-btn-sm am-fl">注册</button>
										</div>
									</form>
									 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击同意商城《服务协议》 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/home/login">直接登录
										</label>
								  	</div>
									
						
									<hr>
								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>
								<script type="text/javascript">
			
									//一般直接写在一个js文件中
									layui.use(['layer', 'form'], function(){
										var layer = layui.layer
										,form = layui.form;

										form.verify({
										  pass: [
										    /^[\S]{6,12}$/
										    ,'密码必须6到12位，且不能出现空格'
										  ]
										  ,repass: [
										    /^[\S]{6,12}$/
										    ,'请填写正确的确认密码'
										  ]
										  ,code: [
										    /^[\S]{4}$/
										    ,'请输入4位验证码'
										  ] 
										});
										//验证两次密码是否一致
										let pass = $('#pass').val();
										let repass = $('#repass').val();
										if( pass !== repass ){
											layer.msg('两次密码不一致');
											return false;
										}
										form.on('submit(goemail)', function(data){
											if(data.form){
												
												layer.msg('注册成功,请尽快完善个人信息');
											}
										});
									});
									

									      
								</script>
								<script type="text/javascript">
										function sendMobileCode(obj)
										{										
											// 获取用户的手机号
											let phone = $('#phone').val();
											// 验证格式
											let phone_preg = /^1{1}[3-9]{1}[\d]{9}$/;

											if(!phone_preg.test(phone)){
												layer.msg('手机号格式不正确')
												return false;
											}


											$(obj).attr('disabled',true);
											$(obj).css('color','#ccc');
											$(obj).css('cursor','no-drop');
											$('#dyMobileButton').css('color','#ccc'); //span
											let time = null;
											if($('#dyMobileButton').html() == '获取'){
												let i = 60;
												time = setInterval(function(){
													i--;
													$('#dyMobileButton').html('('+i+')s');
													if(i < 1){
														$(obj).attr('disabled',false);
														$(obj).css('color','#333');
														$(obj).css('cursor','pointer');
														$('#dyMobileButton').css('color','#333'); //span
														$('#dyMobileButton').html('获取'); //span
														clearInterval(time);
													}
												},1000);
												// 发送ajax  发送验证码
												$.get('/home/register/sendPhone',{phone},function(res){
													if(res.error_code == 0){
														layer.msg('发送成功，验证码10分钟有效');
													}else{
														layer.msg('发送失败');
													}
												},'json');
											}
										}	
								</script>
							</div>
						</div>

				</div>
			</div>
			
<!--网站底部开始-->
@include('home.public.foot')
<!--网站底部结束-->
