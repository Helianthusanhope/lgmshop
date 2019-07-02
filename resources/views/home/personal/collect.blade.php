@extends('home.public.myself')


@section('css')
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的收藏</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/colstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/ho/js/jquery-1.7.2.min.js"></script>

	</head>
<script>
	    layui.use(['layer', 'form'], function(){

	      var layer = layui.layer;
	      
	     
	    });
    </script>

	
@endsection




@section('content')

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							<div class="s-bar">
								我的收藏
								<a class="am-badge am-badge-danger am-round"></a>
								<!-- <a class="am-badge am-badge-danger am-round">下架</a> -->
							</div>
							<div class="s-content">
								@if(!$good)
								<img src="/ho/images/c6ac03e15f4b5efc7e2a268970ce660baab1ba21.jpg_320x200.jpg">

								@else
								@foreach($good as $k=>$v)
								<div class="s-item-wrap">
									<div class="s-item">

										<div class="s-pic">
											<a href="#" class="s-pic-link">
												<img src="/uploads/{{$v->thumb}}" alt="{{ $v->gname}}" title="{{ $v->gname}}" class="s-pic-img s-guess-item-img">
											</a>
										</div>
										<div class="s-info">
											<div class="s-title"><a href="/home/goods/{{ $v->gid}}" title="">{{ $v->gname}}</a></div>
										 <div class="s-price-box">
										 		@if($v->active_id)
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{ $v->price *$v->active_id->discount /10}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												@else
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												@endif
											</div>
											<div class="s-extra-box">
												<span class="s-comment">好评: 98.03%</span>
												<span class="s-sales">月销: 219</span>
											</div>
										</div>
										<div class="s-tp">
											<span class="ui-btn-loading-before" onclick="edit('{{$v->gid}}')">取消收藏</span>
											<!-- <i class="am-icon-shopping-cart"></i>
											<span class="ui-btn-loading-before buy"></span> -->
											<p>
												<a href="javascript:;" class="c-nodo J_delFav_btn">取消收藏</a>
											</p>
										</div>
									</div>

								</div>
								@endforeach
								@endif
							</div>

							<div class="s-more-btn i-load-more-item" data-screen="0"><i class="am-icon-refresh am-icon-fw"></i></div>

						</div>

					</div>


<script type="text/javascript">

	function edit(gid)
	{
		$.get('/home/collect/edit',{gid},function(res){

			if(res.msg == 'ok') {
				 layer.msg(res.info);
				 window.location.href='/home/myself/collect';
			}else{
				layer.msg(res.info);
			}

		},'json')
		
	}
</script>
@endsection