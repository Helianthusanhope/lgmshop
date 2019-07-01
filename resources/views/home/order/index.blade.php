<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>订单结算</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/ho/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/ho/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/ho/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/ho/js/address.js"></script>

	</head>


<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->

<!--悬浮搜索框-->
@include('home.public.search')
			
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
							<li class="user-addresslist <?php if ($v->status == '1') { echo 'defaultAddr'; } ?>">
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
									@if($v->status == '1')
									<ins class="deftip">默认地址</ins>
									@else
									<ins class="deftip hidden">默认地址</ins>
									@endif
								</div>
								<div class="address-right">
									<span class="am-icon-angle-right am-icon-lg"></span>
								</div>
								<div class="clear"></div>
								
								<div class="new-addr-btn">
									@if($v->status == '1')
										<span><i>收货地址</i></span>
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
							<?php $a = 0; ?>
							@foreach($data as $k => $v)
							<tr class="item-list">
								<div class="bundle  bundle-last">
									<?php $a += 10; ?>
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
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $v['gname'] }}</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">{{ $v['goodstock']['color'] }}*{{ $v['goodstock']['size'] }}</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">{{ $v['price_active'] }}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<span style="border: 1px solid #8B8989;padding:0px 5px;"><a href="/home/car/descnum?id={{ $k }}" >-</a></span >
															<input class="text_box" name="" type="text" value="{{ $v['number'] }}" style="width:30px;" />
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
							@endforeach
							<div class="clear"></div>
							
							<div class="pay-total">
						<!--留言-->
							<!--优惠券 -->
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum" id="gobuy-price">{{ $priceCount + $a }}</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">{{ $priceCount + $a }}</em>
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
												<span class="buy-line-title" id="gobuy-aid" aid="{{ $v->aid }}">收货人：</span>
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
											<a href="javascript:;" onclick="return goBuy()" class="btn-go" >提交订单</a>
										</div>
									</div>

									<div class="clear"></div>
								</div>
							</div>
						</div>

						<script type="text/javascript">
							
						    function goBuy()
						    {
						    	$.ajaxSetup({
							        headers: {
							        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							        }
							    });
						        var price_all = $('#gobuy-price').html();
						        var aid = $('#gobuy-aid').attr('aid');
						        $.ajax({
								    url:"/home/orders",
								    dataType:"json",
								    async:true,
								    data:{price_all,aid},
								    type:"POST",
								    success:function(res){
										layer.msg('提交成功');
								        setTimeout(function(){
						                    window.location.href = '/home/orders/success?aid='+aid+'&price_all='+price_all;
						                },600);
								    },
								    error:function(){
								        layer.msg('提交失败');
								    }
								});
						    }
						    $(window).keydown(function(event) {
						        if (event.keyCode == 13) {
						            $('.log-btn').trigger('click');
						        }
						    });
						</script>
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