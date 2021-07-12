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
			  <h4 class="box-title">Update User</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('profile.store') }}"
	  enctype="multipart/form-data">
	 	@csrf

	 <div class="row">
	<div class="col-12">	

   <div class="row">

	<div class="col-md-6" >
	  <div class="form-group">
			<h5>User Name <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="text" name="name" value="{{ $editData->name }}" class="form-control" >  </div>
			 
		</div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >
	  <div class="form-group">
			<h5>User Email <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="email" name="email" value="{{ $editData->email }}" class="form-control" >  </div>
			 
		</div>
	</div> <!-- End Col Md-6 -->

</div> <!-- End Row -->



   <div class="row">

	<div class="col-md-6" >
	  <div class="form-group">
			<h5>User Mobile <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="text" name="mobile" value="{{ $editData->mobile }}" class="form-control" >  </div>
			 
		</div>
	</div> <!-- End Col Md-6 -->

	<div class="col-md-6" >
	  <div class="form-group">
			<h5>User Address <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="text" name="address" value="{{ $editData->address }}" class="form-control" >  </div>
			 
		</div>
	</div> <!-- End Col Md-6 -->

</div> <!-- End Row -->



<div class="row">
	<div class="col-md-6" >

   <div class="form-group">
		<h5>User Gender <span class="text-danger">*</span></h5>
		<div class="controls">
		 <select name="gender" id="gender"  class="form-control">
				<option value="" selected="" disabled="">Select Role</option>
				<option value="Male" {{ ($editData->gender == "Male" ? "selected": "") }} >Male</option>
				<option value="FeMale" {{ ($editData->gender == "FeMale" ? "selected": "") }}>FeMale</option>
				 
			</select>
		 </div>
         </div>
	</div> <!-- End Col Md-6 -->



	<div class="col-md-6" >	

	<div class="form-group">
		<h5>User Profile <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="file" name="image" id="image" class="form-control" >  </div> 
	</div>


	<div class="form-group">
		
     <div class="controls">
	 <img id="showimage"
	   src="{{ (!empty($user->image))? url('uploads/user_image/'.$user->image):url('uploads/no_image.jpg') }}" style="width: 100px;height: 100px;border: 1px solid #000000" alt="User Avatar"> 
	</div>

	</div><!-- End Col Md-6 -->
	

</div> <!-- End Row -->

						 
	<div class="text-xs-right">

	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
		<a href="{{ route('profile.view') }}" class="btn btn-rounded btn-success">Back</a>
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
