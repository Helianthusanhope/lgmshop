@extends('home.public.myself')


@section('css')
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>发表评论</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/appstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/ho/js/jquery-1.7.2.min.js"></script>
	</head>




@endsection




@section('content')

<div class="user-comment">
	<!--标题 -->
	<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
	</div>
	<hr/>

	<div class="comment-main">
		@foreach($orders['good'] as $k => $v)
		<form>
		<div class="comment-list">
			<div class="item-pic">

				<a href="#" class="J_MakePoint">
					<img src="/uploads/{{ $v['picture'] }}" style="width: 100%;height: 200px;" class="itempic">
				</a>

			</div>
			
			<div class="item-title">
		
				<div class="item-name">
					<a href="#">
						<p class="item-basic-info">{{ $v['gname'] }}</p>
					</a>
				</div>
				<div class="item-info">
					<div class="info-little">
						<span>规格：{{ $v['color'] }}*{{ $v['size'] }}</span>
						
					</div>
					<div class="item-price">
						价格：<strong>{{ $v['price'] }}</strong>
					</div>										
				</div>
			</div>

			<div class="clear"></div>
			<div class="item-comment">
				<textarea class="commenttext" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！"></textarea>

			</div>

			
			<div class="item-opinion">
				<li><i class="op1 active" stars="5"></i>完美</li>
				<li><i class="op2" stars="4"></i>好评</li>
				<li><i class="op3" stars="3"></i>中评</li>
				<li><i class="op4" stars="2"></i>差评</li>
				<li><i class="op5" stars="1"></i>极差</li>
			</div>
			
		</div>
		<div class="info-btn">
			<div class="am-btn am-btn-danger" stid="{{ $v['stid'] }}" oid="{{ $oid }}">发表评论</div>
		</div>			
		</form>

		@endforeach
						
									
<script type="text/javascript">
	$(document).ready(function() {
		$(".comment-list .item-opinion li").click(function() {	
			$(this).prevAll().children('i').removeClass("active");
			$(this).nextAll().children('i').removeClass("active");
			$(this).children('i').addClass("active");
			
		});
 	})
	$(document).ready(function() {
		$(".am-btn-danger").click(function() {	
			var stars = $(this).parent().prev().find('.active').attr('stars');
			if(!stars){
				stars = 5;
			}
			var comment = $(this).parent().prev().find('.commenttext').val();
			var stid = $(this).attr('stid');
			var oid = $(this).attr('oid');
			$.ajaxSetup({
				headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.post('/home/personal/gocomment',{stars,comment,stid,oid},function(res){
				if(res.msg == 'err'){
                // 失败
                layer.msg(res.info);
            }else{
                // 成功
                layer.msg(res.info);
                setTimeout(function(){
                    window.location.reload();
                },600);
            }
        },'json');
			
		});
 	})
</script>					

							
		
	</div>

</div>

								
@endsection