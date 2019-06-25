@extends('home.public.myself')

@section('css')
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>地址管理</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/ho/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

		<link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
		<script src="/layui-v2.4.5/layui/layui.js"></script>

  
	</head>


@endsection



@section('content')

<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong><small></small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
							@foreach($addr as  $k=>$v)
							<li class="user-addresslist">
								<span class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</span>
								<p class="new-tit new-p-re">
									<span class="new-txt">{{ $v->addrname }}</span>
									<span class="new-txt-rd2">{{ $v->phone }}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">详细地址：</span>									
										<span class="street">{{ $v->address}}</span></p>
								</div>

								<div class="new-addr-btn">
									<a href="#"><i class="am-icon-edit"></i>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onClick="delClick(this);"><i class="am-icon-trash"></i>删除</a>
								</div>
							</li>
							@endforeach
						</ul>
						
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">
	

								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> <small></small></div>
								</div>
								<hr/>
								
								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form action="/home/address/store"class="am-form am-form-horizontal" method="post">
										{{ csrf_field() }}

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" name="addrname" placeholder="收货人">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" name="phone" placeholder="手机号必填" type="email">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<script src="/ho/area.js"></script>
											<div class="am-form-content address">
												<select id="Province" runat="server" name="province" style="width: 90px" ></select>
												<select id="Country" runat="server" name="country" style="width: 90px"></select>
												<select id="Town" runat="server" name="town" style="width: 90px"></select>
											</div>
											
										</div>
										<script language="javascript">
												setup();
											</script>


										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="address"></textarea>
												<small>请填写50字以内</small>
											</div>
										</div>

										<div class="am-form-group">
											
											<input type="submit" value="保存"class="am-btn am-btn-danger" >										
								
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>

					<!--错误提示信息开始-->
					<script>
						//一般直接写在一个js文件中
						layui.use(['layer', 'form'], function(){
						  var layer = layui.layer
						  ,form = layui.form;
						  
						  layer.msg('Hello World');
						});
						</script>

					<!--提示信息结束-->



					<!--模板自带的JS--->
					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>
					<!--模板自带模板结束-->

@endsection

