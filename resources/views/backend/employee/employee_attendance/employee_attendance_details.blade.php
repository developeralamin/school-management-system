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
				  <h3 class="box-title">Employee Attendance Details </h3>

	 			   <a href="{{ route('employee.attendance.view') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Employee Attendance List</a>	
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
		<table  class="table table-bordered table-striped">
						<thead>
			<tr>
				<th width="5%">SL</th>  
				<th>Name</th>
				<th>ID No </th>
				<th>Date </th>
				<th>Attend Status</th>				 
			 
				 
			</tr>
		</thead>
		<tbody>
			@foreach($details as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td> {{ $value['user']['name'] }}</td>
				<td> {{ $value['user']['id_no'] }}</td>
				<td> {{ date('d-m-Y', strtotime($value->date)) }}</td>
				<td> {{ $value->attendace_status }}</td>
				  
				 
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
