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
            <span>活动添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/actives" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">活动名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="active_name" class="small" value="{{ old('active_name') }}" placeholder="请填写30个字以内">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">活动描述</label>
                        <div class="mws-form-item">
                            <input type="text" name="active_desc" class="small" value="{{ old('active_desc') }}" placeholder="请填写30个字以内">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">活动折扣</label>
                        <div class="mws-form-item">
                            <input type="number" name="discount" class="small"   value="{{ old('discount')}}">
                        </div>
                    </div>
                    
                    <div class="mws-form-row" style="width: 538px;">
                        <label class="mws-form-label">活动展示图</label>
                        <div class="mws-form-item" style="width: 538px;">
                            <input type="file" name="active_thumb" class="small" style="width: 538px;">
                        </div>
                    </div>
                    <div class="mws-form-row" style="width: 538px;">
                        <label class="mws-form-label">活动背景图</label>
                        <div class="mws-form-item" style="width: 538px;">
                            <input type="file" name="background" class="small" style="width: 538px;">
                        </div>
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