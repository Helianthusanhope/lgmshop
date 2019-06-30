<!--网站头部开始-->
@include('home.public.head')
<!---网站头部结束-->
<!-- header 开始 -->
@include('home.public.header')

<!-- header 结束 -->
<!-- 轮播图 开始 -->
@include('home.public.banners')
<!-- 轮播图 结束 -->
<!-- 搜索, 开始-->
@include('home.public.search')
<!-- 搜索,导航 结束-->
<!-- 导航 开始-->
@include('home.public.nav')
<!-- 导航 结束-->
<!--商品分类开始-->
@include('home.public.cates')
<!--商品分类结束-->

                    <!--走马灯 -->
                    <div class="marqueen">
                        <span class="marqueen-title">商城头条</span>
                        <div class="demo">
                            <ul>
                                @foreach( $works_data as $k=>$v )                              
                                <li><a target="_blank" href="/home/work/{{ $v->wid }}">{{ $v->wtitle }}</a></li>
                                @endforeach
                                <div class="mod-vip">
                                    @if(session('home_login')) 
                                    <div class="m-baseinfo">
                                        <a href="person/index.html">
                                            <img src="/ho/images/getAvatar.do.jpg">
                                        </a>
                                        <em>
                                            Hi,<span class="s-name">
                                            {{session('home_user')->uname}}
                                    
                                            
                                            </span>
                                            <a href="#"><p>点击更多优惠活动</p></a>
                                        </em>
                                    </div>
                                    <div>
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="order.html"><i><img src="/ho/images/pay.png"/></i><span>待付款[1]</span></a>
                                                </td>
                                                <td>
                                                    <a href="order.html"><i><img src="/ho/images/send.png"/></i><span>待发货[2]</span></a>
                                                </td>
                                                <td>
                                                    <a href="order.html"><i><img src="/ho/images/receive.png"/></i><span>待收货[4]</span></a>
                                                </td>
                                                <td>
                                                    <a href="order.html"><i><img src="/ho/images/comment.png"/></i><span>待评价[1]</span></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    @else
                                    <div class="m-baseinfo">
                                        <a href="person/index.html">
                                            <img src="/ho/images/getAvatar.do.jpg">
                                        </a>
                                        <em>
                                            Hi,<span class="s-name">小叮当                                    
                                            </span>
                                            <a href="#"><p>点击更多优惠活动</p></a>
                                        </em>
                                    </div>
                                            
                                    <div class="member-logout">
                                        <a class="am-btn-warning btn" href="/home/login">登录</a>
                                        <a class="am-btn-warning btn" href="/home/register">注册</a>
                                    </div>
                                    @endif
                                    <div class="clear"></div>   
                                </div>
                            </ul>
                        <div class="advTip"><img src="/ho/images/advTip.jpg"/></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <script type="text/javascript">
                    if ($(window).width() < 640) {
                        function autoScroll(obj) {
                            $(obj).find("ul").animate({
                                marginTop: "-39px"
                            }, 500, function() {
                                $(this).css({
                                    marginTop: "0px"
                                }).find("li:first").appendTo(this);
                            })
                        }
                        $(function() {
                            setInterval('autoScroll(".demo")', 3000);
                        })
                    }
                </script>
            </div>
            <div class="shopMainbg">
                <div class="shopMain" id="shopmain">

                    <!--今日推荐 -->

                    <div class="am-g am-g-fixed recommendation">
                        <div class="clock am-u-sm-3" ">
                            <img src="/ho/images/2019.png"></img>
                            <p>今日<br>推荐</p>
                        </div>
                        @foreach( $actives_commend as $k=>$v)
                        <div class="am-u-sm-4 am-u-lg-3 ">
                            <div class="info ">
                                <h3>{{$v->active_name}}</h3>
                                <h4>{{ $v->active_desc }}</h4>
                            </div>
                            <div class="recommendationMain one">
                                <a href="/home/active/{{ $v->id }}"><img src="/uploads/{{ $v->active_thumb }}"></img></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="clear "></div>
                    <!--热门活动 -->

                    <div class="am-container activity ">
                        <div class="shopTitle ">
                            <h4>活动</h4>
                            <h3>每期活动 优惠享不停 </h3>
                            <span class="more ">
                              <a href="/home/active ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                      <div class="am-g am-g-fixed ">
                        @foreach( $actives_not_commend as $k=>$v )
                        <div class="am-u-sm-3 ">
                            <div class="icon-sale one "></div>  
                                <h4>{{ $v->active_name }}</h4>                         
                            <div class="activityMain ">
                                <a href="/home/active/{{ $v->id }}">
                                <img style="height: 167px;" src="/uploads/{{ $v->active_thumb }}"></img>
                                </a>
                            </div>
                            <div class="info ">
                                <h3>{{ $v->active_desc }}</h3>
                            </div>                                                      
                        </div>
                        @endforeach

                      </div>
                   </div>
                    <div class="clear "></div>
                    
                    @foreach( $common_cates_data as $k=>$v )
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>{{ $v->cname }}</h4>
                            <h3>{{ $v->desc }}</h3>
                            <div class="today-brands ">
                                @foreach( $v->sub as $kk=>$vv )
                                <a href="/home/goodlist/catetwo/{{ $vv->cid }}">{{ $vv->cname }}</a>
                                @endforeach
                            </div>
                            <span class="more ">
                        <a href="# ">更多<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    <div class="clear "></div>
                    <div class="am-g am-g-fixed floodOne am-container" >
                        <div class="am-u-sm-5 am-u-md-3 am-u-lg-4 text-one " style="width: 400px;height: 100%">
                            <a href="# ">
                                <div class="outer-con ">
                                    <div class="title ">
                                        {{ $v->desc }}
                                    </div>                  
                                </div>
                                <a href="/home/goodlist/catetop/{{ $v->cid }}">
                                  <img style="width: 300px;height: 400px" src="/uploads/{{ $v->thumb }}" /></a>                              
                            </a>
                        </div>
                        
                     <div class="am-g am-g-fixed flood method3 am-container" style="width: 1200px">
                            @foreach( $categoods as $k1 => $v2 )
                            @continue( $v->cid != $v2->sub2 )
                                @foreach($v2->sub1 as $key => $value)
                                <ul class="am-thumbnails " >
                                    <li>
                                        <div class="i-pic check " style="margin-top:5px;margin-right:10px">
                                            <a href="/home/goods/{{ $value->gid }}">
                                               <img class="limit" style="height: 200px" src="/uploads/{{ $value->thumb }}" />
                                                <div class="pro-title " style="overflow: hidden; white-space:nowrap;">{{ $value->gname }}</div>
                                                <span class="e-price ">￥
                                                @if($value->active_id != 0)
                                                <strong>{{ round($value->price * $value->goodactive->discount / 10, 2)}}</strong>
                                                @elseif($value->active_id == 0)
                                                <strong>{{ $value->price }}</strong>
                                                @endif
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                @break($loop->iteration == 8 )
                                @endforeach
                            @break($loop->iteration == 1 )
                            @endforeach

                           

                    </div>
                    <div class="clear "></div>

                    @endforeach
                    
                    
<!--网站底部开始-->
@include('home.public.foot')
<!--网站底部结束-->

        </div>
        </div>
        <!--引导 -->
        <div class="navCir">
            <li class="active"><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
            <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
            <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li> 
            <li><a href="person/index.html"><i class="am-icon-user"></i>我的</a></li>                 
        </div>


        <!--菜单 -->
<!--右侧边栏开始-->
@include('home.public.sidebar')
<!--右侧边栏结束-->
        <script>
            window.jQuery || document.write('<script src="/ho/basic/js/jquery.min.js "><\/script>');
        </script>
        <script type="text/javascript " src="/ho/basic/js/quick_links.js "></script>
    </body>

</html>