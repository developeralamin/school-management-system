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
		<h3 class="box-title">Employee Leave</h3>
		<a href="{{ route('employee.leave.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Employee Leave</a>			  
	 </div>
				<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
		<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Name</th>
				<th>ID No.</th>
				<th>Purpose</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th width=25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($allData as $key => $value )
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $value['user']['name'] }}</td>
				<td>{{ $value['user']['id_no'] }}</td>
				<td>{{ $value['leave_purpose']['name'] }}</td>
				<td>{{ $value->start_date }}</td>
				<td>{{ $value->end_date }}</td>

	<td>
<a  title="InCrement" href="{{ route('employee.leave.edit',$value->id) }}" class="btn btn-info"> Edit </a>

<a title="Details" target="" href="{{ route('employee.leave.delete',$value->id) }}" class="btn btn-danger" id=""> Delete </a>
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

