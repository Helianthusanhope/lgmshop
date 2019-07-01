@extends('admin.layout.index')


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>角色的权限修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/roles/{{ $role_data->id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">角色的名字</label>
                    <div class="mws-form-item">
                        <input type="text" name="rname" value="{{ $role_data->rname }}" class="small">
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