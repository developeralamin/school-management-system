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
	<h3 class="box-title">Assign Subject Details</h3>

	<a href="{{ route('assign.subject.view') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Assign Subject List</a>			  
 </div>
				<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">

		<h3><strong>Class Name: </strong> {{ $DetailsData['0']['student_classes']['name'] }}</h3>

	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Subject Name</th>
				<th>Full Marks</th>
				<th>Pass Marks</th>
				<th>Subjective Marks</th>
				
				 
			</tr>
		</thead>
		<tbody>
			@foreach($DetailsData as $key => $detail )
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $detail['student_subject']['name'] }}</td>
				<td>{{ $detail->full_mark }}</td>
				<td>{{ $detail->pass_mark }}</td>
				<td>{{ $detail->subjective_mark }}</td>
				
				<td>


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
