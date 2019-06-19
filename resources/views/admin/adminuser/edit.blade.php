@extends('admin.layout.index')


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>管理员修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/adminusers/{{ $adminusers->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">管理员名字</label>
                    <div class="mws-form-item">
                        <input type="text" name="uname" value="{{ $adminusers->uname }}" class="small">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">角色</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            @foreach($roles_data as $k=>$v)
                            <li><input type="radio" name="rid" {{ $v->rname == $role ? 'checked' : '' }} value="{{ $v->id }}"> <label>{{ $v->rname }}</label></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="Submit" class="btn btn-danger">
                <input type="reset" value="Reset" class="btn ">
            </div>
        </form>
    </div>      
</div>
@endsection