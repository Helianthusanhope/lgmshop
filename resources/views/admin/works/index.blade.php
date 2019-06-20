@extends('admin.layout.index')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>文章(新闻)列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>文章标题</th>
                    <th>文章描述</th>
                    <th>文章状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($works_data as $k=>$v)
                <tr>
                    <td>{{ $v->wid }}</td>
                    <td>{{ $v->wtitle}}</td>
                    <td>{{ $v->wdesc}}</td>

                    @if($v->status)
                        <td><span style="background:skyblue;font-size:15px">显示中</span></td>
                    @else 
                        <td><span style="background:#ccc; font-size:15px" >未显示</span></td>
                    @endif
                    <td>
                        <a href="/admin/works/status/{{ $v->wid }}" class="btn btn-success">
                            {!! $v->status == 0 ? '显示' : '<p style="color: #D34011">不显示</p>' !!}
                        </a>
                        <a href="javascript:;" style="color: #fff" class="btn btn-success" onclick="goods('{{$v->gname}}','/admin/goods/{{$v->gid}}')" >商品详情</a>
                        <a href="/admin/works/{{ $v->wid }}/edit" class="btn btn-warning">修改</a>
                        <form action="/admin/works/{{ $v->wid }}" method="post" style="display: inline-block;">
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