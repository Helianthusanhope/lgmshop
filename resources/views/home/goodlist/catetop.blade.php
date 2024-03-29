<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>搜索页面</title>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="/ho/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/ho/css/seastyle.css" rel="stylesheet" type="text/css" />
		<link href="/ho/css/skin.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/ho/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/ho/js/script.js"></script>
	</head>
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
					<form action="/home/goodlist" method="get">
						<input id="searchInput" name="search" type="text" value="{{ $search or '' }}" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn"  value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>
			<div class="clear"></div>
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
				<div class="nav-table"  >
						   <div class="long-title"><a href="/home/goodlist/sort"><span class="all-goods" >全部分类</span></a></div>
						   <div class="nav-cont">
							<ul>
                                <li class="index"><a href="/">首页</a></li>
                                @foreach( $actives_not_commend as $k=>$v )
                                <li class="qc"><a href="/home/active/{{ $v->id }}">{{ $v->active_name }}</a></li>
                                @endforeach
                            </ul>
							    <div class="nav-extra">
							    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
							    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
							    </div>
							</div>
				</div>	
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														
							<div class="searchAbout">
								<span class="font-pale">所在位置：</span>
								<a title="" href="#">>>{{ $top_cid_name->cname }}</a>
							</div>
							<ul class="select">
								<p class="title font-normal">
									<span class="fl">{{$search or ''}}</span>
									<span class="total fl">本页共有<strong class="num">{{ count($data) }}</strong>件相关商品</span>
								</p>
								<div class="clear"></div>
								<!-- <li class="select-result">
									<dl>
										<dt>已选</dt>
										<dd class="select-no"></dd>
										<p class="eliminateCriteria">清除</p>
									</dl>
								</li>
								<div class="clear"></div>
								<li class="select-list">
									<dl id="select1">
										<dt class="am-badge am-round">品牌</dt>	
									
										 <div class="dd-conent">										
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<dd><a href="#">百草味</a></dd>
											<dd><a href="#">良品铺子</a></dd>
											<dd><a href="#">新农哥</a></dd>
											<dd><a href="#">楼兰蜜语</a></dd>
											<dd><a href="#">口水娃</a></dd>
											<dd><a href="#">考拉兄弟</a></dd>
										 </div>
						
									</dl>
								</li>
								<li class="select-list">
									<dl id="select2">
										<dt class="am-badge am-round">种类</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<dd><a href="#">东北松子</a></dd>
											<dd><a href="#">巴西松子</a></dd>
											<dd><a href="#">夏威夷果</a></dd>
											<dd><a href="#">松子</a></dd>
										</div>
									</dl>
								</li>
								<li class="select-list">
									<dl id="select3">
										<dt class="am-badge am-round">选购热点</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="#">全部</a></dd>
											<dd><a href="#">手剥松子</a></dd>
											<dd><a href="#">薄壳松子</a></dd>
											<dd><a href="#">进口零食</a></dd>
											<dd><a href="#">有机零食</a></dd>
										</div>
									</dl>
								</li> -->
					        
							</ul>
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="<?php if($sort == 1){ echo 'first'; } ?>"><a title="综合" href="/home/goodlist/catetop/{{ $cid or '' }}?search={{ $search }}">综合排序</a></li>
									<li class="<?php if($sort == 'sale'){ echo 'first'; } ?>"><a title="销量" href="/home/goodlist/catetop/{{ $cid or '' }}?search={{ $search }}&sort=sale">销量排序</a></li>
									<li class="<?php if($sort == 'price'){ echo 'first'; } ?>"><a title="价格" href="/home/goodlist/catetop/{{ $cid or '' }}?search={{ $search }}&sort=price">价格优先</a></li>
									<li class="<?php if($sort == 'num'){ echo 'first'; } ?> big"><a title="评价" href="/home/goodlist/catetop/{{ $cid or '' }}?search={{ $search }}&sort=num">评价为主</a></li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									@foreach($data as $k => $v)
									
									<li>
										<div class="i-pic limit">
											<a href="/home/goods/{{ $v->gid }}">
											<img src="/uploads/{{ $v->thumb }}" style="width: 100%;height: 220px" />											
											<p class="title fl">{{ $v->gname }}</p>
											<p class="price fl">
												<b>¥</b>
												@if($v->active_id != 0)
												<strong>{{ round($v->price * $v->goodactive->discount / 10, 2)}}</strong>
												@elseif($v->active_id == 0)
												<strong>{{ $v->price }}</strong>
												@endif
											</p>
											<p class="number fl">
												销量<span>{{ $v->sale }}</span>
											</p>
											</a>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="search-side">

								<div class="side-title">
									猜你喜欢
								</div>
								@foreach( $data as $k=>$v )
								<li>
									<div class="i-pic limit">
										<a href="/home/goods/{{ $v->gid }}">
										<img src="/uploads/{{ $v->thumb }}" />
										<p class="title fl">{{ $v->gname }}</p>
										<p class="price fl">
											<b>¥</b>
											@if($v->active_id != 0)
											<strong>{{ $v->price * $v->goodactive->discount / 10}}</strong>
											@elseif($v->active_id == 0)
											<strong>{{ $v->price }}</strong>
											@endif
										</p>
										<p class="number fl">
											销量<span>{{ $v->sale }}</span>
										</p>
										</a>
									</div>
								</li>
								@break($loop->iteration == 3)
								@endforeach

							</div>
							<div class="clear"></div>
							{{ $data->appends(['search'=>$search])->links() }}
						</div>
					</div>

<!--网站底部开始-->
@include('home.public.foot')
<!--网站底部结束-->

        </div>
        </div>
        <!--引导 -->
        <div class="navCir">
            <li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
            <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
            <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li> 
            <li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>                 
        </div>


        <!--菜单 -->
<!--右侧边栏开始-->
@include('home.public.sidebar')
<!--右侧边栏结束-->
        <script>
            window.jQuery || document.write('<script src="/ho/basic/js/jquery.min.js "><\/script>');
        </script>
        <script type="text/javascript " src="/ho/basic/js/quick_links.js "></script>
    </body>

</html>