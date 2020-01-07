@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.Customers') }} <small>{{ $data['customers'][0]->customers_firstname}} {{ $data['customers'][0]->customers_lastname }}</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/customers')}}"><i class="fa fa-users"></i> {{ trans('labels.ListingAllCustomers') }}</a></li>
      <li class="active">{{ trans('labels.EditCustomers') }}</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.EditCustomers') }} </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-12">
              		<div class="box box-info">
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <br>                       
                       	@if(count($data['message'])>0)						
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						 {{ $data['message'] }}
						</div>						
						@endif
                        
                       @if(count($data['errorMessage'])>0)						
						<div class="alert alert-danger" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						 {{ $data['errorMessage'] }}
						</div>						
						@endif
                        
                        <!-- form start -->                        
                         <div class="box-body">
                         
                            {!! Form::open(array('url' =>'admin/updatecustomers', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                            	{!! Form::hidden('customers_id',  $data['customers'][0]->customers_id, array('class'=>'form-control', 'id'=>'customers_id')) !!}
                              
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('customers_firstname',  $data['customers'][0]->customers_firstname, array('class'=>'form-control field-validate', 'id'=>'customers_firstname')) !!}
                                     <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FirstNameText') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('customers_lastname',  $data['customers'][0]->customers_lastname, array('class'=>'form-control field-validate', 'id'=>'customers_lastname')) !!}
                                   <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.lastNameText') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Position') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('customers_position',  $data['customers'][0]->customers_position, array('class'=>'form-control field-validate', 'id'=>'customers_position')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.PositionText') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                                </div> 
                                <div class="form-group">
                               	 <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Gender') }}</label>
                                   <div class="col-sm-10 col-md-4">
                                        <label>
                                          <input @if($data['customers'][0]->customers_gender == 1 or empty($data['customers'][0]->customers_gender)) checked @endif type="radio" name="customers_gender" value="1" class="minimal" checked > {{ trans('labels.Male') }}  
                                        </label><br>
    
                                        <label>
                                          <input @if( !empty($data['customers'][0]->customers_gender) and $data['customers'][0]->customers_gender == 0) checked  @endif type="radio" name="customers_gender" value="0" class="minimal"> {{ trans('labels.Female') }}
                                        </label>
                                   </div>
                                </div>                            
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Picture') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::file('newImage', array('id'=>'newImage')) !!}
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.PictureText') }}</span>
                                  <br>
                                    {!! Form::hidden('oldImage', $data['customers'][0]->customers_picture, array('id'=>'oldImage')) !!}
                                    @if(!empty($data['customers'][0]->customers_picture))
                                    	<img width="150px" src="{{asset('').$data['customers'][0]->customers_picture}}" class="img-circle">
                                    @else
                                   	 <img width="150px" src="{{asset('').'/resources/assets/images/default_images/user.png' }}" class="img-circle">
                                    @endif
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DOB') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('customers_dob',  $data['customers'][0]->customers_dob, array('class'=>'form-control datepicker' , 'id'=>'customers_dob')) !!}
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.DOBText') }}</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Telephone') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('customers_telephone',  $data['customers'][0]->customers_telephone, array('class'=>'form-control', 'id'=>'customers_telephone')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.TelephoneText') }}</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Fax') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('customers_fax',  $data['customers'][0]->customers_fax, array('class'=>'form-control', 'id'=>'customers_fax')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FaxText') }}</span>
                                  </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Category') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    @if(!empty(session('categories_id')))
                                        @php
                                        $cat_array = explode(',', session('categories_id'));                                        
                                        @endphp
                                        <ul class="list-group list-group-root well">    
                                          @foreach ($data['categories'] as $categories)   
                                          @if(in_array($categories->id,$cat_array))                                 
                                          <li href="#" class="list-group-item"><label style="width:100%"><input 
                                          @if(in_array($categories->id,$data['mainCategories']))
                                          	checked
                                          @endif id="categories_<?=$categories->id?>" type="checkbox" class=" required_one categories" name="categories[]" value="{{ $categories->id }}" > {{ $categories->name }}</label></li>
                                          @endif
                                              @if(!empty($categories->sub_categories))
                                              <ul class="list-group">
                                                    	<li class="list-group-item" >
                                                    @foreach ($categories->sub_categories as $sub_category)
                                                    @if(in_array($sub_category->sub_id,$cat_array))  
                                                    <label><input
                                                    @if(in_array($sub_category->sub_id,$data['subCategories']))
                                                        checked
                                                    @endif
                                                     type="checkbox" name="categories[]" class="required_one sub_categories sub_categories_<?=$categories->id?>" parents_id = '<?=$categories->id?>' value="{{ $sub_category->sub_id }}"> {{ $sub_category->sub_name }}</label> @endif @endforeach</li>
                                                    
                                              </ul>
                                              @endif
                                          @endforeach                                          
                                        </ul>                                           
                                    @else
                                        <ul class="list-group list-group-root well">    
                                          @foreach($data['categories'] as $categories)
                                          <li href="#" class="list-group-item">
                                            <label style="width:100%">
                                              <input 
                                              @if(in_array($categories->id,$data['mainCategories']))
                                                checked
                                              @endif
                                                id="categories_<?=$categories->id?>" type="checkbox" class=" required_one categories" name="categories[]" value="{{ $categories->id }}" > {{ $categories->name }}
                                            </label>
                                          </li>
                                          @if(!empty($categories->sub_categories))
                                          <ul class="list-group">
                                                  <li class="list-group-item" >
                                                @foreach ($categories->sub_categories as $sub_category)<label><input 
                                                    @if(in_array($sub_category->sub_id,$data['subCategories']))
                                                      checked
                                                    @endif
                                                      type="checkbox" name="categories[]" class="required_one sub_categories sub_categories_<?=$categories->id?>" parents_id = '<?=$categories->id?>' value="{{ $sub_category->sub_id }}"> {{ $sub_category->sub_name }}</label>
                                                @endforeach
                                              </li>
                                          </ul>
                                          @endif
                                          @endforeach
                                        </ul>    
                                    @endif
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.ChooseCatgoryText') }}.</span>
                                      <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                                </div>

                                <hr>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Website') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('website',  $data['customers'][0]->website, array('class'=>'form-control field-validate', 'id'=>'website')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.WebsiteText') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CompanyPhone') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('company_phone',  $data['customers'][0]->company_phone, array('class'=>'form-control field-validate', 'id'=>'company_phone', 'onkeypress'=>'return isNumberKey(event)')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CompanyPhoneText') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CellPhone') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('customers_cellphone', $data['customers'][0]->customers_cellphone, array('class'=>'form-control field-validate', 'id'=>'customers_cellphone', 'onkeypress'=>'return isNumberKey(event)')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CellPhoneText') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                                </div> 
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Industry') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                    <select class="form-control" name="industry_type" id="industryTypeSelect" value="{{$data['customers'][0]->industry_type}}">
                                    </select>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                    {{ trans('labels.IndustryText') }}</span>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.MachineModel') }} </label>
                                  <div id="machine-section" class="col-sm-10 col-md-4">
                                    <div class="col-sm-12" style="padding: 0; margin-bottom: 25px;">
                                      {!! Form::text('machineModel[]',  $data['customers'][0]->machine_model, array('class'=>'form-control field-validate', 'id'=>'machineModel0', 'style'=>'display: inline; width: calc(100% - 35px);')) !!}
                                      <button type="button" id="btn-addMachine" class="btn btn-dark" style="position: absolute; width: 35px; margin-top: 1px;">+</button>
                                    </div>
                                  </div>
                                  <!-- <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.MachineModelText') }}</span>
                                  <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span> -->
                                </div> 

                                <hr>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EmailAddress') }} </label>
                                  <div class="col-sm-10 col-md-4">
                                   {!! Form::hidden('old_email_address',  $data['customers'][0]->email, array('class'=>'form-control', 'id'=>'old_email_address')) !!}
                                    {!! Form::email('email',  $data['customers'][0]->email, array('class'=>'form-control email-validate', 'id'=>'email')) !!}
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"> {{ trans('labels.EmailText') }}</span>
                                 
                                    <span class="help-block hidden"> {{ trans('labels.EmailError') }}</span>
                                  </div>
                                </div>
                                                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.changePassword') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::checkbox('changePassword', 'yes', null, ['class' => '', 'id'=>'change-passowrd']) !!}
                                  </div>
                                </div>
                                
                               <!-- <div class="form-group password_content">-->
                               <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Password') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::password('password', array('class'=>'form-control ', 'id'=>'password')) !!}
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                   {{ trans('labels.PasswordText') }}</span>
                                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                  </div>
                               </div>
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}
                                   </label>
                                  <div class="col-sm-10 col-md-4">
                                    <select class="form-control" name="isActive">
                                          <option
                                              @if($data['customers'][0]->isActive == 1)
                                                selected
                                              @endif
                                           value="1">{{ trans('labels.Active') }}</option>
                                          <option 
                                           @if($data['customers'][0]->isActive == 0)
                                                selected
                                              @endif
                                           value="0">{{ trans('labels.Inactive') }}</option>
									</select><span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.StatusText') }}</span>
                                 
                                  </div>
                                </div>
                                
                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.Update') }} </button>
                                <a href="{{ URL::to('admin/customers')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                              </div>
                              <!-- /.box-footer -->
                            {!! Form::close() !!}
                        </div>
                  </div>
              </div>
            </div>
            
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    
    <!-- Main row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<script src="{!! asset('resources/views/admin/plugins/jQuery/jquery.min.js') !!}"></script>
<script type="text/javascript">

	var $curMachineId = 1;

	function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
	}

	function addMachineModelField() {
		var $machineSection = $('#machine-section');
		$machineSection.append('<div id="machine' + $curMachineId + '" class="col-sm-12" style="padding: 0;  margin-bottom: 25px;">' +
				'<input type="text" name="machineModel[]" id="machineModel' + $curMachineId + '" class="form-control field-validate" style="display: inline; width: calc(100% - 35px);" value="{{ old('machineModel') }}">' +
				'<button type="button" id="btn-removeMachine" class="btn btn-dark" style="position: absolute; width: 35px; margin-top: 1px;">-</button>' +
			'</div>');
		$machineSection.change();
		$curMachineId ++;

		$("button").click(function() {
			var id = $(this).attr("id");
      $(this).remove();
			if (id == "btn-removeMachine") {
				var parentId = $(this).parent().attr("id");
				$('#' + parentId).remove();
        $curMachineId --;
			}
		});
	}

  function addMachineModelFieldList(model_list) {
    for(i = 0; i < model_list.length; i ++) {
      var $machineSection = $('#machine-section');
      $machineSection.append('<div id="machine' + $curMachineId + '" class="col-sm-12" style="padding: 0;  margin-bottom: 25px;">' +
          '<input type="text" name="machineModel[]" id="machineModel' + $curMachineId + '" class="form-control field-validate" style="display: inline; width: calc(100% - 35px);" value="' + model_list[i] + '">' +
          '<button type="button" id="btn-removeMachine" class="btn btn-dark" style="position: absolute; width: 35px; margin-top: 1px;">-</button>' +
        '</div>');
      $machineSection.change();
      $curMachineId ++;

      $("button").click(function() {
        var id = $(this).attr("id");
        if (id == "btn-removeMachine") {
          var parentId = $(this).parent().attr("id");
          $('#' + parentId).remove();
          $curMachineId --;
        }
      });
    }
	}

	$("button").click(function() {
		var id = $(this).attr("id");
		if (id == "btn-addMachine") {
			addMachineModelField();
		} else if (id == "btn-removeMachine1") {
			var parentId = $('#'+id).parent().attr("id");
		}
	});

	$(function () {
    // industry
		var $industryType = $('#industryTypeSelect');
		@foreach($data['industryTypes'] as $type)
      @if($type->id == $data['customers'][0]->industry_type)
        $industryType.append('<option id=' + '{{$type->type_name}}' + ' selected value=' + '{{$type->id}}' + '>' + '{{$type->type_name}}' + '</option>');
      @else
			  $industryType.append('<option id=' + '{{$type->type_name}}' + ' value=' + '{{$type->id}}' + '>' + '{{$type->type_name}}' + '</option>');
      @endif
		@endforeach
		$industryType.change();

    // Machine Model
    var $modelVal = '{{$data['customers'][0]->machine_model}}';
    var $model_list = $modelVal.split("@%");
    $('#machineModel0').val($model_list[0]);
    $model_list = $model_list.slice(1, -1);
    addMachineModelFieldList($model_list);
	});
</script>
@endsection 