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
            <span>活动修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="/admin/actives/{{ $actives->id}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                 {{ method_field('PUT') }}
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">活动名称</label>
                        <div class="mws-form-item">
                            <input type="text" name="active_name" class="small" value="{{ $actives->active_name }}" placeholder="请填写30个字以内">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">活动描述</label>
                        <div class="mws-form-item">
                            <input type="text" name="active_desc" class="small" value="{{ $actives->active_desc }}" placeholder="请填写30个字以内">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">活动折扣</label>
                        <div class="mws-form-item">
                            <input type="number" name="discount" class="small" step="0.1" value="{{ $actives->discount }}">
                        </div>
                    </div>
                    
                     <div class="mws-form-row" style="width: 538px;">
                        <label class="mws-form-label">活动展示图</label>
                           <img src="/uploads/{{ $actives->active_thumb }}" style="width:200px">                           
                           <input type="hidden" name="old_thumb" value="{{ $actives->active_thumb }}">
                           <br><br>
                        <div class="mws-form-item" style="width: 538px;">
                            <input type="file" name="active_thumb" class="small" style="width: 538px;">
                        </div>
                    </div>
                     <div class="mws-form-row" style="width: 538px;">
                        <label class="mws-form-label">活动背景图</label>
                           <img src="/uploads/{{ $actives->background }}" style="width:200px">                           
                           <input type="hidden" name="old_background" value="{{ $actives->background }}">
                           <br><br>
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