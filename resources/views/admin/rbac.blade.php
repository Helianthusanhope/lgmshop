@extends('admin.layout.index')

@section('content')
<style>
  #txt{
  width: 200px;
  height: 40px;
  position: fixed;
  left:50%;
  top:50%;
  }
  .one{
  border: 1px solid lightsalmon;
  background: lightsalmon;
  color: white;
  }
  #back{
  	width: 50px;
  	height: 40px;
  	position: fixed;
  	left:70%;
  	top:50%;
  }
  #content::before{
    content: " ";
    width: 100%;
    height: 100%;
    position: fixed;
    background: rgba(0,0,0,.3);
    top: 0;
    left: 0;
    z-index: 0;
}
  /*a{
  color: black;
  text-decoration: none;
  font-size: 14px;
  }*/
</style>
<div id="content" >
	<img src="/admin/images/rbac.png">
	<input type="button" class="btn-danger" value="5秒后跳转" id="txt" />
	<button id="back" class="btn-success" ><a href="javascript:history.go(-1)" target=_self>返回</a></button>
  <!--<button><a href="http://www.baidu.com">5秒后跳转到百度</a></button>-->
  <script>
  window.onload=function(){
	var x = document.getElementById("txt");
	var timer = setInterval(func,1000);
	var time = 5;
	function func(){
	x.value = "还剩"+time+"秒";
	time--;
		  if(time<0){
		//   x.style.background="red";
		//   x.style.border="1px solid red";
            clearInterval(timer);
            x.setAttribute("class","one");
            x.value="即将跳转loading...";
			//window.open("http://www.baidu.com","_blank","width=200px,height=100px,left=200px,top=200px,scrollbars=no");
            window.location.href="/admin/index";
		  }
  	}
  }
  </script>
	
</div>
@endsection

  
</body>
</html> 
