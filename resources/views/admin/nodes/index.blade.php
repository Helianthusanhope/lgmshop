@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>权限列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
               <tr>
                    <th>ID</th>
                    <th>权限名称</th>
                    <th>控制器名称</th>
                    <th>方法名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->desc }}</td>
                    <td>{{ $v->cname }}</td>
                    <td>{{ $v->aname }}</td>
                    <td>
                        {{ $v->useraddr->address or ''}}
                        <a href="/admin/nodes/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/nodes/{{ $v->id }}" method="post" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection