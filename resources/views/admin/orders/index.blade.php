@extends('admin.layout.index')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i> 订单列表</span>
    </div>
    
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>下单人id</th>
                    <th>订单号</th>
                    <th>收货地址</th>
                    <th>订单状态</th>
                    <th>总金额</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $k=>$v)
                <tr>
                    <td>{{ $v->id }}</td>
                    <td>{{ $v->uid }}</td>
                    <td>{{ $v->oname }}</td>
                    <td>{{ $v->addr->address }}</td>
                    @if($v->order_status == 0)
                    <td>未付款</td>
                    @elseif($v->order_status == 1)
                    <td>未发货</td>
                    @elseif($v->order_status == 2)
                    <td>已发货</td>
                    @elseif($v->order_status == 3)
                    <td>待评价</td>
                    @else
                    <td>已完成</td>
                    @endif
                    <td>{{ $v->price_all }}</td>
                    <td>{{ $v->created_at}}</td>
                    <td>
                        @if($v->order_status != 0)
                        <a href="javascript:;" style="color: #fff" class="btn btn-success" onclick="orders('{{$v->oname}}','{{$v->id}}')" >订单详情</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

            <script type="text/javascript">
                
                function orders(title,url){
                    layer.open({
                    type: 2,
                    title: title,
                    area: ['750px', '500px'],
                    fixed: false,
                    maxmin: true,
                    content: '/admin/orders/'+url
                });
                }
            </script>
        </table>
    </div>
</div>
@endsection