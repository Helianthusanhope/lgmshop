@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 友情链接列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>友情链接名称</th>
                    <th>友情链接地址</th>
                    <th>状态</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($friends as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->friend_name }}</td>
                    <td>{{ $v->url }}</td>
                    <td>{{ $v->status == 0 ? '未开启' : '已开启' }}</td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        <a href="/admin/friends/{{ $v->id }}/edit" class="btn btn-warning" onclick="return checkForm()">修改</a>
                        <a href="/admin/friends/status/{{ $v->id }}" onclick="status()" class="btn btn-danger">{!! $v->status == 0 ? '开启' : '<p style="color: #D34011">关闭</p>' !!}</a>
                         @if( $v->status == 0 )
                        <form action="/admin/friends/{{ $v->id }}" method="post" style="display: inline-block;" onsubmit="return checkForm()">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        @endif
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
                    if(!window.confirm('你确定要修改友情链接状态吗?')){
                        return false;
                    }
                }
            </script>
        </table>
    </div>
</div>
@endsection