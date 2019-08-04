<script>var base_url = '<?php echo base_url() ?>';</script>
<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<?php 
if(isset($load_js))
{ ?>
  <!-- DataTables -->
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/buttons.flash.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/buttons.print.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/buttons.html5.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/pdfmake.min.js"></script>
  <script src="<?=base_url()?>assets/bower_components/datatables.net/js/vfs_fonts.js"></script>
  <script src="<?php echo base_url('assets/dist/js/pages/'.$load_js); ?>"></script>
<?php }

?>


<!-- bootstrap datepicker -->
<script src="<?=base_url()?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Custom 
<script src="<?=base_url()?>assets/dist/js/custom.js"></script>-->
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  $('#datepicker').datepicker({
      autoclose: true
    })

  $('#datepicker1').datepicker({
      autoclose: true
    })

  $('#datepicker2').datepicker({
      autoclose: true
    })

  $('#datepicker3').datepicker({
      autoclose: true
    })
</script>
	
</body>
</html>