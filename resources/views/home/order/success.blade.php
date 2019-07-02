<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>付款成功</title>
<link rel="stylesheet"  type="text/css" href="/ho/AmazeUI-2.4.2/assets/css/amazeui.css"/>
<link href="/ho/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/ho/basic/css/demo.css" rel="stylesheet" type="text/css" />

<link href="/ho/css/sustyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/ho/basic/js/jquery-1.7.min.js"></script>

</head>


<!-- header 开始 -->
@include('home.public.header')
<!-- header 结束 -->

<!--悬浮搜索框-->

@include('home.public.search')



<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>{{ $price_all }}</em></li>
       <div class="user-info">
         <p>收货人：{{ $useraddr->addrname }}</p>
         <p>联系电话：{{ $useraddr->phone }}</p>
         <p>收货地址：{{ $useraddr->address }}</p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="/home/personal/order" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="/home/personal/orderinfo/{{ $oid }}" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>


@include('home.public.foot')


</body>
</html>
