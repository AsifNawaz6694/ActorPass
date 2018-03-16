<?php require_once '../header.php' ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <form role="form">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      
      
    </div>
    <!-- /.box-body -->

    
  </form>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">CK Editor
              <small>Advanced and full of features</small>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
              title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form>
              <textarea id="editor1" name="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
              </textarea>
            </form>
          </div>
        </div>

        <form role="form">
         
          <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input type="email" class="form-control" id="exampleInputEmail1">
          </div>
          
        </form>
        <div class="box-footer" style="display: inline-block;">
          <button type="save" class="btn btn-primary">Save</button>
        </div>
        <div class="box-footer" style="display: inline-block;">
          <button type="reset" class="btn btn-primary">Reset</button>
        </div>
      </div>
      <!-- /.col-->


    </div>
    <!-- ./row -->
  </section>
  <!-- /.content -->

</div>

<!-- ./wrapper -->





<?php require_once '../footer.php' ?>