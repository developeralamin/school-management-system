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
			  <h4 class="box-title">Add Salary</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	<form method="post" action="{{ route('employee.salary.store.update',$editData->id) }}" 
	 enctype="multipart/form-data">

	 	@csrf

	<div class="row">
		<div class="col-12">	

	  <div class="row"> {{-- /// 1st row --}}

	<div class="col-md-6" >		
		<div class="form-group">
			<h5>Salary Amount<span class="text-danger">*</span></h5>
			<div class="controls">
        <input type="text" name="increment_salary"  class="form-control" required=""> 
				  
			</div>
				 
		</div>
	</div><!-- End Col Md-4 -->

		<div class="col-md-6" >		
			<div class="form-group">
				<h5>Effected Date <span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="date" name="effected_salary"  class="form-control" required="">  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

	

	</div> <!-- End Row -->{{-- /// end 1st row --}}



	</div><!-- End Col 12 -->

	</div> <!-- End Row -->
	</div> <!-- End Col M12 -->
	</div> <!-- End Row -->
				 
	 <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
		<a href="{{ route('employee.salary.view') }}" class="btn btn-rounded btn-success">Back</a>
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
