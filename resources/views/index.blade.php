<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <i class="fas fa-cogs ml-2"></i>
      <span class="brand-text font-weight-light ml-2">AdminLTE3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <li class="nav-item">
           <a href="{{ url('dashboard') }}"
   class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
         <li class="nav-item has-treeview">
  <a href="#" class="nav-link ? 'active' : ''  ">
    <i class="nav-icon fas fa-folder"></i>
    <p>
      Categories
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('addcategory') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Category</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('category.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Manage Category</p>
      </a>
    </li>
  </ul>
</li>
  <li class="nav-item has-treeview">
  <a href="#" class="nav-link   ">
    <i class="nav-icon fas fa-folder"></i>
    <p>
    Sub Category
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('addsubcategory') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Sub_Category</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('subcategory.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Manage Sub_Category</p>
      </a>
    </li>
  </ul>
</li>
        <li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-award"></i>
    <p>
      Brand
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('addbrand') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Brand</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('brand.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Manage Brands</p>
      </a>
    </li>
  </ul>
</li>

        <li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-box"></i>
    <p>
        Products
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('addproduct') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add Products</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('product.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Manage Products</p>
      </a>
    </li>
  </ul>
</li>



          <li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-user"></i>
    <p>
      Users
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>

  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Add User</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Manage Users</p>
      </a>
    </li>
  </ul>
</li>
          <li class="nav-item">
            <a href="{{ route('email/form') }}" class="nav-link">
              <i class="far fa-envelope"></i>
              <p>Send Email</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    @yield('content')
  </div>


  <!-- /.content-wrapper -->

  <!-- Footer -->
  <footer class="main-footer text-center">
    <strong> Dashboard</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>


</body>
</html>
