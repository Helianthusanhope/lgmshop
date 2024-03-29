<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>商品页面</title>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/ho/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="/ho/css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="/ho/css/style.css" rel="stylesheet" />
		
		<script type="text/javascript" src="/ho/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/ho/basic/js/quick_links.js"></script>
		<script type="text/javascript" src="/ho/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="/ho/js/jquery.imagezoom.min.js"></script>
		<script type="text/javascript" src="/ho/js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="/ho/js/list.js"></script>
		
	</head>
<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->

			<!--悬浮搜索框-->
@include('home.public.search')
			

			<div class="listMain">
				<!--分类-->
			<div class="nav-table">
			   <div class="long-title  "><a href="/home/goodlist/sort"><span class="all-goods">全部分类</span></a></div>
               <div class="nav-cont">
                    <ul>
                        <li class="index"><a href="/">首页</a></li>
                        @foreach( $actives_not_commend as $k=>$v )
                        <li class="qc"><a href="/home/active/{{ $v->id }}">{{ $v->active_name }}</a></li>
                        @endforeach
                    </ul>
                   
                </div>
			</div>
	            <b class="line"></b>
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="/">首页</a></li>
					<li><a href="/home/goodlist/catesan/{{ $good->cid }}">{{ $good->goodcates->cname }}</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>


				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>
							@foreach($good->goodstock as $k => $v)
							@if($v->stid == $stid)
							<div class="tb-booth tb-pic tb-s310">
								<a href="images/01.jpg"><img src="/uploads/{{ $v->picture }}" alt="细节展示放大镜特效" rel="/uploads/{{ $v->picture }}" class="jqzoom" /></a>
							</div>
							@endif
							@endforeach
							<ul class="tb-thumb" id="thumblist">
								@foreach($good->goodstock as $k => $v)
								<li class="tb<?php if ($v->stid == $stid) { echo '-selected'; } ?>">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="/uploads/{{ $v->picture }}" mid="/uploads/{{ $v->picture }}" big="/uploads/{{ $v->picture }}"></a>
									</div>
								</li>
								@endforeach
							</ul>

						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1>{{ $good->gname }}</h1>
						</div>
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>¥</em><b class="sys_item_price">{{ round($good->price * $active / 10, 2) }}</b>  </dd>                                 
								</li>
								<li class="price iteminfo_mktprice" style="padding: 0px;">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice">{{ $good->price }}</b></dd>									
								</li>
								<div class="clear"></div>
							</div>

							<!--地址-->

							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
								<li class="tm-ind-item tm-ind-sellCount canClick">
									<div class="tm-indcon"><span class="tm-label" >累计收藏</span><span class="tm-count" id="collects">{{ $good->collect }}</span></div>
								</li>
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">{{ $good->sale }}</span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">{{ $good->num }}</span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>

									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="/home/pay" method="post">

												<div class="theme-signin-left">

													<div class="theme-options">
														<div class="cart-title">选择规格</div>
														<ul>
															@foreach($good->goodstock as $k=>$v)
															<a href="/home/goods/{{ $good->gid }}?stid={{ $v->stid }}">
															<li stid="{{ $v->stid }}" class="sku-line <?php if ($v->stid == $stid) { echo 'selected'; } ?>">{{ $v->color or ''}}*{{$v->size or ''}}<i></i></li></a>
															@endforeach
														</ul>
													</div>
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="number" type="text" value="1" style="width:30px;" />
															<input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden">库存<span class="stock">
																<?php
											                        if (!$good->goodstock) {
											                            $stock = 0;
											                        } else {
											                            $stock = 0;
											                            foreach($good->goodstock as $k=>$v){
											                                $stock += $v->stock;
											                            }
											                        }
											                        echo "$stock";
											                    ?>
                											</span>件</span>
														</dd>

													</div>
													<div class="clear"></div>

													
												</div>
											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							
							@if($good->active_id != 0)
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">商品优惠</dt>
									<div class="gold-list">
										<p>全部{{ $active }}折</p>
									</div>
								</div>
								<div class="clear"></div>
								
							</div>
							@else
							<!--活动	-->
							<div class="shopPromotion gold">
								<div class="hot">
									<dt class="tb-metatit">商品优惠</dt>
									<div class="gold-list">
										<p style="color: #999999;">暂无折扣</p>
									</div>
								</div>
								<div class="clear"></div>
								
							</div>
							@endif
						</div>

						<div class="pay">
							
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="立即购买" stid="{{ $stid }}" href="#" uid="{{ $uid }}"><i></i>立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login">
									<a id="LikBasket" title="加入购物车" stid="{{ $stid }}" href="#"><i></i>加入购物车</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login" style="margin-left: 8%;">
									<a  title="加入收藏夹"  href="javascript:;" onclick="goCollect('{{ $good->gid }}')"><i></i>加入收藏夹</a>
								</div>
							</li>
						</div>
						
					</div>
					<script type="text/javascript">
						// 立即购买
						$("#LikBuy").click(function(){
							var uid = $(this).attr('uid');
							if(uid == 0){
								layer.msg('您尚未登录');
								return;
							}
							var aa = '/home/orders/buy?stid=';
							var stid = $(this).attr('stid');
							var num = $(this).parent().parent().parent().prev().find("input[type=text]").val();
							window.location.href = aa+stid+'&number='+num;
							
						});
						// 加入购物车
						$("#LikBasket").click(function(){
							var aa = '/home/car/add?stid=';
							var stid = $(this).attr('stid');
							var num = $(this).parent().parent().parent().prev().find("input[type=text]").val();
							window.location.href = aa+stid+'&number='+num;
							
						});
						function goCollect(gid)
					        {
					          	$.get('/home/collect/gocollect',{gid},function(res){
					            	if(res.msg == 'err'){
					              		layer.msg(res.info);
					            	}else{
					              		layer.msg(res.info);
					              		let collects = $('#collects').first();
					              		collects.html(parseInt(collects.html())+1);
					            	}
					          	},'json');
					        }
					</script>
					<div class="clear"></div>

				</div>
				
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>看了又看</h2>        
					            </div>
						     	@foreach($looks as $k => $v)
							      <li class="first">
							      	<div class="p-img" >                    
							      		<a  href="/home/goods/{{ $v->gid }}"> <img style="width: 100%;height: 200px" class="" src="/uploads/{{ $v->thumb }}"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		{{ $v->gname }}
							      	</a>
							      	</div>
							      	<div class="p-price">
							      		@if($v->active_id != 0)
							      		<strong>{{ round($v->price * $v->goodactive->discount / 10, 2) }}</strong>
							      		@else
							      		<strong>{{ $v->price }}</strong>
							      		@endif
							      	</div>
							      </li>
							    @endforeach
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">

										<span class="index-needs-dt-txt">宝贝详情</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">全部评价</span></a>

								</li>

								<li>
									<a href="#">

										<span class="index-needs-dt-txt">猜你喜欢</span></a>
								</li>
							</ul>

							<div class="am-tabs-bd">

								<div class="am-tab-panel am-fade am-in am-active">

									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节</h4>
										</div>
										<div class="twlistNews">
											{!! htmlspecialchars_decode($good->detail) !!}
										</div>
									</div>
									<div class="clear"></div>

								</div>

								<div class="am-tab-panel am-fade">
									
                                    <div class="actor-new">
                                    	<div class="rate">                
                                    		<strong>{{ $num['pro'] }}<span>%</span></strong><br> <span>好评度</span>            
                                    	</div>
                                        
                                    </div>	
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num">({{ $good->num }})</span>
													<span>好评</span>
													<span class="tb-tbcr-num">({{ $num['good'] }})</span>
													<span>中评</span>
													<span class="tb-tbcr-num">({{ $num['middle'] }})</span>
													<span>差评</span>
													<span class="tb-tbcr-num">({{ $num['bad'] }})</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<ul class="am-comments-list am-comments-list-flip">
										@foreach($goodcomment as $k=>$v)
										<li class="am-comment">
											<!-- 评论容器 -->
											<a href="">
												<img class="am-comment-avatar" src="/uploads/{{ $v->usercomment->userinfos->profile }}" />
												<!-- 评论者头像 -->
											</a>

											<div class="am-comment-main">
												<!-- 评论内容容器 -->
												<header class="am-comment-hd">
													<!--<h3 class="am-comment-title">评论标题</h3>-->
													<div class="am-comment-meta">
														<!-- 评论元数据 -->
														<a href="#link-to-user" class="am-comment-author">{{ $v->uname }}</a>
														<!-- 评论者 -->
														评论于
														<time datetime="">{{ $v->created_at }}</time>
													</div>
												</header>

												<div class="am-comment-bd">
													<div class="tb-rev-item " data-id="255776406962">
														<div class="J_TbcRate_ReviewContent tb-tbcr-content " style="color: #979797">
															{{ $v->comment }}
														</div>
														<div class="tb-r-act-bar">
															规格：{{ $v->stockComment->color }}*{{ $v->stockComment->size }}
														</div>
													</div>

												</div>
												<!-- 评论内容 -->
											</div>
										</li>
										@endforeach
									</ul>

									<div class="clear"></div>

									<!--分页 -->
									<div style="float: right;">{{ $goodcomment->links() }}</div>
									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>

								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
											@foreach($like as $k => $v)
											<li>
												<div class="i-pic limit">
													<a href="/home/goods/{{$v->gid}}"><img src="/uploads/{{ $v->thumb }}" style="width: 100%;height: 220px;" /></a>
													<p>{{$v->gname}}</p>
													<p class="price fl">
														<b>¥</b>
														@if($v->active_id != 0)
											      		<strong>{{ round($v->price * $v->goodactive->discount / 10, 2) }}</strong>
											      		@else
											      		<strong>{{ $v->price }}</strong>
											      		@endif
													</p>
												</div>
											</li>
											@endforeach
										</ul>
									</div>
									<div class="clear"></div>

								</div>

							</div>

						</div>

						<div class="clear"></div>
<!--网站底部开始-->
@include('home.public.foot')
<!--网站底部结束-->


					</div>

				</div>
			</div>
			<!--菜单 -->


<!--右侧边栏开始-->
@include('home.public.sidebar')
<!--右侧边栏结束-->

	</body>

</html>