<div class="banner">
                      <!--轮播图开始-->
                        <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
                            <ul class="am-slides">
                                @foreach( $banners_data as $k=>$v )
                                <li style="background-color:#D2364C;"  class="banner1"><a href="introduction.html"><img style="width:63%;" src="/uploads/{{ $v->url }}" /></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--轮播图结束-->
                        <div class="clear"></div>   
            </div>
