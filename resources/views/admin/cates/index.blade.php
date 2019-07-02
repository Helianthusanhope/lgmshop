@extends('admin.layout.index')

@section('content')
<link rel="stylesheet" type="text/css" href="/admin/plugins/prettyphoto/css/prettyPhoto.css" media="screen">
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>分区列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>分区ID</th>
                    <th>分区名</th>
                    <th>分区广告图</th>
                    <th>分区描述</th>
                    <th>父级分区id</th>
                    <th>创建时间</th>
                    <th>分区路径</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cates as $k=>$v)
                <tr>
                    <td>{{ $v->cid }}</td>
                    <td>{{ $v->cname }}</td>
                    <td>
                        @if( substr_count($v->path,',') == 0 )
                        <div class="mws-panel-body" style="width: 60px">
                        <ul class="thumbnails mws-gallery" style="height: 50px;width: 50px">
                            <li>
                                <span class="thumbnail center"  style="height: 50px;width: 50px"><img style="height: 50px" src="/uploads/{{ $v->thumb }}" alt=""></span>
                                <span class="mws-gallery-overlay" style="width: 50px">
                                    <a href="/uploads/{{ $v->thumb }}" rel="prettyPhoto[gallery1]" class="mws-gallery-btn"><i class="icon-search"></i></a>
                                </span>
                            </li>
                        </ul>
                        </div>
                        @else
                        <span>待用~</span>
                        @endif
                    </td>
                    <td>{{ $v->desc }}<span>{{substr_count($v->path,',') == 0 ? '': '(待用)'}}</span> </td>
                    <td>{{ $v->pid }}</td>
                    <td>{{ $v->created_at }}</td>
                    <td>{{ $v->path }}</td>
                    <td>
                        <a href="/admin/cates/{{ $v->cid }}/edit" class="btn btn-warning">修改</a>
                        @if( substr_count($v->path,',') < 2 )
                         <a href="/admin/cates/create?cid={{ $v->cid }}" class="btn btn-success">添加子分区</a>
                         @endif
                         
                        @if( substr_count($v->path,',') > 1 )
                        <form action="/admin/cates/{{ $v->cid }}" method="post" style="display: inline-block;" onsubmit="return checkForm()">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                        @endif                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection