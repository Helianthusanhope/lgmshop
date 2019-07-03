@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>轮播图列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>轮播图名称</th>
                    <th>轮播图描述</th>
                    <th>轮播图</th>
                    <th>活动ID</th>
                    <th>轮播图状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banner_data as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->title}}</td>
                    <td>{{ $v->desc}}</td>
                    <td>
                        <img src="/uploads/{{$v->url}}" width="50px">
                    </td>
                    <td>{{$v->active_id}}</td>
                    @if($v->status)
                        <td><span style="background:skyblue;font-size:15px">显示中</span></td>
                    @else 
                        <td><span style="background:#ccc; font-size:15px" >未显示</span></td>
                    @endif
                    <td>
                      <a href="/admin/banners/status/{{$v->id}}" class="btn btn-success">
                            {!! $v->status ? '取消显示' : '<p style="color: #D34011">显示</p>' !!}
                        </a>   
                        <a href="/admin/banners/{{ $v->id }}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/banners/{{ $v->id }}" method="post" style="display: inline-block;">
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