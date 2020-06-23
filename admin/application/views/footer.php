    <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright &copy <?php echo date('Y')?> All Right Reserved<a href="https://colorlib.com"></a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>sources/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>sources/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>sources/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url()?>sources/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo base_url()?>sources/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo base_url()?>sources/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url()?>sources/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>sources/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo base_url()?>sources/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo base_url()?>sources/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?php echo base_url()?>sources/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo base_url()?>sources/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url()?>sources/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo base_url()?>sources/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url()?>sources/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>sources/build/js/custom.min.js"></script>
	
  </body>
</html>
<script type="text/javascript">
    $(document).ready( function () {
        $('#example1').DataTable({
        // "paging":true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth":false,
        "scrollX":true,
        "scrollY":true,
        "responsive":true,
        "lengthMenu": [[10, 25, 50,75,100, -1], [10, 25, 50,75,100, "All"]],
        "order": []
        });
        
      $('#example1').on( 'keyup', function () {
      table.search(this.value).draw();
    });
  });
  CKEDITOR.replace( 'alamat' );
</script>

<script>
		$('.toast').toast('show');
</script>
<script>
$(document).ready(function(){
    $(".toast").click(function(){
        $(".toast").toast('hide');
    });
});
</script>
