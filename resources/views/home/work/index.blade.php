    <!--网站头部开始-->
@include('home.public.head')
<!---网站头部结束-->
<!-- 商品详情页面css 开始 -->
<link href="/ho/css/personal.css" rel="stylesheet" type="text/css">
<!-- 商品详情页面css 结束 -->
<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->
<!-- 搜索,导航 开始-->
@include('home.public.search')
<!-- 搜索,导航 结束-->     
<!--文章 -->
<div class="am-g am-g-fixed blog-g-fixed bloglist">
      <div class="am-u-md-9">
        <article class="blog-main">
                <h3 class="am-article-title blog-title">
                    <a href="#">{{ $work_data->wtitle }}</a>
                </h3>
                <h4>
                    <span class="am-article-meta blog-meta">&nbsp;&nbsp;{{ $work_data->writer }}</span>
                    <span class="am-article-meta blog-meta" style="float: right;">{{$work_data->created_at}}</span>
                </h4>
                <div class="am-g blog-content">
                    <div class="am-u-sm-12">
                      {!!$work_data->wcontent!!}
                    </div>
                </div>

        </article>


        <hr class="am-article-divider blog-hr">
        <ul class="am-pagination blog-pagination">
          @if( $prev_work )
          <li class="am-pagination-prev"><a href="/home/work/{{ ($prev_work->wid) }}">&laquo;<span>上一页:{{ $prev_work->wtitle }}</span> </a></li>
          @endif
          @if( $next_work )
          <li class="am-pagination-next"><a href="/home/work/{{ ($next_work->wid) }}"><span>下一页:{{ $next_work->wtitle }}</span>&raquo;</a></li>
          @endif
        </ul>
      </div>

        <div class="am-u-md-3 blog-sidebar">
            <div class="am-panel-group">

              <section class="am-panel am-panel-default">
                <div class="am-panel-hd">热门话题</div>
                <ul class="am-list blog-list">

                    @foreach( $works_data as $k=>$v )                              
                    <li><a target="_blank" href="/home/work/{{ $v->wid }}"><p>{{ $v->wtitle }}</p></a></li>
                    @endforeach      
                </ul>
              </section>

            </div>
        </div>

</div>

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
