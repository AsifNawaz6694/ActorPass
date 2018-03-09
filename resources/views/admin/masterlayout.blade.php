@include('admin.partials.header')
<div class="wrapper"  style="width: 100%;">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Actor Pass
        <small>Admin Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i>Home</a></li>         
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->    
      @yield('content')
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->
@include('admin.partials.footer')