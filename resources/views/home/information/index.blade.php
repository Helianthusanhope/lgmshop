@extends('home.public.myself')



@section('content')
	<!--个人信息 -->
						<div class="info-main">
							<form  action= "/home/information/update"class="am-form am-form-horizontal" method="post" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>

									<div class="am-form-content">
										<input type="text" name="uname" value="{{ session('home_user')->uname }}">

									</div>
								</div>

							
														
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
											<input type="radio" name="sex" value="x" {{ $data->sex == 'm' ? 'checked': ''}}  > 保密
										</label>
										
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">生日</label>
									<div class="am-form-content">
										<input type="text" name="birthday"  value="{{$data->birthday ? $data->birthday: '' }}">

									</div>
								</div>
						

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input type="text" name="phone" value="{{ session('home_user')->phone}}" >

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input type="text" name="email" value="{{session('home_user')->email}}">

									</div>
								</div>
								
								<div class="info-btn">
									<input type="submit" class="am-btn am-btn-danger" value="更改个人信息">
									
								</div>

							</form>
						</div>



@endsection

