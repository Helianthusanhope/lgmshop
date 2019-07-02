<!--网站样式开始-->
@section('css')


@show

<!--网站样式结束-->

<!--网站导航开始-->
@include('home.public.header')
<!--网站导航结束-->

<!--悬浮搜索框开始-->
@include('home.public.search')
<!--搜索框结束-->

					</div>
				</div>
			</article>
		</header>
<!--网站分类开始--->
            <div class="nav-table">
					  <div class="long-title"><span class="all-goods">全部分类</span></div>
                       <div class="nav-cont">
                            <ul>
                                <li class="index"><a href="/">首页</a></li>
                                @foreach( $actives_not_commend as $k=>$v )
                                <li class="qc"><a href="#">{{ $v->active_name }}</a></li>
                                @endforeach
                            </ul>
                            <div class="nav-extra">
                                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
                            </div>
                        </div>
			</div>

<!--网站分类结束--->
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
							<!--重写部分开始-->
							@section('content')
													
							@show
							<!--重写部分结束-->
					</div>

				</div>
				<!--底部-->
@include('home.public.foot')
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="/home/personal">个人中心</a>
					</li>
					<li class="person">
						
						<ul>
							<li class="active"> <a href="/home/information/edit">个人资料</a></li>
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

	</body>

</html>