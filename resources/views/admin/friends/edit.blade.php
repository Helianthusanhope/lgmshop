@extends('admin.layout.index')


@section('content')

    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>友情链接修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/friends/{{$friends->id}}" method="post" enctype="multipart/form-data" onsubmit="return checkForm()">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接名称 <span class="required">*</span></label>
                        <div class="mws-form-item">
                            <input type="text" name="friend_name" class="small" id="friend_name" value="{{ $friends->friend_name }}" placeholder="友情链接名称" onblur="checkfriend_name()">
                        </div>
                        <span id="friend_nameErr"></span> 
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接地址 <span class="required">*</span></label></label>
                        <div class="mws-form-item">
                            <input type="text" name="url" class="small"  id="url" value="{{ $friends->url }}" placeholder="友情链接地址" onblur="checkUrl()">
                        </div>
                        <span id="urlErr"></span>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>
            </form>
        </div>      
    </div>
    <script type="text/javascript">
        // 验证友情链接名称
        function checkfriend_name(){ 
            var friend_name = document.getElementById('friend_name'); 
            var friend_nameErr = document.getElementById('friend_nameErr'); 
            if(friend_name.value.length == 0){ 
                friend_nameErr.innerHTML="友情链接名不能为空"
                friend_nameErr.style.color = 'red';
                return false; 
            } else { 
                friend_nameErr.innerHTML="OK"
                friend_nameErr.style.color = 'green';
                return true; 
            } 
        }
        // 验证友情链接名称
        function checkUrl(){ 
            var url = document.getElementById('url'); 
            var urlErr = document.getElementById('urlErr'); 
            if(url.value.length == 0){ 
                urlErr.innerHTML="友情链接地址不能为空"
                urlErr.style.color = 'red';
                return false; 
            } else { 
                urlErr.innerHTML="OK"
                urlErr.style.color = 'green';
                return true; 
            } 
        }
        function checkForm(){
            return checkfriend_name() && checkurl();
        }
    </script>
@endsection