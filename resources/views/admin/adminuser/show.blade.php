<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- layer 静态资源 开始-->
<link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
<script src="/layui-v2.4.5/layui/layui.js"></script>
<script>
layui.use(['layer', 'form'], function(){
  var layer = layui.layer;
});
</script>
<!-- layer 静态资源 结束 -->
</head>
<body>
	<div class="container">
		<form>
		  <div class="form-group">
		    <label for="uname">用户名</label>
		    <input type="text" class="form-control" name="uname" value="{{ session('admin_user')->uname }}" id="exampleInputEmail1" placeholder="用户名">
		  </div>
		  <div class="form-group">
		    <label for="upass">密码</label>
		    <input type="password" class="form-control" name="upass" id="upass" placeholder="密码">
		  </div>
		   <div class="form-group">
		    <label for="repass">确认密码</label>
		    <input type="password" class="form-control" name="repass" id="repass" placeholder="确认密码">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('form:first').submit(function(){

			//数据验证
			let uname = $('form input[name=uname]').val();
			let upass = $('form input[name=upass]').val();
			let repass = $('form input[name=repass]').val();

			//发送ajax
			if(uname ==''){
				layer.msg('名字不能为空');
				return false;
			} else if (upass =='') {
				layer.msg('密码不能为空');
				return false;
			}else if (repass =='') {
				layer.msg('确认密码不能为空');
				return false;
			}else if (upass != repass ) {
				layer.msg('两次密码不一样');
				return false;
			}
			

		$.post('/admin/adminuser/changeInfo',{uname,upass},function(res){
			if( res.msg == 'ok'){
				layer.msg( res.info );
				setTimeout(function(){
					//关闭当前打开的窗口
					window.parent.location.reload();
					var index = parent.layer.getFrameIndex(window.name);
					let res = parent.layer.close(index);
				},800);
				//跳转
					window.parent.location.href = '/admin/index';
					return false;
			} else {
				layer.msg( res.info );
			}
			
		},'json');
		return false;
	})
	</script>

</body>
</html>



