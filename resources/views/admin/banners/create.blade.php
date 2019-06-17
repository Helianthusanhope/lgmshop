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
            <span>轮播图添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/banners" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">轮播图名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="title" class="small" value="{{ old('title') }}" placeholder="请填写30个字以内">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">轮播图描述</label>
                        <div class="mws-form-item">
                            <input type="text" name="desc" class="small" value="{{ old('desc') }}"
                            placeholder="请填写120个字以内">
                        </div>
                    </div>
                    
                    <div class="mws-form-row" style="width: 538px;">
                        <label class="mws-form-label">轮播图</label>
                        <div class="mws-form-item" style="width: 538px;">
                            <input type="file" name="url" class="small" style="width: 538px;">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">轮播图状态</label>                      
                            开启<input type="radio" name="status" class="small" value="1">
                            关闭<input type="radio" name="status" class="small" value="0">
                    </div>

                </div>
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-success">
                    <!-- <input type="reset" value="Reset" class="btn "> -->
                </div>
            </form>
        </div>      
    </div>
@endsection