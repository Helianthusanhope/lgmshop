<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">			
		<title>全部分类</title>
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/ho/basic/css/demo.css" rel="stylesheet" type="text/css" />		
		<link href="/ho/css/sortstyle.css" rel="stylesheet" type="text/css" />
		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
	</head>

	<body>
		
			<!--顶部导航条 -->
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<a href="#" target="_top" class="h">亲，请登录</a>
							<a href="#" target="_top">免费注册</a>
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
				</ul>
				</div>

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
			</div>		
		
		
		
		<!--主体-->
		
		<div id="nav" class="navfull">
			<div class="area clearfix">
				<div class="category-content" id="guide_2">
					<div class="long-title"><a href="/home/goodlist/sort"><span class="all-goods">全部分类</span></a><span id="meauBack"><a href="javascript:history.go(-1)" target=_self>返回</a></span></div>
					<div class="category">
										<ul class="category-list" id="js_climit_li">
											@foreach( $common_cates_data as $k=>$v )
											<li class="appliance js_toggle relative {{ $loop->first ? 'first selected' : '' }} {{ $loop->last ? 'last' : '' }}">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/ho/images/cake.png"></i><a class="ml-22" title="{{ $v->cname }}" href="/home/goodlist/catetop/{{ $v->cid }}">{{ $v->cname }}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																
																<div class="brand-side">
													              <dl class="dl-sort"><dt><span>为您推荐</span></dt>
													              	<a href="/home/goodlist/catetop/{{ $v->cid }}">
													                <img style="height: 300px;" src="/uploads/{{ $v->thumb }}">
													                </a>
													              </dl>
												                </div>																
																
																<div class="sort-side">
																	@foreach( $v->sub as $kk=>$vv )
																	<dl class="dl-sort">
																		<dt><a href="/home/goodlist/catetwo/{{ $vv->cid }}"><span title="{{ $vv->cname }}">{{ $vv->cname }}</span></a></dt>
																		@foreach( $vv->sub as $kkk=>$vvv )
																		<dd><a title="{{ $vvv->cname }}" href="/home/goodlist/{{ $vvv->cid }}"><span>{{ $vvv->cname }}</span></a></dd>
																		@endforeach
																	</dl>
																	@endforeach
																</div>

															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
											@endforeach
										</ul>
					</div>
				</div>

			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
		$("li").click(function() {		
		     	$(this).addClass("selected").siblings().removeClass("selected");
	       })
		})
		</script>
		<div class="clear"></div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li  class="active"><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>