<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/ho/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/ho/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/ho/css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/ho/js/jquery.js"></script>

	</head>

<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->

			<!--悬浮搜索框-->
@include('home.public.search')
			<!--悬浮搜索框-->

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

					<tr class="item-list">
						<div class="bundle  bundle-last ">
							<div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥{{ $pricePromo }}</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank"><span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>
							<div class="clear"></div>
							<div class="bundle-main">
								
								@if(!$data)
								<img src="/home/images/carnull.jpg">
								@else
								@foreach($data as $k => $v)
								<ul class="item-content clearfix">
									
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" data-title="{{ $v['gname'] }}" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="/uploads/{{$v['thumb']}}" style="width: 100%; height: 100%;" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="{{ $v['gname'] }}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $v['gname'] }}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">规格：{{ $v['goodstock']['color'] }}*{{ $v['goodstock']['size']}}</span>
											<span tabindex="0" class="btn-edit-sku theme-login">修改</span>
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">{{ $v['price'] }}</em>
												</div>
												<div class="price-line">
													<em class="J_Price price-now" tabindex="0">{{ $v['price_active'] }}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													
													<span style="border: 1px solid #8B8989;padding:0px 5px;"><a href="/home/car/descnum?id={{ $k }}" >-</a></span >
													<input class="text_box" name="" type="text" value="{{$v['number']}}" style="width:30px;" />
													<span style="border: 1px solid #8B8989;padding:0px 5px;"><a href="/home/car/addnum?id={{ $k }}" >+</a></span >
													
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number">{{ $v['xiaoji'] }}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">移入收藏夹</a>
											<a href="/home/car/delete?id={{ $k }}" data-point-url="#" class="delete">删除</a>
										</div>
									</li>
								</ul>
								@endforeach
								@endif
							</div>
						</div>
					</tr>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">{{ $car_count }}</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">{{$priceCount}}</em></strong>
						</div>
						<div class="btn-area">
							<a href="#" id="J_Go" uid="{{ $uid }}" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>
				<script type="text/javascript">
					// 立即购买
						$("#J_Go").click(function(){
							var uid = $(this).attr('uid');
							if(uid == 0){
								layer.msg('您尚未登录');
								return;
							}
							window.location.href = '/home/orders';
						});
				</script>
<!--foot-->
@include('home.public.foot')
<!--foot-->

			</div>

			<!--操作页面-->

			<div class="theme-popover-mask"></div>


		<!--引导 -->
		
	</body>

</html>