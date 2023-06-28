<footer class="main-footer">
    <div class="pull-right hidden-xs">
      Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>. <b>Version</b> 2.4.13-pre
    </div>
    <span><strong>Developer By Rahmat Soleh</strong>| Powered by Pemrograman Web Semester 4
  </footer>




<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?= base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/morris.js/morris.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="<?= base_url();?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url();?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url();?>/assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url();?>/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url();?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?= base_url();?>/assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url();?>/assets/dist/js/pages/dashboard.js"></script>
<script src="<?= base_url();?>/assets/dist/js/demo.js"></script>
<script src="<?= base_url();?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url();?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
