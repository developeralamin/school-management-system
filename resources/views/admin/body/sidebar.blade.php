

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
						  <h3><b>Easy</b> Admin</h3>
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
   
  </ul>
       
    </li>
		
		<li class="treeview">
          <a href="#">
            <i data-feather="credit-card"></i>
            <span>Student Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
   <ul class="treeview-menu">
			<li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
			<li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
			<li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
		  </ul>
        </li>  
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="hard-drive"></i>
            <span>Employee Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
            <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
            <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
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
            <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
            <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
            <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
            <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
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
            <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
            <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>	
            <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
            <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
            <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
            <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
            <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
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
            <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
            <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
            <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>  
            <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
            <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
            <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
            <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
            <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
          </ul>
        </li>  
		  

      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>