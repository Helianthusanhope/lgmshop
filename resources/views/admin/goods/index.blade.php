@extends('admin.layout.index')
@section('css')

@endsection
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
                    <th>商品名</th>
                    <th>商品价格</th>
                    <th>所属分类</th>
                    <th>状态</th>
                    <th>销售量</th>
                    <th>库存量</th>
                    <th>缩略图</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($goods as $k=>$v)
                <tr>
                    <td>{{ $v->gid }}</td>
                    <td>{{ $v->gname }}</td>
                    <td>{{ $v->price }}</td>
                    <td>
                        @foreach($cates as $kk=>$vv)
                            @if($vv->cid == $v->cid)
                                {{ $vv->cname }}
                            @endif
                        @endforeach
                    </td>
                    @if($v->good_status == 0)
                    <td>未上架</td>
                    @else
                    <td>已上架</td>
                    @endif
                    <td>{{ $v->sale }}</td>
                    <td>
                    <?php
                        if (!$v->goodstock) {
                            $stock = 0;
                        } else {
                            $stock = 0;
                            foreach($v->goodstock as $kk=>$vv){
                                $stock += $vv->stock;
                            }
                        }
                        echo "$stock";
                    ?>
                    </td>
                    <td>
                        <img style="border-radius: 5px;border:1px solid #ccc;width: 50px;" src="/uploads/{{ $v->thumb }}">
                    </td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        @if($stock == 0)
                        {{ '暂无库存' }}
                        @else
                        <a href="/admin/goods/status/{{ $v->gid }}" class="btn btn-success">
                            {!! $v->good_status == 0 ? '上架' : '<p style="color: #D34011">下架</p>' !!}
                        </a>
                        <a href="javascript:;" class="btn btn-success" onclick="goActive('/admin/goactive/{{ $v->gid }}')">{!! $v->active_id == 0 ? '参加活动' : '<p style="color: #4A4F06">活动管理</p>' !!}</a>
                        @endif
                        
                        <a href="javascript:;" style="color: #fff" class="btn btn-success" onclick="goods('{{$v->gname}}','/admin/goods/{{$v->gid}}')" >商品详情</a>
                        <a href="/admin/goods/{{ $v->gid }}/edit" class="btn btn-warning">修改</a>
                        <a href="javascript:;" onclick="del('/admin/goods/{{ $v->gid }}')" class="btn btn-danger">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

            <script type="text/javascript">
                
                function goods(title,url){
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
@section('js')

@endsection