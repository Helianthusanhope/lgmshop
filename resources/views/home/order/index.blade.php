<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/ho/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/ho/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/ho/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/ho/js/address.js"></script>

	</head>

	<body>

<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/ho/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/ho/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>
			<div class="concent">
				<!--地址 -->
				<div class="paycont">

					<!--错误信息-->
						@if (count($errors) > 0)
							<div class="am-btn am-btn-danger">
							    <ul>
							        @foreach ($errors->all() as $error)
							            <li>{{ $error }}</li>
							        @endforeach
							    </ul>
							</div>
    					@endif
				<!--提示成功信息-->
    					@if(session('success'))
		                 <div class="am-cf am-padding">
		                 <ul>		             
		                 	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg" style="background:blue;color:#ccc">{{ session('success') }}</span></strong><small></small></div>
		                 </ul>		                 	
		                   
		                 </div>
                 		@endif
                 		@if(session('error'))	                 
	                 	<div class="am-cf am-padding">
		                 <ul>		             
		                 	<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg" style="background:red;color:#ccc">{{ session('error') }}</span></strong><small></small></div>
		                 </ul>		                 	
		                   
		                 </div>
                	 @endif       
					<div class="address">

						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>											
							<div class="per-border"></div>
							@foreach( $addr as $k=>$v)
							<li class="user-addresslist">
								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   						<span class="buy-user">{{ $v->addrname}} </span>
										<span class="buy-phone">{{ $v->phone }}</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
										<span class="dist">{{ $v->area }}</span><br>
										<span class="street">{{ $v->address}}</span>
										</span>

										</span>
									</div>
									<ins class="deftip hidden">收货地址</ins>
								</div>
								<div class="address-right">
									<span class="am-icon-angle-right am-icon-lg"></span>
								</div>
								<div class="clear"></div>
								
								<div class="new-addr-btn">
									@if($v->status == '1')
										<span><i class="am-icon-edit">收货地址</i></span>
										<span class="new-addr-bar">|</span>		
										<span class="new-addr-bar">|</span>
										<a href="/home/address/edit/{{$v->aid}}"><i style="background:#ccc">删除</i></a>
										@else
										<a href="/home/address/update/{{$v->aid}}"><i class="am-icon-edit"></i>设置为收货地址</a>
										<span class="new-addr-bar">|</span>		
										<span class="new-addr-bar">|</span>
										<a href="/home/address/edit/{{$v->aid}}"><i style="background:#ccc">删除</i></a>
										@endif
								</div>

							</li>
							@endforeach
						</ul>
			
						<div class="clear"></div>
					</div>
					<div class="clear"></div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card"><img src="/ho/images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="/ho/images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao"><img src="/ho/images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

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
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>

							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="/ho/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">颜色：12#川南玛瑙</span>
														<span class="sku-line">包装：裸装</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">39.00</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="min am-btn" name="" type="button" value="-" />
															<input class="text_box" name="" type="text" value="3" style="width:30px;" />
															<input class="add am-btn" name="" type="button" value="+" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number">117.00</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														快递<b class="sys_item_freprice">10</b>元
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							<div class="clear"></div>
							</div>

							<tr id="J_BundleList_s_1911116345_1" class="item-list">
								<div id="J_Bundle_s_1911116345_1_0" class="bundle  bundle-last">
									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="/ho/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" target="_blank" title="美康粉黛醉美唇膏 持久保湿滋润防水不掉色" class="item-title J_MakePoint" data-point="tbcart.8.11">美康粉黛醉美唇膏 持久保湿滋润防水不掉色</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">颜色：10#蜜橘色+17#樱花粉</span>
														<span class="sku-line">包装：两支手袋装（送彩带）</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">39.00</em>
														</div>
													</div>
												</li>
											</div>

											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="min am-btn" name="" type="button" value="-" />
															<input class="text_box" name="" type="text" value="3" style="width:30px;" />
															<input class="add am-btn" name="" type="button" value="+" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number">117.00</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														包邮
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							<!--优惠券 -->
							<div class="buy-agio">
								<li class="td td-coupon">

									<span class="coupon-title">优惠券</span>
									<select data-am-selected>
										<option value="a">
											<div class="c-price">
												<strong>￥8</strong>
											</div>
											<div class="c-limit">
												【消费满95元可用】
											</div>
										</option>
										<option value="b" selected>
											<div class="c-price">
												<strong>￥3</strong>
											</div>
											<div class="c-limit">
												【无使用门槛】
											</div>
										</option>
									</select>
								</li>

								<li class="td td-bonus">

									<span class="bonus-title">红包</span>
									<select data-am-selected>
										<option value="a">
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>10.40<span>元</span>
											</div>
										</option>
										<option value="b" selected>
											<div class="item-info">
												¥50.00<span>元</span>
											</div>
											<div class="item-remainderprice">
												<span>还剩</span>50.00<span>元</span>
											</div>
										</option>
									</select>

								</li>

							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum">244.00</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">244.00</em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">
											@foreach($addr as $k=>$v)
											<p class="buy-footer-address">
												@if($v->status == '1')
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												
												<span class="buy--address-detail">	   				
												<span class="dist">{{$v->area}}</span>
												<span class="street">{{$v->address}}</span>
												</span>
												</span>
											</p>
												<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         		<span class="buy-user">{{ $v->addrname}} </span>
												<span class="buy-phone">{{ $v->phone}}</span>
												</span>
												
											</p>
											@endif
											@endforeach
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="success.html" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
@include('home.public.foot')
			</div>
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> <small></small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					
					<form action= "/home/address/store"class="am-form am-form-horizontal" method="post">
						{{ csrf_field() }}

						<div class="am-form-group">

							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" name="addrname" required value="{{ old('addrname') }}" class="layui-input" lay-verify="required" >

							</div>

						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content"">
								<input type="text" name="phone"  value="" required lay-verify="required" class="layui-input" placeholder="请填入正确的11位手机号">

							</div>

						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>						
							<script src="/ho/area.js"></script>
								<div class="am-form-content address">						
									<div lay-verify="required">
											<select id="Province" runat="server" name="province" style="width: 200px" lay-verify="required"></select>
											<select id="Country" runat="server" name="country" style="width: 200px" lay-verify="required"></select>
											<select id="Town" runat="server" name="town" style="width: 200px" lay-verify="required"></select>
									</div>
								</div>
						</div>
						<script language="javascript">
							setup();
						</script>
													

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<input type="text" name="address"  value=" {{old('address')}} " required lay-verify="required" lay-verify="required" >
								<small>写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<input type="submit" value="保存" class="am-btn am-btn-danger">
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>
	</body>

</html>