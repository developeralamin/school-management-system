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
			  <h4 class="box-title">Add Employee</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">

	 <form method="post" action="{{ route('others.cost.update',$editData->id) }}" 
	 enctype="multipart/form-data">

	 	@csrf

	<div class="row">
		<div class="col-12">	

	  <div class="row"> {{-- /// 1st row --}}

		<div class="col-md-3" >		
			<div class="form-group">
				<h5>Amount <span class="text-danger">*</span></h5>
			<div class="controls">
			 <input type="text" name="amount" value="{{ $editData->amount }}" class="form-control" > 
				  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

		<div class="col-md-3" >		
			<div class="form-group">
				<h5>Date <span class="text-danger">*</span></h5>
			<div class="controls">
				 <input type="date" name="date" value="{{ $editData->date }}"  class="form-control">  
			</div>
				 
			</div>
		</div><!-- End Col Md-4 -->

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
	   src="{{ (!empty($editData->image))? url('uploads/other_cost_image/'.$editData->image):url('uploads/no_image.jpg') }}" style="width: 100px;height: 100px;border: 1px solid #000000" alt="User Avatar"> 
	</div>

	</div><!-- End Col Md-6 -->
			 
	</div> <!-- End Row -->{{-- /// end 1st row --}}


	
		
			 
</div> <!-- end 2nd row -->
</div> <!-- end 2nd row -->


  <div class="row"> <!--  // 2nd row -->
	 <div class="col-md-12">
 	<div class="form-group">
		 <h5>Description <span class="text-danger">*</span></h5>
				<div class="controls">
		 <textarea name="description" id="description" class="form-control"  placeholder="Textarea text"   aria-invalid="false">{{ $editData->description }}</textarea>
				<div class="help-block"></div></div>
			</div>
				 	
				 </div>

	</div>  <!-- End 2nd Row -->



	

	</div> <!-- End Row -->
	</div> <!-- End Row -->
	
				 
	 <div class="text-xs-right">
	   <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
		<a href="{{ route('account.others.cost') }}" class="btn btn-rounded btn-success">Back</a>
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
