<!--网站头部开始-->
@include('home.public.head')
<!---网站头部结束-->
<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->
<div class="banner">
  <!--轮播图开始-->
    <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
        <ul class="am-slides" >
            @foreach( $active_goods_data as $k=>$v)
            <li style="width: 100%" class="banner2"><a href="/home/goods/{{ $v->gid }}"><img style="width:63%;" src="/uploads/{{ $v->thumb }}" />
            </a>
            <div  class="am-slider-desc text-center">{{ $v->gname }}</div>
            </li>
            @break($loop->iteration == 4)
            @endforeach
        </ul>
    </div>
    <!--轮播图结束-->
    <div class="clear"></div>   
</div>

<!-- 搜索, 开始-->
@include('home.public.search')
<!-- 搜索,导航 结束-->
<!-- 导航 开始-->
@include('home.public.nav')
<!-- 导航 结束-->
<!--商品分类开始-->
@include('home.public.cates')



<!--网站底部开始-->
@include('home.public.foot')
<!--网站底部结束-->

        </div>
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