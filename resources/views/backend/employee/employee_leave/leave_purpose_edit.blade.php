@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Update Employee Leave</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('employee.leave.update',$editData) }}">
	 	@csrf


<div class="row">
<div class="col-12">	


<div class="row">
	<div class="col-md-6" >

	<div class="form-group">
		<h5>Employee Name <span class="text-danger">*</span></h5>
		<div class="controls">
		 <select name="employee_id" id="employee_id"  class="form-control">
				<option value="" selected="" disabled="">Select Employee</option>

		@foreach($employees as $employee)	
			<option value="{{ $employee->id }}" 
				{{ ($editData->employee_id == $employee->id)?'selected':'' }} >
				{{ $employee->name }}</option>
		@endforeach	
				 
			</select>
		 </div>
    </div>

	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >		
	<div class="form-group">
		<h5>Start Date <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="start_date" value="{{ $editData->start_date }}" class="form-control" >  </div>
		 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->



    <div class="row">

	<div class="col-md-6" >
	  <div class="form-group">
		<h5>Leave Purpose <span class="text-danger">*</span></h5>
		<div class="controls">
		 <select name="leave_purpose_id" id="leave_purpose_id"  class="form-control">
				<option value="" selected="" disabled="">Select Leave Purpose</option>

		@foreach($leave_purpose as $leave_purpose)	
			<option value="{{ $leave_purpose->id }}" {{ ($editData->leave_purpose_id == $leave_purpose->id)?'selected':'' }}>{{ $leave_purpose->name }}</option>
		@endforeach	
			<option value="0">New Purpose</option>
			</select>

			<input type="text" name="name" id="add_another" class="form-control" placeholder="Write Purpose" style="display: none;">	
		 </div>
    </div>

	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >

	  <div class="form-group">
			<h5>End Date <span class="text-danger">*</span></h5>
		<div class="controls">
		     <input type="date" name="end_date" value="{{ $editData->end_date }}" class="form-control" >  </div>
	   </div>

	</div> <!-- End Col Md-6 -->
	

</div> <!-- End Row -->

 
  
						 
	<div class="text-xs-right">

	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">

		<a href="{{ route('employee.leave.view') }}" class="btn btn-rounded btn-success">Back</a>

	</div>

</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>

	  
	  </div>
  </div>


<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','#leave_purpose_id',function(){
			var leave_purpose_id = $(this).val();

			if(leave_purpose_id == '0'){
				$('#add_another').show();
			}else{
				$('#add_another').hide();
			}

		});
	});


</script>

@endsection
