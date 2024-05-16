 <!-- Page Wrapper -->
 <div id="wrapper">
     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('awal') }}">
             <div class="sidebar-brand-icon rotate-n-15">
                 <i class="fas fa-home"></i>
             </div>
             <div class="sidebar-brand-text mx-3"> {{ config('app.name') }}</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item">
             <a class="nav-link" href="{{ route('awal') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Beranda</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             Data
         </div>
         <li class="nav-item  {{ request()->is('admin/product*') ? 'active' : '' }}">
             <a class="nav-link mb-0 pb-0" href="{{ route('product.index') }}">
                 <i class="fab fa-fw fa-product-hunt"></i>
                 <span>Produk</span></a>
         </li>
         <li class="nav-item {{ request()->is('admin/bank*') ? 'active' : '' }}">
             <a class="nav-link " href="{{ route('bank.index') }}">
                 <i class="fas fa-fw fa-university"></i>
                 <span>Bank</span></a>
         </li>
         <hr class="sidebar-divider">
         <div class="sidebar-heading">
             Transaksi
         </div>
         <li class="nav-item {{ request()->is('admin/pemesanan*') ? 'active' : '' }}">
             <a class="nav-link mb-3 pb-0" href="{{ route('admin.pemesanan.index') }}">
                 <i class="fas fa-fw fa-th-list"></i>
                 <span>Pemesanan</span></a>
         </li>

         <hr class="sidebar-divider">
         <div class="sidebar-heading">
             Laporan
         </div>
         <li class="nav-item {{ request()->is('admin/laporan/product*') ? 'active' : '' }}">
             <a class="nav-link mb-0 pb-0" href="{{ route('product.index') }}">
                 <i class="fas fa-fw fa-print"></i>
                 <span>Pembelian</span></a>
         </li>
         <li class="nav-item {{ request()->is('admin/laporan/member*') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('product.index') }}">
                 <i class="fas fa-fw fa-print"></i>
                 <span>Member</span></a>
         </li>
         <hr class="sidebar-divider my-0">
         <li class="nav-item">
             <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="fas fa-fw fa-sign-out-alt"></i>
                 <span>Log Out</span>
             </a>


         </li>
         <hr class="sidebar-divider d-none d-md-block">
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
     <!-- End of Sidebar -->

     <!-- Content Wrapper -->
     <div id="content-wrapper" class="d-flex flex-column">
         <!-- Main Content -->
         <div id="content">
             <!-- Topbar -->
             <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Sidebar Toggle (Topbar) -->
                 <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                 </button>


                 <span class="mr-2 d-none d-lg-inline text-gray-600">
                     Halaman Admin
                 </span>
                 <!-- Topbar Navbar -->


             </nav>
             <!-- End of Topbar -->

             <!-- Begin Page Content -->
             <div class="container-fluid">
                 @yield('content')


             </div>
             <!-- /.container-fluid -->

         </div>
         <!-- End of Main Content -->

         <!-- Footer -->
         <footer class="sticky-footer bg-white">
             <div class="container my-auto">
                 <div class="copyright text-center my-auto">
                     <span>Copyright &copy; CV. Fajar Advertising</span>
                 </div>
             </div>
         </footer>
         <!-- End of Footer -->

     </div>
     <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->
