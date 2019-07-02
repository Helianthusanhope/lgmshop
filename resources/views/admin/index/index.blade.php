@extends('admin.layout.index')
@section('css')
<link rel="stylesheet" href="/admin/time/css/style.css">
<link rel="stylesheet" href="/admin/tool/css/calendar.css">
@endsection
@section('content')
              
                
                <div class="mws-panel grid_3">
                    <div class="mws-panel-header">
                        <span><i class="icon-book"></i> 网站摘要</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <ul class="mws-summary clearfix">
                            <li>
                                <span class="key"><i class="icon-shopping-cart"></i> 销售量</span>
                                <span class="val">
                                    <span class="text-nowrap">{{ $num_all['num'] }} <i class="up icon-arrow-up"></i></span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-install"></i> 销售额</span>
                                <span class="val">
                                    <span class="text-nowrap">${{ $num_all['price'] }}</span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-key"></i> 现在时间</span>
                                <span class="val">
                                    <span class="text-nowrap"><div class='center'>
                            <p></p>
                        </div></span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-windows"></i> 操作系统</span>
                                <span class="val">
                                    <span class="text-nowrap">Windows</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="calendar" class="calendar"></div>

            
              
@endsection
@section('js')
<script src='/admin/time/js/jquery.min.js'></script>
<script  src="/admin/time/js/index.js"></script>
<script src="/admin/tool/js/jquery.min.js"></script>
<script src="/admin/tool/js/calendar.js"></script>
@endsection