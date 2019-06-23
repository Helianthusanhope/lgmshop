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
                    <th>商品名</th>
                    <th>规格</th>
                    <th>大小</th>
                    <th>缩略图</th>
                    <th>评论</th>
                    <th>库存量</th>
                    <th>发货数量</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goodstock as $k=>$v)
                <tr>
                    <td>{{ $v['stid'] }}</td>
                    <td>{{ $v['gname'] }}</td>
                    <td>{{ $v['color'] }}</td>
                    <td>{{ $v['size'] }}</td>
                    <td><img src="/uploads/{{ $v['thumb'] }}" style="width: 50px;"></td>
                    <td>{{ $v['comment'] or '无' }}</td>
                    <td>{{ $v['stock'] }}</td>
                    <td>{{ $v['number'] }}</td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="mws-panel grid_4" style="margin: auto;">
    <div class="mws-panel-header">
        <span><i class="icon-comment"></i>操作</span>
    </div>
    <div class="mws-panel-body" style="text-align: center">
        <div style="margin-bottom:16px;">
            <div class="btn-toolbar">
                @if(($status == 1) && ($orders->order_status == 1))
                <a href="/admin/orders/deliver/{{ $orders->id }}"  onclick="return checkForm()" class="btn btn-success" style="width: 100%">发货</a>
                @elseif($orders->order_status == 2)
                <a class="btn btn-success">物流详情</a>
                @elseif($orders->order_status == 3)
                <button type="button" class="btn" disabled="disabled">待评价</button>
                @elseif($orders->order_status == 4)
                <button type="button" class="btn" disabled="disabled">订单已完成</button>
                @elseif($status == 0)
                <button type="button" class="btn" disabled="disabled">库存不足不能发货</button>
                @endif
            </div>
        </div>
    </div>      
</div>

<script type="text/javascript">
    function checkForm(){
        if(!window.confirm('你确定要发货吗?')){
            return false;
        }
    }
</script>


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