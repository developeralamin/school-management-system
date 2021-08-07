@extends('admin.admin_master')
@section('admin')


 <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
	
	<div class="col-12">

	 <div class="box">
  <div class="box-header with-border">
	<h3 class="box-title">Grade Marks</h3>
	<a href="{{ route('marks.grade.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Add Grade Marks</a>			  
				</div>
				<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Grade Name</th> 
				<th>Grade Point</th>
				<th>Start Marks</th>
				<th>End Marks </th>
				<th>Point Range</th>
				<th>Remarks</th>
				 
				<th width="15%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $mark_point )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $mark_point->grade_name }}</td>	
			<td> {{ number_format((float)$mark_point->grade_point,2)  }}</td>	
				<td> {{ $mark_point->start_marks }}</td>	
				<td> {{ $mark_point->end_marks }}</td>	
				<td> {{ $mark_point->start_point }} -  {{ $mark_point->end_point }}</td>	
				<td> {{ $mark_point->remarks }}</td>
				<td>
<a href="{{ route('marks.grade.edit',$mark_point->id) }}" class="btn   btn-sm btn-info">Edit</a>

<a href="{{ route('marks.grade.delete',$mark_point->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>


				</td>
				 
			</tr>
			@endforeach
							 
			</tbody>
			<tfoot>
				 
			</tfoot>
		  </table>
		</div>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	       
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section>
		<!-- /.content -->
	  
	  </div>
  </div>





@endsection
