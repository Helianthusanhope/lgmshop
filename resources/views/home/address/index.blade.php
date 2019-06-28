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
                 

						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong><small></small></div>
						</div>
						<hr/>
						@foreach($addr as  $k=>$v)
						<ul>						
								
								
									<li class="user-addresslist">										
									<p class="new-tit new-p-re">
										
										<span class="new-txt">{{ $v->addrname }}</span>
										<span class="new-txt-rd2">{{ $v->phone }}</span>
									</p>

									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">地址：</span>
											<span class="province">{{ $v->area}}</span>
											<span class="street">{{ $v->address}}</span></p>
									</div>
									<div class="new-mu_l2cw">
										@if($v->status == '0')
										<a href="/home/address/update/{{$v->aid}}"><i class="am-icon-edit"></i>设置为默认地址</a>
										<span class="new-mu_l2cw">|</span>
										@else
										<i class="am-icon-edit">默认地址</i>
										<span class="new-mu_l2cw">|</span>
										@endif
										<a href="/home/address/edit/{{$v->aid}}"><i style="background:#ccc">删除</i></a>
									</div>
								</li>
								
							
						</ul>
						@endforeach
						<div class="clear"></div>   					
					<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新建地址</strong><small></small></div>
						</div>
						<div class="info-main">
							
							<form  action= "/home/address/store"class="am-form am-form-horizontal" method="post">

								
								{{ csrf_field() }}
								<div class="layui-form-item" style="width:300px">
									<label for="user-name" class="layui-form-label"> 收货人</label>
									<div class="layui-input-inline">
										<input type="text" name="addrname" required value="{{ old('addrname') }}" class="layui-input" lay-verify="required" >

									</div>
								</div>
								<div class="layui-form-item" style="width:300px">
									<label for="user-name" class="layui-form-label">收货人电话</label>
									<div class="layui-input-inline"">
										<input type="text" name="phone"  value="" required lay-verify="required" class="layui-input" placeholder="请填入正确的11位手机号">

									</div>
								</div>
								<div class="layui-form-item" style="width:300px">
									<label class="layui-form-label">所在地</label>
									<script src="/ho/area.js"></script>
									<div class="layui-input-inline">						
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
													
								<div class="layui-form-item" style="width:300px">
									<label for="user-name2" class="layui-form-label">详细地址</label>
									<div class="layui-input-inline">
										<input type="text" name="address"  value=" {{old('address')}} " required lay-verify="required" lay-verify="required" >

									</div>
								</div>
								
								<div class="info-btn">
								
									<input type="submit" value="保存" class="am-btn am-btn-danger">
								</div>
							 

							</form>
							
						</div>					
					</div>

					<!--错误提示信息开始-->					
					
					<!--提示信息结束-->
					
					

					
@endsection

