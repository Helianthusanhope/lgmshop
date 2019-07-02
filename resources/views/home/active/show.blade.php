    <!--网站头部开始-->
@include('home.public.head')
<!---网站头部结束-->
<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->
<!-- 搜索,导航 开始-->
@include('home.public.search')
<!-- 搜索,导航 结束-->     
<!--文章 --><div class="am-container activity ">
                        <div class="shopTitle ">
                            <h4>活动</h4>
                            <h3>每期活动 优惠享不停 </h3>
                            <span class="more ">

                              <a href="javascript:history.go(-1)" target=_self>返回<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                      <div class="am-g am-g-fixed ">
                        @foreach( $common_actives_data as $k=>$v )
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
