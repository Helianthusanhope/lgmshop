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
                    <th>分类ID</th>
                    <th>分类名</th>
                    <th>邮箱</th>
                    <th>父级分类id</th>
                    <th>创建时间</th>
                    <th>分类路径</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cates as $k=>$v)
                <tr>
                    <td>{{ $v->cid }}</td>
                    <td>{{ $v->cname }}</td>
                    <td>{{ $v->pid }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>{{ $v->path }}</td>
                    <td>
                        <img style="border-radius: 5px;border:1px solid #ccc;width: 50px;" src="/uploads/{{ $v->userinfo->profile}}">
                    </td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        <a href="/admin/cates/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/cates/{{ $v->id }}" method="post" style="display: inline-block;">
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