@extends('admin.layout.index')
@section('css')
<link rel="stylesheet" href="/admin/time/css/style.css">
<link rel="stylesheet" href="/admin/tool/css/calendar.css">
@endsection
@section('content')
   <div class="mws-stat-container clearfix">
                    
                    <!-- Statistic Item -->
                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-building"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Floors Climbed</span>
                            <span class="mws-stat-value">324</span>
                        </span>
                    </a>

                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-sport"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Calories Burned</span>
                            <span class="mws-stat-value down">74%
                        </span>
                    </a>
                   
                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-bug"></span>
                        
                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Bugs Fixed</span>
                            <span class="mws-stat-value up">22%</span>
                        </span>
                    </a>
                    
                    <a class="mws-stat" href="#">
                        <!-- Statistic Icon (edit to change icon) -->
                        <span class="mws-stat-icon icol32-car"></span>

                        <!-- Statistic Content -->
                        <span class="mws-stat-content">
                            <span class="mws-stat-title">Cars Repaired</span>
                            <span class="mws-stat-value">77</span>
                        </span>
                    </a>
                </div>
              
                
                <div class="mws-panel grid_3">
                    <div class="mws-panel-header">
                        <span><i class="icon-book"></i> 网站摘要</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <ul class="mws-summary clearfix">
                            <li>
                                <span class="key"><i class="icon-shopping-cart"></i> 本周销售量</span>
                                <span class="val">
                                    <span class="text-nowrap">144 <i class="down icon-arrow-down"></i></span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-install"></i> 本周销售额</span>
                                <span class="val">
                                    <span class="text-nowrap">$6,421</span>
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
                                    <span class="text-nowrap">Debian Linux</span>
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