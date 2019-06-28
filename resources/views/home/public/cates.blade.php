 <!--侧边导航 -->
                        <div id="nav" class="navfull">
                            <div class="area clearfix">
                                <div class="category-content " id="guide_2">
                                    @foreach( $common_cates_data as $k=>$v )
                                    <div class="category">
                                        <ul class="category-list" id="js_climit_li">
                                            <li class="appliance js_toggle relative first">
                                                <div class="category-info">
                                                    <h3 class="category-name b-category-name"><i><img src="/ho/images/cake.png"></i><a class="ml-22" title="点心">{{ $v->cname }}</a></h3>
                                                    <em>&gt;</em></div>
                                                <div class="menu-item menu-in top">
                                                    <div class="area-in">
                                                        <div class="area-bg" style="height:400px; background-color:white;" >
                                                            <div class="menu-srot">
                                                                <div class="sort-side">
                                                                    @foreach( $v->sub as  $kk=>$vv )
                                                                    <dl class="dl-sort">
                                                                        <dt><span title="{{ $vv->cname }}">{{ $vv->cname }}</span></dt>
                                                                        @foreach( $vv->sub as $kkk=>$vvv )
                                                                            <dd><a title="{{$vvv->cname}}" href="/home/goodlist/{{ $vvv->cid }}"><span>{{$vvv->cname}}</span></a></dd>
                                                                        @endforeach
                                                                    </dl>
                                                                    @endforeach

                                                                </div>                                                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>           
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        <script type="text/javascript">
                            (function() {
                                $('.am-slider').flexslider();
                            });
                            $(document).ready(function() {
                                $("li").hover(function() {
                                    $(".category-content .category-list li.first .menu-in").css("display", "none");
                                    $(".category-content .category-list li.first").removeClass("hover");
                                    $(this).addClass("hover");
                                    $(this).children("div.menu-in").css("display", "block")
                                }, function() {
                                    $(this).removeClass("hover")
                                    $(this).children("div.menu-in").css("display", "none")
                                });
                            })
                        </script>