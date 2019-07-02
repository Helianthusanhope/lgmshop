                <!--搜索框开始-->
                <div class="nav white">
                    <div class="logoBig">
                        @foreach( $commoon_Webconfigs_data as $k=>$v )
                        <li><img src="/uploads/{{$v->logo}}" /></li>
                        @endforeach
                    </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#"></a>
                        <form action="/home/goodlist" method="get">
                            <input id="searchInput" name="search" type="text" placeholder="搜索" value="{{ $search or '' }}" autocomplete="off">
                            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                        </form>
                    </div>
                </div>
                <!--搜索框结束--->

                <div class="clear"></div>
<!-- 导航 开始 -->