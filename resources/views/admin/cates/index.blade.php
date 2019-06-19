@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>分区列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>分区ID</th>
                    <th>分区名</th>
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
                        @if( substr_count($v->path,',') < 2 )
                        <a href="/admin/cates/create?cid={{ $v->cid }}" class="btn btn-warning">添加子分区</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection