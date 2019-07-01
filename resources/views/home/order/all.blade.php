@extends('home.public.myself')


@section('css')
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>订单详情</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/ho/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


	</head>


@endsection




@section('content')
<div class="user-order">

	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
	</div>
	<hr/>

	<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

		<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
			<li class="am-active"><a href="#tab1">所有订单</a></li>
			<li><a href="#tab2">待付款</a></li>
			<li><a href="#tab3">待发货</a></li>
			<li><a href="#tab4">待收货</a></li>
			<li><a href="#tab5">待评价</a></li>
		</ul>

		<div class="am-tabs-bd">
			<div class="am-tab-panel am-fade am-in am-active" id="tab1">
				<div class="order-top">
					<div class="th th-item">
						<td class="td-inner">商品</td>
					</div>
					<div class="th th-price">
						<td class="td-inner">单价</td>
					</div>
					<div class="th th-number">
						<td class="td-inner">数量</td>
					</div>
					<div class="th th-operation">
						<td class="td-inner">商品操作</td>
					</div>
					<div class="th th-amount">
						<td class="td-inner">合计</td>
					</div>
					<div class="th th-status">
						<td class="td-inner">交易状态</td>
					</div>
					<div class="th th-change">
						<td class="td-inner">交易操作</td>
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						@foreach($orders as $k => $v)
						<!--交易成功-->
						<div class="order-status5">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{ $v['oname'] }}</a></div>
								<span>{{ $v['created_at'] }}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									@foreach($v['good'] as $kk => $vv)
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>{{ $vv['gname'] }}</p>
														<p class="info-little">规格{{ $vv['color'] }}
															<br/>{{ $vv['size'] }} </p>
													</a>
												</div>
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price">
												{{ $vv['price'] }}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number">
												<span>×</span>{{ $vv['number'] }}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation">
												
											</div>
										</li>
									</ul>
									@endforeach
								</div>
								<div class="order-right">
									<li class="td td-amount">
										<div class="item-amount">
											合计：{{ $v['price_all'] }}
											
										</div>
									</li>
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status">
												<p class="Mystatus">
													@if($v['order_status'] == 0)
														待付款
													@elseif($v['order_status'] == 1)
														待发货
													@elseif($v['order_status'] == 2)
														卖家已发货
													@else
														交易成功
													@endif
												</p>
												<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
												@if($v['order_status'] > 1)
												<p class="order-info"><a href="logistics.html">查看物流</a></p>
												@endif
											</div>
										</li>
										<li class="td td-change">
											@if($v['order_status'] == 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												评价商品</div>
											</a>
											@elseif($v['order_status'] > 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												删除订单</div>
											</a>
											@elseif($v['order_status'] == 1)
											<a href=""><div class="am-btn am-btn-danger anniu">
												请等待发货</div>
											</a>
											@else
											<a href=""><div class="am-btn am-btn-danger anniu">
												确认收货</div>
											</a>
											@endif
										</li>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						
						

					</div>

				</div>

			</div>
			<div class="am-tab-panel am-fade" id="tab2">

				<div class="order-top">
					<div class="th th-item">
						<td class="td-inner">商品</td>
					</div>
					<div class="th th-price">
						<td class="td-inner">单价</td>
					</div>
					<div class="th th-number">
						<td class="td-inner">数量</td>
					</div>
					<div class="th th-operation">
						<td class="td-inner">商品操作</td>
					</div>
					<div class="th th-amount">
						<td class="td-inner">合计</td>
					</div>
					<div class="th th-status">
						<td class="td-inner">交易状态</td>
					</div>
					<div class="th th-change">
						<td class="td-inner">交易操作</td>
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						@foreach($orders as $k => $v)
						@if($v['order_status'] == '0')
						<!--交易成功-->
						<div class="order-status5">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{ $v['oname'] }}</a></div>
								<span>{{ $v['created_at'] }}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									@foreach($v['good'] as $kk => $vv)
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>{{ $vv['gname'] }}</p>
														<p class="info-little">规格{{ $vv['color'] }}
															<br/>{{ $vv['size'] }} </p>
													</a>
												</div>
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price">
												{{ $vv['price'] }}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number">
												<span>×</span>{{ $vv['number'] }}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation">
												
											</div>
										</li>
									</ul>
									@endforeach
								</div>
								<div class="order-right">
									<li class="td td-amount">
										<div class="item-amount">
											合计：{{ $v['price_all'] }}
											
										</div>
									</li>
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status">
												<p class="Mystatus">
													@if($v['order_status'] == 0)
														待付款
													@elseif($v['order_status'] == 1)
														待发货
													@elseif($v['order_status'] == 2)
														卖家已发货
													@else
														交易成功
													@endif
												</p>
												<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
												@if($v['order_status'] > 1)
												<p class="order-info"><a href="logistics.html">查看物流</a></p>
												@endif
											</div>
										</li>
										<li class="td td-change">
											@if($v['order_status'] == 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												评价商品</div>
											</a>
											@elseif($v['order_status'] > 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												删除订单</div>
											</a>
											@elseif($v['order_status'] == 1)
											<a href=""><div class="am-btn am-btn-danger anniu">
												请等待发货</div>
											</a>
											@else
											<a href=""><div class="am-btn am-btn-danger anniu">
												确认收货</div>
											</a>
											@endif
										</li>
									</div>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>

				</div>
			</div>
			<div class="am-tab-panel am-fade" id="tab3">
				<div class="order-top">
					<div class="th th-item">
						<td class="td-inner">商品</td>
					</div>
					<div class="th th-price">
						<td class="td-inner">单价</td>
					</div>
					<div class="th th-number">
						<td class="td-inner">数量</td>
					</div>
					<div class="th th-operation">
						<td class="td-inner">商品操作</td>
					</div>
					<div class="th th-amount">
						<td class="td-inner">合计</td>
					</div>
					<div class="th th-status">
						<td class="td-inner">交易状态</td>
					</div>
					<div class="th th-change">
						<td class="td-inner">交易操作</td>
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						@foreach($orders as $k => $v)
						@if($v['order_status'] == '1')
						<!--交易成功-->
						<div class="order-status5">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{ $v['oname'] }}</a></div>
								<span>{{ $v['created_at'] }}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									@foreach($v['good'] as $kk => $vv)
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>{{ $vv['gname'] }}</p>
														<p class="info-little">规格{{ $vv['color'] }}
															<br/>{{ $vv['size'] }} </p>
													</a>
												</div>
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price">
												{{ $vv['price'] }}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number">
												<span>×</span>{{ $vv['number'] }}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation">
												
											</div>
										</li>
									</ul>
									@endforeach
								</div>
								<div class="order-right">
									<li class="td td-amount">
										<div class="item-amount">
											合计：{{ $v['price_all'] }}
											
										</div>
									</li>
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status">
												<p class="Mystatus">
													@if($v['order_status'] == 0)
														待付款
													@elseif($v['order_status'] == 1)
														待发货
													@elseif($v['order_status'] == 2)
														卖家已发货
													@else
														交易成功
													@endif
												</p>
												<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
												@if($v['order_status'] > 1)
												<p class="order-info"><a href="logistics.html">查看物流</a></p>
												@endif
											</div>
										</li>
										<li class="td td-change">
											@if($v['order_status'] == 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												评价商品</div>
											</a>
											@elseif($v['order_status'] > 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												删除订单</div>
											</a>
											@elseif($v['order_status'] == 1)
											<a href=""><div class="am-btn am-btn-danger anniu">
												请等待发货</div>
											</a>
											@else
											<a href=""><div class="am-btn am-btn-danger anniu">
												确认收货</div>
											</a>
											@endif
										</li>
									</div>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>
			<div class="am-tab-panel am-fade" id="tab4">
				<div class="order-top">
					<div class="th th-item">
						<td class="td-inner">商品</td>
					</div>
					<div class="th th-price">
						<td class="td-inner">单价</td>
					</div>
					<div class="th th-number">
						<td class="td-inner">数量</td>
					</div>
					<div class="th th-operation">
						<td class="td-inner">商品操作</td>
					</div>
					<div class="th th-amount">
						<td class="td-inner">合计</td>
					</div>
					<div class="th th-status">
						<td class="td-inner">交易状态</td>
					</div>
					<div class="th th-change">
						<td class="td-inner">交易操作</td>
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						@foreach($orders as $k => $v)
						@if($v['order_status'] == 2)
						<!--交易成功-->
						<div class="order-status5">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{ $v['oname'] }}</a></div>
								<span>{{ $v['created_at'] }}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									@foreach($v['good'] as $kk => $vv)
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>{{ $vv['gname'] }}</p>
														<p class="info-little">规格{{ $vv['color'] }}
															<br/>{{ $vv['size'] }} </p>
													</a>
												</div>
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price">
												{{ $vv['price'] }}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number">
												<span>×</span>{{ $vv['number'] }}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation">
												
											</div>
										</li>
									</ul>
									@endforeach
								</div>
								<div class="order-right">
									<li class="td td-amount">
										<div class="item-amount">
											合计：{{ $v['price_all'] }}
											
										</div>
									</li>
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status">
												<p class="Mystatus">
													@if($v['order_status'] == 0)
														待付款
													@elseif($v['order_status'] == 1)
														待发货
													@elseif($v['order_status'] == 2)
														卖家已发货
													@else
														交易成功
													@endif
												</p>
												<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
												@if($v['order_status'] > 1)
												<p class="order-info"><a href="logistics.html">查看物流</a></p>
												@endif
											</div>
										</li>
										<li class="td td-change">
											@if($v['order_status'] == 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												评价商品</div>
											</a>
											@elseif($v['order_status'] > 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												删除订单</div>
											</a>
											@elseif($v['order_status'] == 1)
											<a href=""><div class="am-btn am-btn-danger anniu">
												请等待发货</div>
											</a>
											@else
											<a href=""><div class="am-btn am-btn-danger anniu">
												确认收货</div>
											</a>
											@endif
										</li>
									</div>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>
				</div>
			</div>

			<div class="am-tab-panel am-fade" id="tab5">
				<div class="order-top">
					<div class="th th-item">
						<td class="td-inner">商品</td>
					</div>
					<div class="th th-price">
						<td class="td-inner">单价</td>
					</div>
					<div class="th th-number">
						<td class="td-inner">数量</td>
					</div>
					<div class="th th-operation">
						<td class="td-inner">商品操作</td>
					</div>
					<div class="th th-amount">
						<td class="td-inner">合计</td>
					</div>
					<div class="th th-status">
						<td class="td-inner">交易状态</td>
					</div>
					<div class="th th-change">
						<td class="td-inner">交易操作</td>
					</div>
				</div>

				<div class="order-main">
					<div class="order-list">
						<!--不同状态的订单	-->
						@foreach($orders as $k => $v)
						@if($v['order_status'] == 3)
						<!--交易成功-->
						<div class="order-status5">
							<div class="order-title">
								<div class="dd-num">订单编号：<a href="javascript:;">{{ $v['oname'] }}</a></div>
								<span>{{ $v['created_at'] }}</span>
								<!--    <em>店铺：小桔灯</em>-->
							</div>
							<div class="order-content">
								<div class="order-left">
									@foreach($v['good'] as $kk => $vv)
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="#" class="J_MakePoint">
													<img src="images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>{{ $vv['gname'] }}</p>
														<p class="info-little">规格{{ $vv['color'] }}
															<br/>{{ $vv['size'] }} </p>
													</a>
												</div>
											</div>
										</li>
										<li class="td td-price">
											<div class="item-price">
												{{ $vv['price'] }}
											</div>
										</li>
										<li class="td td-number">
											<div class="item-number">
												<span>×</span>{{ $vv['number'] }}
											</div>
										</li>
										<li class="td td-operation">
											<div class="item-operation">
												
											</div>
										</li>
									</ul>
									@endforeach
								</div>
								<div class="order-right">
									<li class="td td-amount">
										<div class="item-amount">
											合计：{{ $v['price_all'] }}
											
										</div>
									</li>
									<div class="move-right">
										<li class="td td-status">
											<div class="item-status">
												<p class="Mystatus">
													@if($v['order_status'] == 0)
														待付款
													@elseif($v['order_status'] == 1)
														待发货
													@elseif($v['order_status'] == 2)
														卖家已发货
													@else
														交易成功
													@endif
												</p>
												<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
												@if($v['order_status'] > 1)
												<p class="order-info"><a href="logistics.html">查看物流</a></p>
												@endif
											</div>
										</li>
										<li class="td td-change">
											@if($v['order_status'] == 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												评价商品</div>
											</a>
											@elseif($v['order_status'] > 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												删除订单</div>
											</a>
											@elseif($v['order_status'] == 1)
											<a href=""><div class="am-btn am-btn-danger anniu">
												请等待发货</div>
											</a>
											@else
											<a href=""><div class="am-btn am-btn-danger anniu">
												确认收货</div>
											</a>
											@endif
										</li>
									</div>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>

				</div>

			</div>
		</div>

	</div>
</div>						
@endsection