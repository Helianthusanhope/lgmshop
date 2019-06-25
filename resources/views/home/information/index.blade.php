@extends('home.public.myself')

@section('css')
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/ho/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/ho/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/ho/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
	</head>

 

@endsection
@section('content')
	
	<!--个人信息 -->
						<div class="info-main">
							
							<form  action= "/home/information/update"class="am-form am-form-horizontal" method="post" enctype="multipart/form-data">

								
								{{ csrf_field() }}
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" name="nikename" value="{{ $data->nikename ? $data->nikename : '' }}">

									</div>
								</div>

								<!-- <div class="am-form-group" > -->
									<label for="user-name2" class="am-form-label">头像</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<span><img src="/uploads/{{ $data->profile}}" style="width:60px"></span>
									<br>
									<div class="am-form-content"style="width:80px">
										<input type="hidden" name="old_profile"  value="{{ $data->profile}}">

									</div>								
									<div class="am-form-content">
										<input type="file" name="profile"  value="">

									</div>
								<!-- </div>
 -->
							
														
								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										
										<label class="am-radio-inline" >
											<input type="radio" name="sex" value="m" {{ $data->sex == 'm' ? 'checked': ''}}> 男
										</label>
										
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="w" {{ $data->sex == 'w' ? 'checked': ''}} >女
										</label>
										
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="x" {{ $data->sex == 'x' ? 'checked': ''}} > 保密
										</label>
										
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">生日</label>
									<div class="am-form-content">
										<input type="text" name="birthday"  value="{{$data->birthday ? $data->birthday: '' }}" placeholder="例如2000-02-20">

									</div>
								</div>
								
								<div class="info-btn">
								
									<input type="submit" value="保存修改" class="am-btn am-btn-danger">
								</div>
							 

							</form>
							
						</div>



@endsection

