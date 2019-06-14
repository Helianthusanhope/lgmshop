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
        	<span>分类添加</span>
        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/cates" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">分类名</label>
        				<div class="mws-form-item">
        					<input type="text" name="uname" class="small" value="{{ old('uname') }}">
        				</div>
        			</div>

        			<div class="mws-form-row">
                        <label class="mws-form-label">所属分类</label>
                        <div class="mws-form-item">
                            <select name="pid" class="small">
                                <option value="0">--请选择--</option>
                            </select>
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