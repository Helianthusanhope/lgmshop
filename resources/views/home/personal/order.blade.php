@extends('home.public.myself')


@section('css')


	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>安全设置</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/infstyle.css" rel="stylesheet" type="text/css">
	</head>





@endsection




@section('content')
			
							<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg"><a href="/home/personal/order"></a>订单管理</strong><small></small></div>
						</div>
						<hr/>

						<div class="check">
							<ul>
								<li>
									
									<div class="m-left">
										<div class="fore1">全部订单</div>
										<div class="fore2"><small>显示您已完成的的订单</small></div>
									</div>
									<div class="fore3">
										<a href="/home/order/all">
											<div class="am-btn am-btn-secondary">查看</div>
										</a>
									</div>
								</li>
								<li>
									
									<div class="m-left">
										<div class="fore1">待付款</div>
										<div class="fore2"><small>查看您的代付款</small></div>
									</div>
									<div class="fore3">
										<a href="/home/order/car">
											<div class="am-btn am-btn-secondary">查看</div>
										</a>
									</div>
								</li>
								<li>
									
									<div class="m-left">
										<div class="fore1">待收货</div>
										<div class="fore2"><small>显示已付款的订单</small></div>
									</div>
									<div class="fore3">
										<a href="/home/order/get">
											<div class="am-btn am-btn-secondary">查看</div>
										</a>
									</div>
								</li>
								<li>
									
									<div class="m-left">
										<div class="fore1">待评价</div>
										<div class="fore2"><small>评价有好礼哦</small></div>
									</div>
									<div class="fore3">
										<a href="/home/order/replay">
											<div class="am-btn am-btn-secondary">查看</div>
										</a>
									</div>
								</li>
							
							
								
								
								
							</ul>
						</div>

					</div>	
			
	
								
@endsection