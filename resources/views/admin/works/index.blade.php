@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 商品列表</span>
    </div>
    
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>文章标题</th>
                    <th>文章作者</th>
                    <th>文章描述</th>
                    <th>文章状态</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($works_data as $k=>$v)
                <tr>
                    <td>{{ $v->wid }}</td>
                    <td >{{ $v->wtitle }}</td>
                    <td >{{ $v->writer }}</td>
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
                        
                        <a href="javascript:;" style="color: #fff" class="btn btn-success" onclick="works('{{$v->title}}','/admin/works/{{$v->wid}}')" >文章详情</a>
                        <a href="/admin/works/{{ $v->wid }}/edit" class="btn btn-warning">修改</a>
                        @if( $v->status == 0 )
                        <form action="/admin/works/{{ $v->wid }}" method="post" style="display: inline-block;" onsubmit="return checkForm()">
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
                
                function works(title,url){
                        layer.open({
                        type: 2,
                        title: title,
                        area: ['750px', '500px'],
                        fixed: false,
                        maxmin: true,
                        content: url
                    });
                }
                function del(url){
                    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

                    if(!window.confirm('你确定要删除吗?')){
                        return false;
                    }

                    $.ajax({
                        type: 'DELETE',
                        url: url,
                    });
                    window.location.reload();
                }
            </script>
        </table>
    </div>
</div>
@endsection