<div class="banner">
                      <!--轮播图开始-->
                        <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
                            <ul class="am-slides">
                                <?php $a = 0; ?>
                                @foreach( $banners_data as $k=>$v )
                                <?php $a++; ?>
                                <li class="banner<?php echo "$a"; ?>"><?php if ($a == 1) { echo "\<a href=\"introduction.html\"\>"; } ?><img style="height: 100%" src="/uploads/{{ $v->url }}" /></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--轮播图结束-->
                        <div class="clear"></div>   
            </div>
