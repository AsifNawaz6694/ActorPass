<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>
<!-- jQuery 3 -->
<script src="{{asset('public/admin_assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- <script src="bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/admin_assets/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- <script src="bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- Morris.js charts -->
<script src="{{asset('public/admin_assets/bower_components/raphael/raphael.min.js')}}"></script>
<!-- <script src="bower_components/raphael/raphael.min.js"></script> -->
<script src="{{asset('public/admin_assets/bower_components/morris.js/morris.min.js')}}"></script>
<!-- <script src="bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="{{asset('public/admin_assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
<!-- jvectormap -->
<script src="{{asset('public/admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<!-- <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
<script src="{{asset('public/admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="{{asset('public/admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<script src="{{asset('public/admin_assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="{{asset('public/admin_assets/bower_components/moment/min/moment.min.js')}}"></script> -->
<script src="{{asset('public/admin_assets/bower_components/ckeditor/ckeditor.js')}}"></script>
<!-- <script src="bower_components/moment/min/moment.min.js"></script> -->
<script src="{{asset('public/admin_assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
<!-- datepicker -->
<script src="{{asset('public/admin_assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/admin_assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Time Picker Script -->
<script src="{{asset('public/admin_assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
<!-- Time Picker Script -->
<!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
<!-- Slimscroll -->
<script src="{{asset('public/admin_assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- FastClick -->
<script src="{{asset('public/admin_assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
<!-- AdminLTE App -->
<script src="{{asset('public/admin_assets/dist/js/adminlte.min.js')}}"></script>
<!-- <script src="dist/js/adminlte.min.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{asset('public/admin_assets/dist/js/pages/dashboard.js')}}"></script> -->
<!-- <script src="dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin_assets/dist/js/demo.js')}}"></script>
<!-- <script src="dist/js/demo.js"></script> -->
<script src="{{asset('public/admin_assets/js/custom.js')}}"></script>

<script src="{{asset('public/admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin_assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
    $('.select2').select2();
    CKEDITOR.replace('editor1')
  })
</script>
</body>
</html>
