@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 网站配置列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>网站名称</th>
                    <th>网站描述</th>
                    <th>状态</th>
                    <th>联系方式</th>
                    <th>网站logo</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($webconfig as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->describe }}</td>
                    <td>{{ $v->status == 0 ? '未开启' : '已开启' }}</td>
                    <td>{{ $v->telephone }}</td>
                    <td>
                        <img style="border-radius: 5px;border:1px solid #ccc;width: 50px;" src="/uploads/{{ $v->logo }}">
                    </td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        <a href="/admin/webconfigs/{{ $v->id }}/edit" class="btn btn-warning" onclick="return checkForm()">修改</a>
                        <a href="/admin/webconfigs/status/{{ $v->id }}" onclick="status()" class="btn btn-danger">{!! $v->status == 0 ? '开启' : '<p style="color: #D34011">关闭</p>' !!}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <script type="text/javascript">
                function checkForm()
                {
                    if (!window.confirm('你确定要修改吗？'))  { 
                        return false; 
                    }
                }
                function status(){
                    if(!window.confirm('你确定要修改网站状态吗?')){
                        return false;
                    }
                }
            </script>
        </table>
    </div>
</div>
@endsection