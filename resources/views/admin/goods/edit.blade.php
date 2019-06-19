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
            <span>用户添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/goods/{{ $good->gid }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品名</label>
                        <div class="mws-form-item">
                            <input type="text" name="gname" class="small" value="{{ $good->gname }}" placeholder="商品名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">售价</label>
                        <div class="mws-form-item">
                            <input type="text" name="price" class="small" value="{{ $good->price }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">简介</label>
                        <div class="mws-form-item">
                            <input type="text" name="desc" class="small" value="{{ $good->desc }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">所属分类</label>
                        <div class="mws-form-item">
                            <select class="large" name="cid" style="width: 200px;">
                                @foreach($cates as $k=>$v)
                                <option value="{{ $v->cid }}" {{substr_count($v->path,',') < 2 ? 'disabled':''}}  {!! $good->cid == $v->cid  ? 'selected' : '' !!}><font style="vertical-align: inherit;"><font style="vertical-align-align: inherit;">{{ $v->cname }}</font></font></option>
                                @endforeach
                              </select> 
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 450px;">
                        <label class="mws-form-label">缩略图</label>
                        <div class="mws-form-item" style="width: 450px;">
                            <img src="/uploads/{{ $good->thumb }}" style="width: 50px;">
                            <input type="file" name="thumb" class="small" style="width: 440px;">
                            <input type="hidden" name="old_thumb" value="{{ $good->thumb }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品详情</label>
                        <br>
                        <br>
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="detail" type="text/plain">
                            {!! htmlspecialchars_decode($good->detail) !!}}
                        </script>
                        <!-- 配置文件 -->
                        <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
                        <!-- 编辑器源码文件 -->
                        <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
                        <!-- 实例化编辑器 -->
                        <script type="text/javascript">
                            var ue = UE.getEditor('container',{toolbars: [    
                                ['fullscreen', 'source', 'insertimage', 'undo', 'emotion', 'redo', 'bold']
                            ]});
                        </script>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="修改" class="btn btn-danger">
                </div>
            </form>
        </div>      
    </div>
    <script type="text/javascript">
        var 
    </script>
@endsection