<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="mws-panel grid_8" style="margin:20px 40px;">
    <div class="mws-panel-header">
        <span><i class="icon-bold"></i> {!! htmlspecialchars_decode($work_data->title) !!}</span>
    </div>
    <div class="mws-panel-body">
        {!! htmlspecialchars_decode($work_data->wcontent) !!}
    </div>
</div>
</body>
</html>