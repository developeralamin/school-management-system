@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		
		<section class="content">
		  <div class="row">

   <div class="box bb-3 border-warning">
				  <div class="box-header">
					<h4 class="box-title">Student <strong>Search</strong></h4>
				  </div>

				  <div class="box-body">

			<form method="post" action="">

	<div class="row">
		    <div class="col-md-4">

 		 <div class="form-group">
		<h5>Year <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="year_id" required="" class="form-control">
			<option value="" selected="" disabled="">Select Year</option>
			 @foreach($years as $year)
 <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected":"" }} >{{ $year->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 


		<div class="col-md-4">

 		 <div class="form-group">
		<h5>Class <span class="text-danger"> </span></h5>
		<div class="controls">
	 <select name="class_id"  required="" class="form-control">
			<option value="" selected="" disabled="">Select Class</option>
			 @foreach($classes as $class)
			<option value="{{ $class->id }}" {{ (@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
		 	@endforeach
			 
		</select>
	  </div>		 
	  </div>
	  
 			</div> <!-- End Col md 4 --> 

		<div class="col-md-4" style="padding-top: 20px;" >		
			<div class="form-group">
			<div class="controls">
				<input type="submit" class="btn btn-rounded btn-success mb-5" name="search" value="Search">
			</div>
				 
			</div>
		</div>



		</div>



			</form>		


				  </div>
				</div>

			  
	<div class="col-12">

	 <div class="box">
  <div class="box-header with-border">
	<h3 class="box-title">Student List</h3>
	<a href="{{ route('reg.Add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Student</a>			  
 </div>
				{{-- box header --}}
		<div class="box-body">
			<div class="table-responsive">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Name</th>
				<th>ID NO.</th>
				<th>Roll</th>
				<th>Year</th>
				<th>Class</th>
				<th>Image</th>
			@if(Auth::user()->role == 'Admin')	
				<th>Code</th>
		    @endif		
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $value['student']['name'] }}</td>
				<td>{{ $value['student']['id_no'] }}</td>
				<td></td>
				<td>{{ $value['student_year']['name'] }}</td>
				<td>{{ $value['student_classes']['name'] }}</td>
				<td></td>>
				<td>{{ $value['student']['code'] }}</td>
				<td>
<a href="{{-- {{ route('student.group.edit',$group->id) }} --}}" class="btn btn-info">Edit</a>
<a href="{{-- {{ route('student.group.delete',$group->id) }} --}}" class="btn btn-danger" id="delete">Delete</a>

				</td>
				 
			</tr>
			@endforeach
							 
			</tbody>
			<tfoot>
				 
			</tfoot>
		  </table>
		</div>
		</div>
		
	  </div>
	  
	       
	</div>
	
  </div>

</section>
		
	  
	  </div>
  </div>


@endsection
