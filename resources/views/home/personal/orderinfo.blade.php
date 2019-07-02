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
	

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;info</small></div>
						</div>
						<hr/>
						<div class="order-infoaside">
							<div class="order-logistics">
								<a href="javascript:;">
									<div class="icon-log">
										<i><img src="/ho/images/receive.png"></i>
									</div>
									@if($orders['0']['order_status'] >= 2)
									<div class="latest-logistics">
										<p class="text">已签收,签收人是{{ $addr->addrname }}签收，感谢使用天天快递，期待再次为您服务</p>
										<div class="time-list">
											<span class="date">{{ $addr->created_at }}</span>
										</div>
										<div class="inquire">
											<span class="package-detail">物流：天天快递</span>
											<span class="package-detail">快递单号: </span>
											<span class="package-number">{{ rand(222111111, 999999990) }}</span>
										</div>
									</div>
									@else
									<div class="latest-logistics">
										<p class="text">请等待发货</p>
										<div class="time-list">
											<span class="date"></span>
										</div>
										<div class="inquire">
											<span class="package-detail"></span>
											<span class="package-detail"></span>
											<span class="package-number"></span>
										</div>
									</div>
									@endif
									<span class="am-icon-angle-right icon"></span>
								</a>
								<div class="clear"></div>
							</div>
							<div class="order-addresslist">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt">{{ $addr->addrname }}</span>
										<span class="new-txt-rd2">{{ $addr->phone }}</span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：</span>
											<span class="street">{{ $addr->area }}</span>
											<span class="street">{{ $addr->address }}</span></p>
									</div>
								</div>
							</div>
						</div>
						<div class="order-infomain">

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
								<div class="dd-num">订单编号：{{ $v['oname'] }}</div>
								<span>{{ $v['created_at'] }}</span>
								
							</div>
							<div class="order-content">
								<div class="order-left">
									@foreach($v['good'] as $kk => $vv)
									<ul class="item-list">
										<li class="td td-item">
											<div class="item-pic">
												<a href="/home/goods/{{ $vv['gid'] }}" class="J_MakePoint">
													<img src="/uploads/{{ $vv['picture'] }}" class="itempic J_ItemImg">
												</a>
											</div>
											<div class="item-info">
												<div class="item-basic-info">
													<a href="#">
														<p>{{ $vv['gname'] }}</p>
														<p class="info-little">规格:{{ $vv['color'] }}
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
											<p>含运费</p>
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
											</div>
										</li>
										<li class="td td-change">
											@if($v['order_status'] == 3)
											<a href="/home/personal/comment/{{ $v['id'] }}"><div class="am-btn am-btn-danger anniu">
												评价商品</div>
											</a>
											@elseif($v['order_status'] > 3)
											<a href=""><div class="am-btn am-btn-danger anniu">
												订单完成</div>
											</a>
											@elseif($v['order_status'] == 1)
											<a href=""><div class="am-btn am-btn-danger anniu">
												请等待发货</div>
											</a>
											@else
											<a href="/home/personal/orderconfirm/{{ $v['id'] }}" onclick="return orderconfirm()"><div class="am-btn am-btn-danger anniu">
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
					</div>

						
@endsection