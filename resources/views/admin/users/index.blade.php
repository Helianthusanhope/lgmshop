@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> Data Table with Numbered Pagination</span>
    </div>
    
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>邮箱</th>
                    <th>手机号</th>
                    <th>头像</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $k=>$v)
                <tr>
                    <td>{{ $v->uid }}</td>
                    <td>{{ $v->uname }}</td>
                    <td>{{ $v->email }}</td>
                    <td>{{ $v->phone }}</td>
                    <td>
                        <img style="border-radius: 5px;border:1px solid #ccc;width: 50px;" src="/uploads/{{ $v->userinfo->profile }}">
                    </td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        {{ $v->useraddr->address or ''}}
                        <a href="/admin/users/{{ $v->uid }}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/users/{{ $v->uid }}" method="post" style="display: inline-block;" onsubmit="return checkForm()">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
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
@endsection