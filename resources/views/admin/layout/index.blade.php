<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/custom-plugins/picklist/picklist.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/plugins/select2/select2.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/plugins/ibutton/jquery.ibutton.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/plugins/cleditor/jquery.cleditor.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/custom-plugins/wizard/wizard.css" media="screen">
<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">
<link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
<script src="/layui-v2.4.5/layui/layui.js"></script>
<title>LGM后台管理</title>

@section('css')


@show
</head>
<script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
  
});
</script> 
<body>



	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/admin/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        
            
          
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
                @if(session('admin_user'))
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="{{ session('admin_user')->profile }}" alt="User Photo">
                </div>
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, {{ session('admin_user')->uname }} 
                    </div>
                    <ul>
                        <li><a href="#">修改密码</a></li>
                        <li><a href="/admin/outlogin">退出</a></li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active"><a href="/admin/index"><i class="icon-home"></i> 首页</a></li>
                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 用户管理</a>
                        <ul>
                            <li><a href="/admin/users">用户列表</a></li>
                            <li><a href="/admin/users/create">用户添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 管理员</a>
                        <ul>
                            <li><a href="/admin/adminusers">管理员列表</a></li>
                            <li><a href="/admin/adminusers/create">管理员添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 角色管理</a>
                        <ul>
                            <li><a href="/admin/roles">角色列表</a></li>
                            <li><a href="/admin/roles/create">角色添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-users"></i> 权限管理</a>
                        <ul>
                            <li><a href="/admin/nodes">权限列表</a></li>
                            <li><a href="/admin/nodes/create">权限添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-list"></i> 分区管理</a>
                        <ul>
                            <li><a href="/admin/cates">分区列表</a></li>
                            <li><a href="/admin/cates/create">分区添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-shopping-cart"></i> 商品管理</a>
                        <ul>
                            <li><a href="/admin/goods">商品列表</a></li>
                            <li><a href="/admin/goods/create">商品添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="/"><i class="icon-bell"></i> 订单管理</a>
                        <ul>
                            <li><a href="">订单列表</a></li>                            
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-pictures"></i> 轮播图管理</a>
                        <ul>
                            <li><a href="/admin/banners">轮播图列表</a></li>
                            <li><a href="/admin/banners/create">轮播图添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-fire"></i> 活动管理</a>
                        <ul>
                            <li><a href="/admin/actives">活动列表</a></li>
                            <li><a href="/admin/actives/create">活动添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-link"></i> 友情链接管理</a>
                        <ul>
                            <li><a href="/admin/friends">友情链接列表</a></li>
                            <li><a href="/admin/friends/create">友情链接添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-cogs"></i> 网站配置管理</a>
                        <ul>
                            <li><a href="/admin/web_configs">网站配置列表</a></li>
                            <li><a href="/admin/web_configs/create">网站配置添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-book"></i> 文章管理</a>
                        <ul>
                            <li><a href="/admin/works">文章列表</a></li>
                            <li><a href="/admin/works/create">文章添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- 内容 开始 -->
            <div class="container">
                <!-- 读取提示消息 -->
                @if(session('error'))
                 <div class="mws-form-message error">
                    {{ session('error') }}
                 </div>
                 @endif       
                

                @if(session('success'))
                 <div class="mws-form-message success">
                    {{ session('success') }}
                 </div>
                 @endif 

                 @section('content')

                 @show   
                
            </div>
            <!-- 内容 结束 -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	LGM后台管理 2019
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

    <script src="/admin/jui/js/globalize/globalize.js"></script>
    <script src="/admin/jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/custom-plugins/picklist/picklist.min.js"></script>
    <script src="/admin/plugins/autosize/jquery.autosize.min.js"></script>
    <script src="/admin/plugins/select2/select2.min.js"></script>
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admin/plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="/admin/plugins/cleditor/jquery.cleditor.icon.min.js"></script>
    <!-- Plugin Scripts -->
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/flot/jquery.flot.min.js"></script>
    <!-- <script src="/admin/custom-plugins/wizard/wizard.min.js"></script> -->
    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admin/js/demo/demo.formelements.js"></script>
    <script src="/admin/js/demo/demo.table.js"></script>
    <script src="/admin/js/demo/demo.dashboard.js"></script>
</body>
</html>
