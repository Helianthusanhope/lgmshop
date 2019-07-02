<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人中心</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/systyle.css" rel="stylesheet" type="text/css">

	

	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
							 @if(session('home_login'))    
	                           <a href="/home/login" target="_top" class="h">{{session('home_user')->uname}}</a>
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
								<div class="menu-hd MyShangcheng"><a href="/home/personal" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="/home/car/index" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">({{ $car_count }})</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

@include('home.public.search')
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">

            	<!--分类开始--->
					  <div class="long-title"><span class="all-goods">全部分类</span></div>
                       <div class="nav-cont">
                            <ul>
                                <li class="index"><a href="/">首页</a></li>
                                @foreach( $actives_not_commend as $k=>$v )
                                <li class="qc"><a href="#">{{ $v->active_name }}</a></li>
                                @endforeach
                            </ul>             
                        </div>
                <!--分类结束-->

			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="/uploads/{{$userinfo->profile}}">
										</a>
										<em class="s-name">{{session('home_user')->uname}}<span class="vip1"></em>
									</div>
									<div class="m-right">
										
										<div class="m-address">
											
											@foreach($address as $k=>$v)
												@if( $v->status == '1')
												<a href="/home/address"  class="i-trigger">我的地址</a>
												<span class="i-trigger">{{$v->address}}</span>
												
												@endif
											@endforeach
										</div>
									</div>
								</div>

								<!--个人资产-->
								
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="/home/personal/order">全部订单</a>
								</div>
								<ul>
									<li><a href="/home/personal/order"><i><img src="/ho/images/pay.png"/></i><span>待付款<em class="m-num">{{ $orders['1'] }}</em></span></a></li>
									<li><a href="/home/personal/order"><i><img src="/ho/images/send.png"/></i><span>待发货<em class="m-num">{{ $orders['2'] }}</em></span></a></li>
									<li><a href="/home/personal/order"><i><img src="/ho/images/receive.png"/></i><span>待收货<em class="m-num">{{ $orders['3'] }}</em></span></a></li>
									<li><a href="/home/personal/order"><i><img src="/ho/images/comment.png"/></i><span>待评价<em class="m-num">{{ $orders['4'] }}</em></span></a></li>
								</ul>
							</div>
							<!--九宫格-->
							<div class="user-patternIcon">
								<div class="s-bar">
									<i class="s-icon"></i>我的常用
								</div>
								<ul>

									<a href="home/shopcart.html"><li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img src="/ho/images/iconbig.png"/><p>购物车</p></li></a>
									<a href="collection.html"><li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img src="/ho/images/iconsmall1.png"/><p>我的收藏</p></li></a>
									<a href="home/home.html"><li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img src="/ho/images/iconsmall0.png"/><p>为你推荐</p></li></a>
									<a href="comment.html"><li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img src="/ho/images/iconsmall3.png"/><p>好评宝贝</p></li></a>
									<a href="foot.html"><li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img src="/ho/images/iconsmall2.png"/><p>我的足迹</p></li></a>                                                                        
								</ul>
							</div>
							<!--物流 -->
							<!--收藏夹 -->
							<div class="you-like">
								<div class="s-bar">我的收藏
									<!-- <a class="am-badge am-badge-danger am-round">降价</a>
									<a class="am-badge am-badge-danger am-round">下架</a>
									<a class="i-load-more-item-shadow" href="#"><i class="am-icon-refresh am-icon-fw"></i>换一组</a> -->
								</div>
								<div class="s-content">
								@if(!$collect)
								<img src="/ho/images/c6ac03e15f4b5efc7e2a268970ce660baab1ba21.jpg_320x200.jpg">
								<!--收藏的内容-->
								@else
								@foreach($collect as $k=>$v)
									<div class="s-item-wrap">
										<div class="s-item">

											<div class="s-pic">
												<a href="#" class="s-pic-link">
													<img src="/uploads/{{$v->thumb}}" alt="{{ $v->gname}}" title="{{ $v->gname}}" class="s-pic-img s-guess-item-img">
												</a>
											</div>
											<div class="s-price-box">
												@if($v->active_id)
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{ $v->price *$v->active_id->discount /10}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												@else
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{ $v->price}}</em></span>
												@endif
											</div>
											<div class="s-title"><a href="/home/goods/{{ $v->gid}}" title="{{ $v->gname}}">{{ $v->gname}}</a></div>
											<div class="s-extra-box">
												<span class="s-comment">好评: 99.93%</span>
												<span class="s-sales">月销: 278</span>

											</div>
										</div>
									</div>
								@endforeach
								@endif
								<!--收藏内容结束-->
								</div>

								<div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i>更多</div>

							</div>

						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
					<div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
								
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em>{{ date('d') }}</em>
									<span>星期{{ date('w') }}</span>
									<span>{{ date('Y').'年'.date('m').'月' }}</span>
								</div>
							</div>
						</div>
					
						<!--热卖推荐 -->
						<div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>今日推荐
							</div>
							@foreach($actives as $k=>$v)
							<div class="new-goods-info">
								<a class="shop-info" href="/home/active/{{ $v->id }}" target="_blank">
									<div >
										<img src="/uploads/{{$v->active_thumb}}" alt="">
									</div>
                                    <span class="one-hot-goods">打{{$v->discount}}折</span>
								</a>
							</div>
							@endforeach
						</div>

					</div>
				</div>
@include('home.public.foot')
			</div>

			<aside class="menu">
				<ul>
					<li class="person active">
						<a href="/home/personal">个人中心</a>
					</li>
					<li class="person">
						
						<ul>
							<li> <a href="/home/information/edit">个人资料</a></li>
							<li> <a href="/home/safety">安全设置</a></li>
							<li> <a href="/home/address">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="/home/personal/order">订单管理</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="/home/myself/collect">收藏</a></li>
							<li> <a href="/home/personal/commentlist">评价</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="home/home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="home/sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="home/shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>