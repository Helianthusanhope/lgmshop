<!--网站头部开始-->
@include('home.public.head')
<!---网站头部结束-->
<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->
<div class="banner" style="display: block;">
  <!--热门商品 开始-->
    <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
        <ul class="am-slides" >
            <?php $a = 0; ?>
            @foreach( $active_goods_data as $k=>$v)
            <?php $a++; ?>
            <li style="width: 100%" class="banner<?php echo "$a"; ?>"><a href="/home/goods/{{ $v->gid }}"><img style="width:auto;height: 100%" src="/uploads/{{ $v->thumb }}" />
            </a>
            <div  class="am-slider-desc text-center" style="font-size: 40px" >{{ $v->gname }}</div>
            </li>
            @break($loop->iteration == 4)
            @endforeach
        </ul>
    </div>
    <!--热门商品 结束-->
    <div style="clear: all"></div>   
</div>
   

<!-- 搜索, 开始-->
@include('home.public.search')
<!-- 搜索,导航 结束-->
<!-- 导航 开始-->
@include('home.public.nav')
<!-- 导航 结束-->
<!--商品分类开始-->
@include('home.public.cates')
        </div>
        </div>
        <!--菜单 -->
<div class="shopMainbg">
    <div class="shopTitle" style="line-height: 40px;text-align:center; background-color:#d2364c;";  ">
        <h1 style="font-size: 40px;color:#fcff00;" >{{ $active_name->active_name }}</h1>
        <span class="more ">
          <a href="#" style="font-size: 20px;margin-right: 20px">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;"></i></a>
    </span>
    </div>
    <div style="display: block;" class="am-container">
        <!-- <ul class="am-g am-g-fixed recommendation"> -->
        <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
            @foreach($active_goods_data as $key => $value)
                <li>
                    <div class="i-pic check " style="margin-top:5px;margin-right:10px">
                        <a href="/home/goods/{{ $value->gid }}">
                           <img class="limit" style="height: 200px" src="/uploads/{{ $value->thumb }}" />
                            <div class="pro-title " >{{ $value->gname }}</div>
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
            @endforeach
        </ul>
    </div>
</div>
<!--网站底部开始-->
@include('home.public.foot')
<!--网站底部结束-->
<!--右侧边栏开始-->
@include('home.public.sidebar')
<!--右侧边栏结束-->
        <script>
            window.jQuery || document.write('<script src="/ho/basic/js/jquery.min.js "><\/script>');
        </script>
        <script type="text/javascript " src="/ho/basic/js/quick_links.js "></script>
    </body>

</html>