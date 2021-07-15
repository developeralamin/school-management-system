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
	<h3 class="box-title">Fee Amount Details</h3>

	<a href="{{ route('fee.amount.view') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Student Fee Amount List</a>			  
 </div>
				<!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">

		<h3><strong>Exam Type: </strong> {{ $DetailsData['0']['fee_category']['name'] }}</h3>

	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th width="5%">SL</th>
				<th>Class Name</th>
				<th width="25%">Action</th>
				 
			</tr>
		</thead>
		<tbody>
			@foreach($DetailsData as $key => $detail )
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $detail['student_classes']['name'] }}</td>
				<td>{{ $detail->amount}}</td>
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
