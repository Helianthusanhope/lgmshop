<!--网站头部开始-->
@include('home.public.head')
<!---网站头部结束-->
<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->
<!-- 轮播图 开始 -->
@include('home.public.banners')
<!-- 轮播图 结束 -->
<!-- 搜索,导航 开始-->
@include('home.public.search')
<!-- 搜索,导航 结束-->
<!--商品分类开始-->
@include('home.public.cates')
<!--商品分类结束-->     
                        



                    <!--小导航 -->
                    <div class="am-g am-g-fixed smallnav">
                        <div class="am-u-sm-3">
                            <a href="sort.html"><img src="/ho/images/navsmall.jpg" />
                                <div class="title">商品分类</div>
                            </a>
                        </div>
                        <div class="am-u-sm-3">
                            <a href="#"><img src="/ho/images/huismall.jpg" />
                                <div class="title">大聚惠</div>
                            </a>
                        </div>
                        <div class="am-u-sm-3">
                            <a href="#"><img src="/ho/images/mansmall.jpg" />
                                <div class="title">个人中心</div>
                            </a>
                        </div>
                        <div class="am-u-sm-3">
                            <a href="#"><img src="/ho/images/moneysmall.jpg" />
                                <div class="title">投资理财</div>
                            </a>
                        </div>
                    </div>

                    <!--走马灯 -->

                    <div class="marqueen">
                        <span class="marqueen-title">商城头条</span>
                        <div class="demo">
                            <ul>
                                @foreach( $works_data as $k=>$v )                              
                                <li><a target="_blank" href="/home/work/{{ $v->wid }}">{{ $v->wtitle }}</a></li>
                                @endforeach
                                <div class="mod-vip">
                                    <div class="m-baseinfo">
                                        <a href="person/index.html">
                                            <img src="/ho/images/getAvatar.do.jpg">
                                        </a>
                                        <em>
                                            Hi,<span class="s-name">小叮当</span>
                                            <a href="#"><p>点击更多优惠活动</p></a>                                 
                                        </em>
                                    </div>
                                    <div class="member-logout">
                                        <a class="am-btn-warning btn" href="/home/login">登录</a>
                                        <a class="am-btn-warning btn" href="/home/register">注册</a>
                                    </div>
                                    <div class="member-login">
                                        <a href="#"><strong>0</strong>待收货</a>
                                        <a href="#"><strong>0</strong>待发货</a>
                                        <a href="#"><strong>0</strong>待付款</a>
                                        <a href="#"><strong>0</strong>待评价</a>
                                    </div>
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
                            <img src="/ho/images/2016.png "></img>
                            <p>今日<br>推荐</p>
                        </div>
                        <div class="am-u-sm-4 am-u-lg-3 ">
                            <div class="info ">
                                <h3>真的有鱼</h3>
                                <h4>开年福利篇</h4>
                            </div>
                            <div class="recommendationMain one">
                                <a href="introduction.html"><img src="/ho/images/tj.png "></img></a>
                            </div>
                        </div>                      
                        <div class="am-u-sm-4 am-u-lg-3 ">
                            <div class="info ">
                                <h3>囤货过冬</h3>
                                <h4>让爱早回家</h4>
                            </div>
                            <div class="recommendationMain two">
                                <img src="/ho/images/tj1.png "></img>
                            </div>
                        </div>
                        <div class="am-u-sm-4 am-u-lg-3 ">
                            <div class="info ">
                                <h3>浪漫情人节</h3>
                                <h4>甜甜蜜蜜</h4>
                            </div>
                            <div class="recommendationMain three">
                                <img src="/ho/images/tj2.png "></img>
                            </div>
                        </div>

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
                        @foreach( $common_actives_data as $k=>$v )
                        <div class="am-u-sm-3 ">
                            <div class="icon-sale one "></div>  
                                <h4>{{ $v->active_name }}</h4>                         
                            <div class="activityMain ">
                                <a href="/home/active/{{ $v->id }}">
                                <img src="/uploads/{{ $v->active_thumb }}"></img>
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


                    <div id="f1">
                    <!--甜点-->
                    
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>甜品</h4>
                            <h3>每一道甜品都有一个故事</h3>
                            <div class="today-brands ">
                                <a href="# ">桂花糕</a>
                                <a href="# ">奶皮酥</a>
                                <a href="# ">栗子糕 </a>
                                <a href="# ">马卡龙</a>
                                <a href="# ">铜锣烧</a>
                                <a href="# ">豌豆黄</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    
                    <div class="am-g am-g-fixed floodFour">
                        <div class="am-u-sm-5 am-u-md-4 text-one list ">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <div class="outer-con ">
                                    <div class="title ">
                                    开抢啦！
                                    </div>
                                    <div class="sub-title ">
                                        零食大礼包
                                    </div>                                  
                                </div>
                                  <img src="/ho/images/act1.png " />                                
                            </a>
                            <div class="triangle-topright"></div>                       
                        </div>
                        
                            <div class="am-u-sm-7 am-u-md-4 text-two sug">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/2.jpg" /></a>
                            </div>

                            <div class="am-u-sm-7 am-u-md-4 text-two">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/1.jpg" /></a>
                            </div>


                        <div class="am-u-sm-3 am-u-md-2 text-three big">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three sug">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/3.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/4.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                    </div>
                 <div class="clear "></div>  
                 </div>
                 
  
                    <div id="f2">
                    <!--坚果-->
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>坚果</h4>
                            <h3>酥酥脆脆，回味无穷</h3>
                            <div class="today-brands ">
                                <a href="# ">腰果</a>
                                <a href="# ">松子</a>
                                <a href="# ">夏威夷果 </a>
                                <a href="# ">碧根果</a>
                                <a href="# ">开心果</a>
                                <a href="# ">核桃仁</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed floodThree ">
                        <div class="am-u-sm-4 text-four list">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <img src="/ho/images/act1.png " />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                </div>
                            </a>
                            <div class="triangle-topright"></div>   
                        </div>
                        <div class="am-u-sm-4 text-four">
                            <a href="# ">
                                <img src="/ho/images/6.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                              
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-4 text-four sug">
                            <a href="# ">
                                <img src="/ho/images/7.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="am-u-sm-6 am-u-md-3 text-five big ">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>      
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five ">
                            <a href="# ">
                                <img src="/ho/images/8.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five sug">
                            <a href="# ">
                                <img src="/ho/images/9.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-6 am-u-md-3 text-five big">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>          
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                    </div>

                    <div class="clear "></div>
                    </div>

        
                    <div id="f3">
                    <!--甜点-->
                    
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>甜品</h4>
                            <h3>每一道甜品都有一个故事</h3>
                            <div class="today-brands ">
                                <a href="# ">桂花糕</a>
                                <a href="# ">奶皮酥</a>
                                <a href="# ">栗子糕 </a>
                                <a href="# ">马卡龙</a>
                                <a href="# ">铜锣烧</a>
                                <a href="# ">豌豆黄</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    
                    <div class="am-g am-g-fixed floodFour">
                        <div class="am-u-sm-5 am-u-md-4 text-one list ">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <div class="outer-con ">
                                    <div class="title ">
                                    开抢啦！
                                    </div>
                                    <div class="sub-title ">
                                        零食大礼包
                                    </div>                                  
                                </div>
                                  <img src="/ho/images/act1.png " />                                
                            </a>
                            <div class="triangle-topright"></div>                       
                        </div>
                        
                            <div class="am-u-sm-7 am-u-md-4 text-two sug">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/2.jpg" /></a>
                            </div>

                            <div class="am-u-sm-7 am-u-md-4 text-two">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/1.jpg" /></a>
                            </div>


                        <div class="am-u-sm-3 am-u-md-2 text-three big">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three sug">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/3.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/4.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                    </div>
                 <div class="clear "></div>                 
                 </div>
  

                    <div id="f4">
                    <!--坚果-->
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>坚果</h4>
                            <h3>酥酥脆脆，回味无穷</h3>
                            <div class="today-brands ">
                                <a href="# ">腰果</a>
                                <a href="# ">松子</a>
                                <a href="# ">夏威夷果 </a>
                                <a href="# ">碧根果</a>
                                <a href="# ">开心果</a>
                                <a href="# ">核桃仁</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed floodThree ">
                        <div class="am-u-sm-4 text-four list">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <img src="/ho/images/act1.png " />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                </div>
                            </a>
                            <div class="triangle-topright"></div>   
                        </div>
                        <div class="am-u-sm-4 text-four">
                            <a href="# ">
                                <img src="/ho/images/6.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                              
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-4 text-four sug">
                            <a href="# ">
                                <img src="/ho/images/7.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="am-u-sm-6 am-u-md-3 text-five big ">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>      
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five ">
                            <a href="# ">
                                <img src="/ho/images/8.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five sug">
                            <a href="# ">
                                <img src="/ho/images/9.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-6 am-u-md-3 text-five big">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>          
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                    </div>

                    <div class="clear "></div>
                    </div>


                     <div id="f5">
                    <!--甜点-->
                    
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>甜品</h4>
                            <h3>每一道甜品都有一个故事</h3>
                            <div class="today-brands ">
                                <a href="# ">桂花糕</a>
                                <a href="# ">奶皮酥</a>
                                <a href="# ">栗子糕 </a>
                                <a href="# ">马卡龙</a>
                                <a href="# ">铜锣烧</a>
                                <a href="# ">豌豆黄</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    
                    <div class="am-g am-g-fixed floodFour">
                        <div class="am-u-sm-5 am-u-md-4 text-one list ">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <div class="outer-con ">
                                    <div class="title ">
                                    开抢啦！
                                    </div>
                                    <div class="sub-title ">
                                        零食大礼包
                                    </div>                                  
                                </div>
                                  <img src="/ho/images/act1.png " />                                
                            </a>
                            <div class="triangle-topright"></div>                       
                        </div>
                        
                            <div class="am-u-sm-7 am-u-md-4 text-two sug">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/2.jpg" /></a>
                            </div>

                            <div class="am-u-sm-7 am-u-md-4 text-two">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/1.jpg" /></a>
                            </div>


                        <div class="am-u-sm-3 am-u-md-2 text-three big">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three sug">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/3.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/4.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                    </div>
                 <div class="clear "></div>                 
                 </div>
  

                  <div id="f6">
                    <!--坚果-->
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>坚果</h4>
                            <h3>酥酥脆脆，回味无穷</h3>
                            <div class="today-brands ">
                                <a href="# ">腰果</a>
                                <a href="# ">松子</a>
                                <a href="# ">夏威夷果 </a>
                                <a href="# ">碧根果</a>
                                <a href="# ">开心果</a>
                                <a href="# ">核桃仁</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed floodThree ">
                        <div class="am-u-sm-4 text-four list">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <img src="/ho/images/act1.png " />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                </div>
                            </a>
                            <div class="triangle-topright"></div>   
                        </div>
                        <div class="am-u-sm-4 text-four">
                            <a href="# ">
                                <img src="/ho/images/6.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                              
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-4 text-four sug">
                            <a href="# ">
                                <img src="/ho/images/7.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="am-u-sm-6 am-u-md-3 text-five big ">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>      
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five ">
                            <a href="# ">
                                <img src="/ho/images/8.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five sug">
                            <a href="# ">
                                <img src="/ho/images/9.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-6 am-u-md-3 text-five big">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>          
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                    </div>

                    <div class="clear "></div>
                   </div>
   
   
   
                     <div id="f7">
                    <!--甜点-->
                    
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>甜品</h4>
                            <h3>每一道甜品都有一个故事</h3>
                            <div class="today-brands ">
                                <a href="# ">桂花糕</a>
                                <a href="# ">奶皮酥</a>
                                <a href="# ">栗子糕 </a>
                                <a href="# ">马卡龙</a>
                                <a href="# ">铜锣烧</a>
                                <a href="# ">豌豆黄</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    
                    <div class="am-g am-g-fixed floodFour">
                        <div class="am-u-sm-5 am-u-md-4 text-one list ">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <div class="outer-con ">
                                    <div class="title ">
                                    开抢啦！
                                    </div>
                                    <div class="sub-title ">
                                        零食大礼包
                                    </div>                                  
                                </div>
                                  <img src="/ho/images/act1.png " />                                
                            </a>
                            <div class="triangle-topright"></div>                       
                        </div>
                        
                            <div class="am-u-sm-7 am-u-md-4 text-two sug">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/2.jpg" /></a>
                            </div>

                            <div class="am-u-sm-7 am-u-md-4 text-two">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/1.jpg" /></a>
                            </div>


                        <div class="am-u-sm-3 am-u-md-2 text-three big">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three sug">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/3.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/4.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                    </div>
                 <div class="clear "></div>  
                 </div>
                 
                    <div id="f8">
                    <!--坚果-->
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>坚果</h4>
                            <h3>酥酥脆脆，回味无穷</h3>
                            <div class="today-brands ">
                                <a href="# ">腰果</a>
                                <a href="# ">松子</a>
                                <a href="# ">夏威夷果 </a>
                                <a href="# ">碧根果</a>
                                <a href="# ">开心果</a>
                                <a href="# ">核桃仁</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed floodThree ">
                        <div class="am-u-sm-4 text-four list">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <img src="/ho/images/act1.png " />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                </div>
                            </a>
                            <div class="triangle-topright"></div>   
                        </div>
                        <div class="am-u-sm-4 text-four">
                            <a href="# ">
                                <img src="/ho/images/6.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                              
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-4 text-four sug">
                            <a href="# ">
                                <img src="/ho/images/7.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="am-u-sm-6 am-u-md-3 text-five big ">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>      
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five ">
                            <a href="# ">
                                <img src="/ho/images/8.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five sug">
                            <a href="# ">
                                <img src="/ho/images/9.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-6 am-u-md-3 text-five big">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>          
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                    </div>

                    <div class="clear "></div>
                    </div>
  
                    <div id="f9">
                    <!--甜点-->
                    
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>甜品</h4>
                            <h3>每一道甜品都有一个故事</h3>
                            <div class="today-brands ">
                                <a href="# ">桂花糕</a>
                                <a href="# ">奶皮酥</a>
                                <a href="# ">栗子糕 </a>
                                <a href="# ">马卡龙</a>
                                <a href="# ">铜锣烧</a>
                                <a href="# ">豌豆黄</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    
                    <div class="am-g am-g-fixed floodFour">
                        <div class="am-u-sm-5 am-u-md-4 text-one list ">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <div class="outer-con ">
                                    <div class="title ">
                                    开抢啦！
                                    </div>
                                    <div class="sub-title ">
                                        零食大礼包
                                    </div>                                  
                                </div>
                                  <img src="/ho/images/act1.png " />                                
                            </a>
                            <div class="triangle-topright"></div>                       
                        </div>
                        
                            <div class="am-u-sm-7 am-u-md-4 text-two sug">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/2.jpg" /></a>
                            </div>

                            <div class="am-u-sm-7 am-u-md-4 text-two">
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                                <a href="# "><img src="/ho/images/1.jpg" /></a>
                            </div>


                        <div class="am-u-sm-3 am-u-md-2 text-three big">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three sug">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/3.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/4.jpg" /></a>
                        </div>

                        <div class="am-u-sm-3 am-u-md-2 text-three last big ">
                            <div class="outer-con ">
                                <div class="title ">
                                    小优布丁
                                </div>
                                <div class="sub-title ">
                                    ¥4.8
                                </div>
                                <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                            </div>
                            <a href="# "><img src="/ho/images/5.jpg" /></a>
                        </div>

                    </div>
                 <div class="clear "></div>  
                 </div>
                 
  
                    <div id="f10">
                    <!--坚果-->
                    <div class="am-container ">
                        <div class="shopTitle ">
                            <h4>坚果</h4>
                            <h3>酥酥脆脆，回味无穷</h3>
                            <div class="today-brands ">
                                <a href="# ">腰果</a>
                                <a href="# ">松子</a>
                                <a href="# ">夏威夷果 </a>
                                <a href="# ">碧根果</a>
                                <a href="# ">开心果</a>
                                <a href="# ">核桃仁</a>
                            </div>
                            <span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
                        </div>
                    </div>
                    <div class="am-g am-g-fixed floodThree ">
                        <div class="am-u-sm-4 text-four list">
                            <div class="word">
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a> 
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>
                                <a class="outer" href="#"><span class="inner"><b class="text">核桃</b></span></a>                                 
                            </div>
                            <a href="# ">
                                <img src="/ho/images/act1.png " />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                                  
                                </div>
                            </a>
                            <div class="triangle-topright"></div>   
                        </div>
                        <div class="am-u-sm-4 text-four">
                            <a href="# ">
                                <img src="/ho/images/6.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>                              
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-4 text-four sug">
                            <a href="# ">
                                <img src="/ho/images/7.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                        <div class="am-u-sm-6 am-u-md-3 text-five big ">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>      
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five ">
                            <a href="# ">
                                <img src="/ho/images/8.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>  
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>                      
                        <div class="am-u-sm-6 am-u-md-3 text-five sug">
                            <a href="# ">
                                <img src="/ho/images/9.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        <div class="am-u-sm-6 am-u-md-3 text-five big">
                            <a href="# ">
                                <img src="/ho/images/10.jpg" />
                                <div class="outer-con ">
                                    <div class="title ">
                                        雪之恋和风大福
                                    </div>          
                                    <div class="sub-title ">
                                        ¥13.8
                                    </div>
                                    <i class="am-icon-shopping-basket am-icon-md  seprate"></i>
                                </div>
                            </a>
                        </div>
                        
                    </div>

                    <div class="clear "></div>
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