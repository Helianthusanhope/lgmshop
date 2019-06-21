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
            <span>文章修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/works/{{ $Work->wid }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="wtitle" class="small" value="{{ $Work->wtitle }}" placeholder="请填写30个字以内">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章描述</label>
                        <div class="mws-form-item">
                            <input type="text" name="wdesc" class="small" value="{{ $Work->wdesc }}"
                            placeholder="请填写120个字以内">
                        </div>
                    </div>
                    
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章内容</label>
                        <br>
                        <br>
                        <!-- 加载编辑器的容器 -->
                        <script id="container" name="wcontent" type="text/plain">
                            {!! $Work->wcontent !!}
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
                    <div class="mws-form-row">
                        <label class="mws-form-label">文章状态</label>                      
                            开启<input type="radio" name="status" class="small" {{ $Work->status ? 'checked' : ''}}  value="1">
                            关闭<input type="radio" name="status" class="small" {{ $Work->status ? '' : 'checked'}} value="0">
                    </div>


                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                    <input type="reset" value="Reset" class="btn ">
                </div>
            </form>
        </div>      
    </div>
@endsection