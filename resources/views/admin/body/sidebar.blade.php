

@php
$prefix = Request::route()->getprefix();
$route  = Route::current()->getName();

@endphp



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ route('dashboard') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Easy</b> School</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		     <li class="{{ ($route == 'dashboard')?'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
   @if(Auth::user()->role == 'Admin')

      <li class="treeview {{ ($prefix == '/users')?'active' : '' }}">

        <a href="#">
          <i data-feather="message-circle"></i>
          <span>Manage User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
          <li><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
        </ul>

      </li> 

    @endif  
		  
        <li class="treeview {{ ($prefix == '/profile')?'active' : '' }}">
          <a href="#">
            <i data-feather="mail"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
           
          </ul>
        </li>
		
    		  
		 
        <li class="header nav-small-cap">User Interface</li>
		  
        <li class="treeview {{ ($prefix == '/setups')?'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span>Setup Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
  <ul class="treeview-menu">
    <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
    <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
    <li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
    <li><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a></li>
    <li><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
    <li><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a></li>

    <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>

    <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i> Subject Name</a></li>

    <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>

    <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designations</a></li>
   
  </ul>
       
    </li>
		
		<li class="treeview {{ ($prefix == '/students')?'active' : '' }}">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
      <ul class="treeview-menu">
    			<li><a href="{{ route('reg.view') }}"><i class="ti-more"></i>Student Registration</a></li>

    			<li><a href="{{ route('roll.generate.view') }}"><i class="ti-more"></i>Roll Generate</a></li>

          <li><a href="{{ route('regis.fee.view') }}"><i class="ti-more"></i>Registration Fee</a></li>

    			<li><a href="{{ route('monthly.fee.view') }}"><i class="ti-more"></i>Monthly Fee</a></li>
		  </ul>
    </li>  
		  

    <li class="treeview {{ ($prefix == '/employees')?'active' : '' }}">

      <a href="#">
        <i data-feather="hard-drive"></i>
        <span>Employee Management</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('employee.registration.view') }}"><i class="ti-more"></i>Employee Registration</a></li>

        <li><a href="{{ route('employee.salary.view') }}"><i class="ti-more"></i>Employee Salary</a></li>

        <li><a href="{{ route('employee.leave.view') }}"><i class="ti-more"></i>Employee Leave</a></li>

        <li><a href="{{ route('employee.attendance.view') }}"><i class="ti-more"></i>Employee Attendance</a></li>

        <li><a href=""><i class="ti-more"></i>Monthly Salary</a></li>
      </ul>
      
    </li>
		  

        <li class="treeview">
          <a href="#">
            <i data-feather="package"></i>
            <span>Marks Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
            
          </ul>
        </li>
		  
		<li class="treeview">
          <a href="#">
            <i data-feather="edit-2"></i>
            <span>Accounts Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
           
          </ul>
        </li> 
		  

    <li class="header nav-small-cap">Reports</li>  		  		  
		  
		{{-- <li class="header nav-small-cap">Repo</li>		   --}}
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="layers"></i>
			<span>Reports Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li>
              <a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a>
            </li>

          </ul>
        </li>  
		  

      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>