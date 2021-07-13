@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Change Password</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('password.update') }}">

	 	@csrf


	 <div class="row">
		<div class="col-12">

    <div class="row">

	<div class="col-md-12" >
	  <div class="form-group">
			<h5>Current Password <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="password" id="current_password" name="oldpassword" class="form-control" >  </div>
			 
		</div>
		 @error('oldpassword')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
	</div> <!-- End Col Md-6 -->

	<div class="col-md-12" >
	  <div class="form-group">
			<h5>New Password <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="password" id="password" name="password" class="form-control" >  </div>
			 
		</div>
		@error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
	</div> <!-- End Col Md-6 -->

	<div class="col-md-12" >
	  <div class="form-group">
			<h5>Confirm Password <span class="text-danger">*</span></h5>
			<div class="controls">
		 <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >  </div>
			 
		</div>

		@error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
	</div> <!-- End Col Md-6 -->
	

</div> <!-- End Row -->

 
  
						 
	<div class="text-xs-right">

	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
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


@endsection
