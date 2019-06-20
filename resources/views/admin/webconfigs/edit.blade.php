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
        	<form class="mws-form" action="/admin/webconfigs/{{ $webconfig->id }}" method="post" enctype="multipart/form-data" onsubmit="return checkForm()">
        		{{ csrf_field() }}
                {{ method_field('PUT') }}
        		<div class="mws-form-inline">
        			<div class="mws-form-row">
        				<label class="mws-form-label">网站名称 <span class="required">*</span></label>
        				<div class="mws-form-item">
        					<input type="text" name="name" class="small" id="name" value="{{ $webconfig->name }}" placeholder="网站名称" onblur="checkName()">
        				</div>
                        <span id="nameErr"></span> 
        			</div>
					<div class="mws-form-row">
                        <label class="mws-form-label">网站描述 <span class="required">*</span></label></label>
                        <div class="mws-form-item">
                            <input type="text" name="describe" class="small" name="describe" id="describe" value="{{ $webconfig->describe }}" onblur="checkDescribe()">
                        </div>
                        <span id="describeErr"></span>
                    </div>
                    <div class="mws-form-row" style="width: 58.5%;">
                        <img src="/uploads/{{ $webconfig->logo }}" style="width: 50px;">
                        
                        <input type="hidden" name="old_logo" value="{{ $webconfig->logo }}">
                        <label class="mws-form-label">网站logo <span class="required">*</span></label></label>
                        <div class="mws-form-item">
                            <input type="file" name="logo" class="small">
                        </div>
                    </div>
        			<div class="mws-form-row">
                        <label class="mws-form-label">备案号 <span class="required">*</span></label></label>
                        <div class="mws-form-item">
                           <input type="text" name="filing" class="small" name="filing" id="filing" value="{{ $webconfig->filing }}" onblur="checkFiling()">
                        </div>
                        <span id="filingErr"></span>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">联系方式 <span class="required">*</span></label></label>
                        <div class="mws-form-item">
                           <input type="text" name="telephone" class="small" name="telephone" id="telephone" value="{{ $webconfig->telephone }}" onblur="checkPhone()">
                        </div>
                        <span id="phoneErr"></span> 
                    </div>

        		</div>
        		<div class="mws-button-row">
        			<input type="submit" value="修改" class="btn btn-danger">
        			<input type="reset" value="重置" class="btn ">
        		</div>
        	</form>
        </div>    	
    </div>
    <script type="text/javascript">
        // 验证网站名称
        function checkName(){ 
            var name = document.getElementById('name'); 
            var errname = document.getElementById('nameErr'); 
            if(name.value.length == 0){ 
                errname.innerHTML="网站名不能为空"
                errname.style.color = 'red';
                return false; 
            } else { 
                errname.innerHTML="OK"
                errname.style.color = 'green';
                return true; 
            } 
        }
        // 验证网站名称
        function checkDescribe(){ 
            var describe = document.getElementById('describe'); 
            var describeErr = document.getElementById('describeErr'); 
            if(describe.value.length == 0){ 
                describeErr.innerHTML="网站名不能为空"
                describeErr.style.color = 'red';
                return false; 
            } else { 
                describeErr.innerHTML="OK"
                describeErr.style.color = 'green';
                return true; 
            } 
        }
        // 验证备案号
        function checkFiling(){ 
            var filing = document.getElementById('filing'); 
            var filingErr = document.getElementById('filingErr'); 
            if(filing.value.length == 0){ 
                filingErr.innerHTML="备案号不能为空"
                filingErr.style.color = 'red';
                return false; 
            } else { 
                filingErr.innerHTML="OK"
                filingErr.style.color = 'green';
                return true; 
            } 
        }
        function checkPhone(){ 
            var telephone = document.getElementById('telephone'); 
            var phonrErr = document.getElementById('phoneErr'); 
            var pattern = /^1[34578]\d{9}$/; //验证手机号正则表达式 
            if(telephone.value.length == 0){ 
                phonrErr.innerHTML="联系方式不能为空"
                phonrErr.style.color = 'red';
                return false; 
            } 
            if(!pattern.test(telephone.value)){ 
                phonrErr.innerHTML="联系方式不合规范"
                phonrErr.style.color = 'red';
                return false; 
            } else { 
                phonrErr.innerHTML="OK"
                phonrErr.style.color = 'green';
                return true; 
             } 
        }
        function checkForm(){
            if (!window.confirm('确定要修改吗？'))  { 
                return false; 
            }
            return checkFiling() && checkName() && checkPhone() && checkDescribe();

        }
    </script>
@endsection