<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

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

</head>
<body>
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
<div class="mws-panel grid_8" style="margin: auto;">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 商品库存</span>
    </div>
    
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>库存ID</th>
                    <th>规格</th>
                    <th>大小</th>
                    <th>库存量</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goods as $k=>$v)
                <tr>
                    <td>{{ $v->stid }}</td>
                    <td>{{ $v->color }}</td>
                    <td>{{ $v->size }}</td>
                    <td>{{ $v->stock }}</td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        <form action="/admin/goodstock/{{ $v->stid }}" method="post" style="display: inline-block;" onsubmit="return checkForm()">
                            {{ csrf_field() }}
                            
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>

            <script type="text/javascript">
                
                function checkForm()
                {
                    if (window.confirm('你确定要删除吗？'))  { 
                        return true; 
                    } else {
                        return false; 
                    }
                }
                
            </script>
        </table>
    </div>
</div>

<div class="mws-panel">
    <div class="mws-panel-header">
        <span><i class="icon-loading-2"></i> jQuery-UI Spinner</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/stockstore" method="post">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">规格</label>
                    <div class="mws-form-item">
                        <input type="hidden" name="gid" value="{{ $detail->gid }}">
                        <input type="text" name="color" class="small" value="{{ old('color') or ''}}" placeholder="规格">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">大小</label>
                    <div class="mws-form-item">
                        <input type="text" name="size" class="small" value="{{ old('size') or ''}}" placeholder="大小">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">库存</label>
                    <div class="mws-form-item">
                        <div class="small">
                            <input type="text" class="mws-spinner" name="stock" value="0">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <input type="reset" value="重置" class="btn ">
            </div>
        </form>
    </div>
</div>
<div class="mws-panel grid_8" style="margin: auto;">
    <div class="mws-panel-header">
        <span><i class="icon-bold"></i> 商品详情</span>
    </div>
    <div class="mws-panel-body">
        {{ $detail->detail }}
    </div>
</div>




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