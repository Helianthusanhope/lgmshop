
                    <div class="footer ">
                        <div class="b_btm">
                            <table style="width:20%; height:62px; float:left; margin-left:55px; margin-top:30px;" cellspacing="0" cellpadding="0" border="0">
                              <tbody><tr>
                                <td width="72"><img src="/home/images /b1.png" width="62" height="62"></td>
                                <td><h2>正品保障</h2>正品行货  放心购买</td>
                              </tr>
                            </tbody></table>
                            <table style="width:20%; height:62px; float:left; margin-left:55px; margin-top:30px;" cellspacing="0" cellpadding="0" border="0">
                              <tbody><tr>
                                <td width="72"><img src="/home/images /b2.png" width="62" height="62"></td>
                                <td><h2>满38包邮</h2>满38包邮 免运费</td>
                              </tr>
                            </tbody></table>
                            <table style="width:20%; height:62px; float:left; margin-left:55px; margin-top:30px;" cellspacing="0" cellpadding="0" border="0">
                              <tbody><tr>
                                <td width="72"><img src="/home/images /b3.png" width="62" height="62"></td>
                                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
                              </tr>
                            </tbody></table>
                            <table style="width:20%; height:62px; float:left; margin-left:55px; margin-top:30px;" cellspacing="0" cellpadding="0" border="0">
                              <tbody><tr>
                                <td width="72"><img src="/home/images /b4.png" width="62" height="62"></td>
                                <td><h2>准时送达</h2>收货时间由你做主</td>
                              </tr>
                            </tbody></table>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="footer-hd " style="margin-top:30px;" cellspacing="0" cellpadding="0" border="0">
                            <p>
                                <span>友情链接</span>
                                @foreach($common_friends_data as $k=>$v )
                                <b>|</b>
                                <a href="{{ $v->url}}">{{ $v->friend_name }}</a>
                                @endforeach
                            </p>
                        </div>
                        <div class="b_btm" style="margin-top:30px;" cellspacing="0" cellpadding="0" border="0">
                            <table style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    @foreach( $commoon_Webconfigs_data as $k=>$v )
                                    <image src="/uploads/{{ $v->logo }}" style="width:32px;height:25px;border-radius: 5px;"><b>|</b>
                                    <span>{{ $v->name }}</span><b>|</b>
                                    <span>{{ $v->describe }}</span><b>|</b>
                                    <span>{{ $v->filing }}</span>
                                    @endforeach
                                </tr>
                            </table>
                                
                            </p>
                        </div>
                    </div>
