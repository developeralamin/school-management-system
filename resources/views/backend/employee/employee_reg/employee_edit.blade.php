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
			  <h4 class="box-title">Update Employee</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('employee.registration.update',$editData->id) }}" enctype="multipart/form-data">
	 

	 	@csrf

	<div class="row">
		<div class="col-12">	

	  <div class="row"> {{-- /// 1st row --}}

<div class="col-md-4" >		
	<div class="form-group">
		<h5>Employee Name <span class="text-danger">*</span></h5>
	<div class="controls">
		 <input type="text" name="name" value="{{ $editData->name }}"  class="form-control" required="" 
		 >  
	</div>
		 
	</div>
</div><!-- End Col Md-4 -->

		<div class="col-md-4" >		
			<div class="form-group">
				<h5>Father's Name <span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="text" name="fname"  value="{{ $editData->fname }}" class="form-control" required="">  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

		<div class="col-md-4" >		
			<div class="form-group">
				<h5>Mother's Name <span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="text" name="mname" value="{{ $editData->mname }}" class="form-control" required="" >  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

	</div> <!-- End Row -->{{-- /// end 1st row --}}


	 <div class="row"> {{-- /// 2nd row --}}

		<div class="col-md-4" >		
			<div class="form-group">
				<h5>Mobile Number <span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="text" name="mobile"  value="{{ $editData->mobile }}" class="form-control" required="" >  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

		<div class="col-md-4" >		
			<div class="form-group">
				<h5>Address <span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="text" name="address" value="{{ $editData->address }}"  class="form-control" required="">  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

		<div class="col-md-4" >		
		 <h5>Gender <span class="text-danger">*</span></h5>
		<div class="controls">
	 <select name="gender" id="gender" required=""  class="form-control">
			<option value="" selected="" disabled="">Select Gender</option>
			<option value="Male" {{ ($editData->gender == "Male" ? "selected": "") }}>Male</option>
			<option value="FeMale" {{ ($editData->gender == "FeMale" ? "selected": "") }}>FeMale</option>
				 
			</select>
		 </div>
    </div>
			 
</div> <!-- end 2nd row -->


   <div class="row"> {{-- /// 3rd row --}}

		<div class="col-md-4" >		
			<div class="form-group">
				<h5>Religion <span class="text-danger">*</span></h5>
			<div class="controls">
			<select name="religion" id="religion"  required="" class="form-control">
				<option value="" selected="" disabled="">Select Religion</option>
				<option value="Muslim"{{ ($editData->religion == "Muslim" ? "selected": "") }}>Muslim</option>
				<option value="Hindu"{{ ($editData->religion == "Hindu" ? "selected": "") }}>Hindu</option>
				<option value="Christan"{{ ($editData->religion == "Christan" ? "selected": "") }}>Christan</option>
				<option value="Budduis"{{ ($editData->religion == "Budduis" ? "selected": "") }}>Budduis</option>
			 
			</select>  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

		<div class="col-md-4" >		
			<div class="form-group">
				<h5>Date Of Birth <span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="date" value="{{ $editData->dob }}" name="dob" required="" class="form-control" >  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

		<div class="col-md-4" >		
			<div class="form-group">
				<h5>Designation <span class="text-danger">*</span></h5>
			<div class="controls">
			<select name="designation_id" id="designation_id" required=""  class="form-control">
				<option value="" selected="" disabled="">Select Designation</option>
		@foreach($designation as $designation)	

		<option value="{{ $designation->id }}" {{($editData->designation_id == $designation->id)?'selected':''}}>{{ $designation->name }}</option>
				
		@endforeach	 
			 
			</select>  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->
			 
  </div> <!-- end 3rd row -->

  <div class="row"> {{-- /// 5th row --}}

@if(!$editData)
    <div class="col-md-3" >		
		<div class="form-group">
			<h5>Salary <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="text" name="salary" value="{{ $editData->salary }}" required="" id="salary" class="form-control" >  </div> 
		</div>
	</div><!-- End Col Md-4 -->

@endif

@if(!$editData)
	<div class="col-md-3" >		
		<div class="form-group">
			<h5>Join Date <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="date" name="join_date" value="{{ $editData->join_date }}" required="" id="join_date" class="form-control" >  </div> 
		</div>
	</div><!-- End Col Md-4 -->

@endif

	 <div class="col-md-3" >		
		<div class="form-group">
			<h5>Employee Profile <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="file" name="image"  id="image" class="form-control" >  </div> 
		</div>
	</div><!-- End Col Md-4 -->


   <div class="form-group">
		
     <div class="controls">
	 <img id="showimage"
	   src="{{ (!empty($editData->image))? url('uploads/employee_image/'.$editData->image):url('uploads/no_image.jpg') }}" style="width: 100px;height: 100px;border: 1px solid #000000" alt="User Avatar"> 
	</div>

	</div><!-- End Col Md-6 -->
			 
  </div> <!-- end 5th row -->


	</div><!-- End Col 12 -->

	</div> <!-- End Row -->
	</div> <!-- End Col M12 -->
	</div> <!-- End Row -->
				 
	 <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
		<a href="{{ route('employee.registration.view') }}" class="btn btn-rounded btn-success">Back</a>
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
		$('#image').change(function(e){
			 var reader = new FileReader();
			 reader.onload = function(e){
			 	$('#showimage').attr('src',e.target.result);
			 }
			 reader.readAsDataURL(e.target.files['0']);

		});

	});
</script>



@endsection
