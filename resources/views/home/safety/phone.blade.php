@extends('home.public.myself')


@section('css')
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>安全设置</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/infstyle.css" rel="stylesheet" type="text/css">


		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/stepstyle.css" rel="stylesheet" type="text/css">


		<!---引入layui弹窗,csrf保护,和Jquery-->
		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script type="/ho/text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script src="/ho/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
    	<script src="/layui-v2.4.5/layui/layui.js"></script>
	</head>
 	<script>
		    layui.use(['layer', 'form'], function(){

		      var layer = layui.layer;
		      
		     
		    });
    </script>


	</head>





@endsection




@section('content')

					<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">换绑手机</strong><small></small></div>
						</div>
						<hr/>

						<div class="check">
							<ul>
								<li>
									<form class="am-form am-form-horizontal">
								<div class="am-form-group bind">
									<label for="user-phone" class="am-form-label">验证手机</label>
									<div class="am-form-content">
										<span id="user-phone">手机号码</span>
									</div>
								</div>
								<div class="am-form-group code">
									<label for="user-code" class="am-form-label">验证码</label>
									<div class="am-form-content">
										<input type="tel" id="user-code" placeholder="短信验证码">
									</div>
									<a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
										<div class="am-btn am-btn-danger">验证码</div>
									</a>
								</div>
								<div class="am-form-group">
									<label for="user-new-phone" class="am-form-label">验证手机</label>
									<div class="am-form-content">
										<input type="tel" id="user-new-phone" placeholder="绑定新手机号">
									</div>
								</div>
								<div class="am-form-group code">
									<label for="user-new-code" class="am-form-label">验证码</label>
									<div class="am-form-content">
										<input type="tel" id="user-new-code" placeholder="短信验证码">
									</div>
									<a class="btn" href="javascript:void(0);" onClick="sendMobileCode();" id="sendMobileCode">
										<div class="am-btn am-btn-danger">验证码</div>
									</a>
								</div>
								<div class="info-btn">
									<div class="am-btn am-btn-danger">保存修改</div>
								</div>

							</form>
								</li>

						
							</ul>
						</div>

					</div>	

<script type="text/javascript">
	//生成Ajax的保护令牌
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	function doupass(){
		
		//获取用户的原密码和新密码	
		let old_upass = $('.am-form-group input[ name = old_upass]').eq(0).val();
		let new_upass = $('.am-form-group input[ name = new_upass]').eq(0).val();
		let re_upass = $('.am-form-group input[ name = repass]').eq(0).val();

		$.post('/home/safety/doupass',{old_upass,new_upass,re_upass},function(res){
			//测试是否可以拿到服务器的返回值
			// console.log(res);
			if(res.msg == 'err'){

				 layer.msg(res.info);
			}else{
				
				layer.msg(res.info);
				window.location.href='/home/login';
			}

		},'json')
	}
</script>


@endsection