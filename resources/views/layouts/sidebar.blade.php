
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">
        @if (session()->has('LoggedAdminID'))
            Admin
        @else
            User
        @endif
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (session()->has('LoggedAdminID'))
            <img width="10%" src="{{ asset(Session::get('LoggedAdminImage')) }}" class="img-circle elevation-2" alt="User Image">
            {{-- <img width="10%" src="{{ asset($login['adminImage']) }}" class="img-circle elevation-2" alt="User Image"> --}}
            @else
            
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @if (session()->has('LoggedAdminID'))
            {{Session::get('LoggedAdminFName')}} {{Session::get('LoggedAdminLName')}}
            {{-- {{$login['adminFirstName']}} {{$login['adminLastName']}} --}}
              {{-- {{session()->get('LoggedAdmin')}} --}}
            @else
            {{Auth::user()->name }}
           @endif</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('backend.home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class=""></i>
              </p>
            </a>
          </li>
         @if (session()->has('LoggedAdminID'))
         <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="fas fa-user-shield"></i>
            <p>
              Manage Admin
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.admin.addAdmin')}}" class="nav-link">
                <i class="fas fa-plus"></i>
                <p>Add Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.admin.viewAdmin')}}" class="nav-link">
                <i class="fas fa-eye"></i>
                <p>View Admin</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="fas fa-users"></i>
            <p>
              Manage Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.user.addUser')}}" class="nav-link">
                <i class="fas fa-plus"></i>
                <p>Add User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.user.viewUser')}}" class="nav-link">
                <i class="fas fa-eye"></i>
                <p>View User</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="fas fa-book-open"></i>
            <p>
              Manage Courses
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.courses.addcourse')}}" class="nav-link">
                <i class="fas fa-plus"></i>
                <p>Add Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('backend.courses.viewcourse')}}" class="nav-link">
                <i class="fas fa-eye"></i>
                <p>View Courses</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('backend.contact.viewcontact')}}" class="nav-link">
            <i class="fas fa-phone"></i>
            <p>Contact</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('backend.admin.logouts')}}" class="nav-link"><i class="fas fa-sign-out-alt"> Logout</i></a>
        </li>
         @else
         <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="fas fa-users"></i>
            <p>
              Manage Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('backend.user.addUser')}}" class="nav-link active">
                <i class="fas fa-plus"></i>
                <p>Add User</p>
              </a>
            </li>
          </ul>
        </li>
          <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
 {{ __('Log Out') }}</i>
                            </x-dropdown-link>
                        </form>
         @endif
     
          {{-- <x-app-layout>
            <x-slot name="header">
            </x-slot>
        </x-app-layout> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
