@extends('admin.layout.index')


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>权限修改</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/nodes/{{ $node_data->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">权限名称</label>
    				<div class="mws-form-item">
    					<input type="text" name="desc" value="{{$node_data->desc}}" class="small">
    				</div>
    			</div>
    		     <div class="mws-form-row">
                    <label class="mws-form-label">控制器名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="cname" value="{{$node_data->cname}}" class="small">
                    </div>
                </div> 
    			<div class="mws-form-row">
                    <label class="mws-form-label">方法名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="aname" value="{{$node_data->aname}}" class="small">
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