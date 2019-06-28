@extends('home.public.myself')


@section('css')
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>验证邮箱</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/stepstyle.css" rel="stylesheet" type="text/css">

		<script type="/ho/text/javascript" src="js/jquery-1.7.2.min.js"></script>
		<script src="/ho/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	</head>




@endsection




@section('content')

					<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改绑定邮箱</strong><small></small></div>
						</div>
						<hr/>

						<div class="check">
							<ul>							

								<li>
									<form class="am-form am-form-horizontal">
										<div class="am-form-group">
											<label for="user-email" class="am-form-label">验证邮箱</label>
											<div class="am-form-content">
												<input type="email" id="user-email" placeholder="请输入邮箱地址">
											</div>
										</div>
										<div class="am-form-group code">
											<label for="user-code" class="am-form-label">验证码</label>
											<div class="am-form-content">
												<input type="tel" id="user-code" placeholder="验证码">
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


@endsection