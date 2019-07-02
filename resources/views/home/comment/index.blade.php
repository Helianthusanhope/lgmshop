@extends('home.public.myself')


@section('css')
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>评价管理</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/cmstyle.css" rel="stylesheet" type="text/css">

		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/ho/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	</head>



@endsection




@section('content')


<div class="user-comment">
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
	</div>
	<hr/>

	<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

		<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
			<li class="am-active"><a href="#tab1">所有评价</a></li>
		</ul>

		<div class="am-tabs-bd">
			<div class="am-tab-panel am-fade am-in am-active" id="tab1">
				<div class="comment-main">
					<div class="comment-list">
						<div class="comment-top">
								<div class="th th-price">
									<td class="td-inner">评论</td>
								</div>
								<div class="th th-item">
									<td class="td-inner">商品</td>
								</div>													
							</div>
						@foreach($comment as $k => $v)
						<ul class="item-list">
							<div class="comment-top">
								<div class="th th-price">
									<td class="td-inner"></td>
								</div>
								<div class="th th-item">
									<td class="td-inner"></td>
								</div>													
							</div>
							<li class="td td-item">
								<div class="item-pic">
									<a href="/home/goods/{{ $v->gid }}" class="J_MakePoint">
										<img src="/uploads/{{ $v->stockComment->picture }}" class="itempic">
									</a>
								</div>
							</li>
							<li class="td td-comment">
								<div class="item-title">
									
									<div class="item-name">
										<a href="#">
											<p class="item-basic-info">{{ $v->goods->gname }}</p>
										</a>
									</div>
								</div>
								<div class="item-comment">
									{{$v->comment}}
								</div>
								<div class="item-info">
									<div>
										<p class="info-little"><span>规格：{{ $v->stockComment->color }}*{{ $v->stockComment->size }}</span> </p>
										<p class="info-time">{{ $v->created_at }}</p>
									</div>
								</div>
							</li>
						</ul>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>								
@endsection