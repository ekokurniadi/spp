
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?php echo date('Y')?> MTS MAHDALIYAH JAMBI<div class="bullet"></div><a href="">Allright Reserved</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

    
    <script src="<?php echo base_url()?>admin/sources/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url()?>admin/sources/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url()?>/assets/js/stisla.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>

  <!-- load script chart js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url()?>/assets/js/scripts.js"></script>
  <script src="<?php echo base_url()?>/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
 <script src=" https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> 
 <script src=" https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> 
 <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
 <script src="assets/js/page/forms-advanced-forms.js"></script>
  
  <script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    // load select2
    $('#pilihan').select2(
      {
      width: 'resolve',
      placeholder:"Select an option"
    }
    );

  });
  $(document).ready(function() {
    // load select2
    $('#jabat').select2(
      {
      width: 'resolve',
      placeholder:"Select an option"
    }
    );

  });

  // load ckeditor
  // CKEDITOR.replace( 'alamat' );

  // load datepicker
  $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
  $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4'
        });
  </script>
 
 <script>
var ctx = document.getElementById('barChart').getContext('2d');
var data_nama =[];
var data_stok =[];

$.post("<?php echo base_url('dashboard/get_data') ?>",
  function(data){
    var obj = JSON.parse(data);
    $.each(obj,function(test,item){
      data_nama.push(item.nama_barang);
      data_stok.push(item.qty);


    });
  
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: data_nama,
        datasets: [{
            label: 'Jumlah barang',
            data:data_stok ,
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        layout: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
            }
        }
    }
});

});
</script> 

<script>
var ctx2 = document.getElementById('barChart2').getContext('2d');
var data_nama2 =[];
var data_stok2 =[];

$.post("<?php echo base_url('dashboard/get_data') ?>",
  function(data2){
    var obj = JSON.parse(data2);
    $.each(obj,function(test,item){
      data_nama2.push(item.nama_barang);
      data_stok2.push(item.qty);


    });
  
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: data_nama2,
        datasets: [{
            label: 'Jumlah barang',
            data:data_stok2 ,
            backgroundColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        layout: {
            padding: {
                left: 0,
                right: 0,
                top: 0,
                bottom: 0
            }
        }
    }
});

});
</script> 


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
  // CKEDITOR.replace( 'alamat' );
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
