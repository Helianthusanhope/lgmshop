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
        	<span>分区修改</span>

        </div>
        <div class="mws-panel-body no-padding">
        	<form class="mws-form" action="/admin/cates/{{ $cate->cid }}" method="post" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		{{ method_field('PUT') }}
        		<div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">分区名</label>
                        <div class="mws-form-item">
                            <input type="text" name="cname" class="small" value="{{ $cate->cname  }}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">分区描述</label>
                        <div class="mws-form-item">
                            <input type="text" name="desc" class="small" value="{{ $cate->desc }}">
                        </div>
                    </div>
                    <input type="hidden" name="old_thumb" value="{{ $cate->thumb }}">
                    <div class="mws-form-row" style="width: 450px;">
                        <label class="mws-form-label">分区广告图</label>
                        <img src="/uploads/{{ $cate->thumb }}">
                        <div class="mws-form-item" style="width: 450px;">
                            <input type="file" name="thumb" class="small" style="width: 440px;">
                        </div>
                    </div>
                    @if( $cate->pid )
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所属分区</font></font></label>
                        <div class="mws-form-item">
                            <select class="small" name="pid">
                                <option value="0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">--请选择--</font></font></option>
                                @foreach($common_cates_data as $k=>$v)
                                <option value="{{ $v->cid }}" {{substr_count($v->path,',') >= 2 ? 'disabled':''}} {{$v->cid == $cid ? 'selected' : ''}} ><font style="vertical-align: inherit;"><font style="vertical-align-align: inherit;">{{ $v->cname }}</font></font></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif
	

        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="Submit" class="btn btn-danger">
        			<input type="reset" value="Reset" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
@endsection