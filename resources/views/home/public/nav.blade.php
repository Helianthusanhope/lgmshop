<!-- 导航 开始 -->
            <div class="shopNav">
                <div class="slideall">
                    
                       <div class="long-title  "><a href="/home/goodlist/sort"><span class="all-goods">全部分类</span></a></div>
                       <div class="nav-cont">
                            <ul>
                                <li class="index"><a href="/">首页</a></li>
                                @foreach( $actives_not_commend as $k=>$v )
                                <li class="qc"><a href="/home/active/{{ $v->id }}">{{ $v->active_name }}</a></li>
                                @endforeach
                            </ul>
                            <div class="nav-extra">
                                <i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
                                <i class="am-icon-angle-right" style="padding-left: 10px;"></i>
                            </div>
                        </div>
                
                
            
<!-- 导航结束 -->