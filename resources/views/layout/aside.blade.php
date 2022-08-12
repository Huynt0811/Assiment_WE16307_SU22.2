   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="{{ asset('index3.html') }}" class="brand-link">
           <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
               class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text font-weight-light">AdminLTE 3</span>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                   <a href="#" class="d-block">
                       <!-- Auth::check() trả về true/false đã đăng nhập chưa -->
                       <!-- Auth::user() trả về bản ghi user đã đăng nhập -->
                       {{Auth::check() ? Auth::user()->email : ''}}
                   </a>
               </div>
           </div>

           <!-- SidebarSearch Form -->
           <div class="form-inline">
               <div class="input-group" data-widget="sidebar-search">
                   <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                   <div class="input-group-append">
                       <button class="btn btn-sidebar">
                           <i class="fas fa-search fa-fw"></i>
                       </button>
                   </div>
               </div>
           </div>

           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   <li class="nav-item">
                       <a href="/" class="nav-link">
                           <i class="nav-icon fas fa-home"></i>
                           <p>
                               Home
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="" class="nav-link">
                           <i class="nav-icon fas fa-user-plus"></i>
                           <p>
                               Register
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="/users" class="nav-link">
                           <i class="nav-icon fas fa-user"></i>
                           <p>
                               User
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="/admin/user" class="nav-link">
                                   <i class="nav-icon fas fa-list"></i>
                                   <p>List</p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item">
                       <a href="{{route('admin.product.list')}}" class="nav-link">
                           <i class="nav-icon fas fa-box"></i>
                           <p>
                               Products
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{route('admin.product.list')}}" class="nav-link">
                                   <i class="nav-icon fas fa-list"></i>
                                   <p>List</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{route('admin.product.create')}}" class="nav-link">
                                   <i class="nav-icon fas fa-plus"></i>
                                   <p>Add</p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-box"></i>
                           <p>
                               Categories
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{route('admin.category.list')}}" class="nav-link">
                                   <i class="nav-icon fas fa-list"></i>
                                   <p>List</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{route('admin.category.create')}}" class="nav-link">
                                   <i class="nav-icon fas fa-plus"></i>
                                   <p>Add</p>
                               </a>
                           </li>
                       </ul>
                   </li>

               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>