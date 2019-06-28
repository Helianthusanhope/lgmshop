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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改登陆密码</strong><small></small></div>
						</div>
						<hr/>

						<div class="check">
							<ul>
								<li>
						<form class="am-form am-form-horizontal" action="JavaScript:;" method="post">
							 

							<div class="am-form-group">
								<label for="user-old-password" class="am-form-label">原密码</label>
								<div class="am-form-content">
									<input type="password" id="user-old-password" name="old_upass"  placeholder="请输入原登录密码">
								</div>
							</div>
							<div class="am-form-group">
								<label for="user-new-password" class="am-form-label">新密码</label>
								<div class="am-form-content">
									<input type="password" id="user-new-password" name="new_upass" placeholder="由6~18数字、字母组合">
								</div>
							</div>
							<div class="am-form-group">
								<label for="user-confirm-password" class="am-form-label">确认密码</label>
								<div class="am-form-content">
									<input type="password" id="user-confirm-password" name="repass" placeholder="请再次输入上面的密码">
								</div>
							</div>
							<div class="info-btn">
								
								<input type="submit"  onclick="doupass()" value="保存修改" class="am-btn am-btn-danger">
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