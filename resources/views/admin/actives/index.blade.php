@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 活动列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>活动名称</th>
                    <th>活动描述</th>
                    <th>活动折扣</th>
                    <th>活动展示图</th>
                    <th>背景图</th>
                    <th>推荐状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($common_actives_data as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->active_name}}</td>
                    <td>{{ $v->active_desc}}</td>
                    <td>{{ $v->discount}}</td>
                    <td>
                        <img src="/uploads/{{$v->active_thumb}}" width="50px">
                    </td>
                    <td>
                        <img src="/uploads/{{$v->background}}" width="50px">
                    </td>
                    @if($v->status == 0)
                    <td><span style="background:#ccc;font-size:15px">未上推荐</span></td>
                    @else
                    <td><span style="background:skyblue; font-size:15px" >已上推荐</span></td>
                    @endif
                    <td>
                        <a href="/admin/actives/status/{{ $v->id }}" class="btn btn-success">
                            {!! $v->status == 0 ? '上推荐位' : '<p style="color: #D34011">下推荐位</p>' !!}
                        </a>                
                        <a href="/admin/actives/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/actives/{{ $v->id }}" method="post" style="display: inline-block;">
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