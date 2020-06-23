
<body onload="load_data_temp()"></body>

</style>
<!-- Content Header (Page header) -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">

function loading(){
  $("#loading").show();    
}
function load_data_temp()
        {
            var kode_kelas  =  $("#kode_kelas").val();
            
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('pembayaran_spp/load_temp')?>",
                data:"kode_kelas="+kode_kelas,
                beforeSend: function(){
                  // Show image container
                  $("#loading").show();    
                },
                success:function(hasilajax){ 
                    $('#list_ku').html(hasilajax);
                }
              
            });
            
        }

function ambil()
{
  var kode_bonusnya = $('#kode_bonus').val(); 


 $.ajax({      
    method: "POST",      
    url: "<?php echo base_url('bonus_bulanan/ambil_total')?>", 
    dataType:'json',   // file PHP yang akan merespon ajax
    data: { kode_bonus: kode_bonusnya}
   
  })
    .done(function(hasilajax) {  
   
      $("#totalnya").val(hasilajax.totalnya);

    });
}

function ambil_jumlah_karyawan()
{
 $.ajax({      
    method: "POST",      
    url: "<?php echo base_url('bonus_bulanan/ambil_total_karyawan')?>", 
    dataType:'json',   // file PHP yang akan merespon ajax
   
  })
    .done(function(hasilajax) {  
      $("#jumlah_karyawan").val(hasilajax.jumlah_karyawan);

    });
}

         function hapus(id)
        {
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('bonus_bulanan/hapus_temp')?>",
                data:"id="+id,
                success:function(html){
                  $("#dataku"+id).hide(500);
                  load_data_temp();
                }
            });
        }

        function add_barang()
        {
                var kode_bonus      = $("#kode_bonus").val();
                var tanggal         = $("#tanggal").val();
                var kode_reward     = $("#kode_reward").val();
                var kode_produk     = $("#kode_produk").val();
                var nama_produk     = $("#nama_produk").val();
                var penjualan       = $("#penjualan").val();
                var jumlah          = $("#jumlah").val();
                var total           = $('#total').val();
               
            if(total == '' || kode_produk == '' || nama_produk == '' ){
                alert("Data Belum Lengkap");
                die;
            }
            else
            {
             $.ajax({
                type:"GET",
                url:"<?php echo base_url('bonus_bulanan/input_ajax')?>",
                data:"kode_bonus="+kode_bonus+"&tanggal="+tanggal+"&kode_reward="+kode_reward+"&kode_produk="+kode_produk+"&nama_produk="+nama_produk+"&penjualan="+penjualan+"&jumlah="+jumlah+"&total="+total,
                success:function(html){
                   load_data_temp();
                    $("#kode_produk").val('');
                    $("#nama_produk").val('');
                    $("#penjualan").val('');
                    $("#jumlah").val('');
                    $("#total").val('');
                    document.getElementById("kode_produk").focus();
                   
                }
             });
        }
}
    </script>


<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Pembayaran Komite dan Osis<small></small></h3>
         </div>
         <div class="title_right">
           <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
             <div class="input-group">
               <input type="text" class="form-control" placeholder="Search for...">
               <span class="input-group-btn">
                 <button class="btn btn-default" type="button">Go!</button>
               </span>
             </div>
           </div>
         </div>
       </div>
       </div>

<div class="clearfix">
<div class="col-md-12 col-xs-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pembayaran Komite dan Osis<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Pembayaran <?php echo form_error('kode_pembayaran') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_pembayaran" id="kode_pembayaran" placeholder="Kode Pembayaran" value="<?php echo $kode; ?>" readonly/>
            </div>
    </div>
    
      
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Semester <?php echo form_error('semester') ?></label>
            <div class="col-sm-6">
              <select name="semester" id="semester" class="form-control">
              <option value="" selected>Select an option</option>
              <option value="1">Semester 1</option>
              <option value="2">Semester 2</option>
              </select>
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="int">Bulan <?php echo form_error('bulan') ?></label>
            <div class="col-sm-6">
              <select name="bulan" id="bulan" class="form-control">
              <option value="" selected>Select an option</option>
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">Maret</option>
              <option value="4">April</option>
              <option value="5">Mei</option>
              <option value="6">Juni</option>
              <option value="7">Juli</option>
              <option value="8">Agustus</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
              </select>
            </div>
    </div>
	    
    <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Tanggal Jatuh Tempo <?php echo form_error('kode_pembayaran') ?></label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Kode Pembayaran" value="<?php echo $tanggal; ?>"/>
            </div>
    </div>
    
        <div class="form-group">
        
            <label class="col-sm-2 control-label" for="varchar">Kode Kelas <?php echo form_error('kode_kelas') ?></label>
            <form action="" method="get">
            <div class="col-sm-6">
              <select name="kode_kelas" id="kode_kelas" class="form-control" onchange="load_data_temp();">
              <option value="" selected>Select an option</option>
              <?php foreach($this->db->get('kelas')->result() as $pilih_kelas):?>
              <option value="<?=$pilih_kelas->kode_kelas?>"><?=$pilih_kelas->kode_kelas?> | <?=$pilih_kelas->kelas?></option>
              <?php endforeach;?>
              </select>
            </div>
            <!-- <div class="col-sm-2">
              <a class="btn btn-danger btn-flat btn-md" onclick="load_data_temp();"><i class="fa fa-cogs"> Generate</i></a>
            </div> -->
            
       </div>
	   
        <input type="hidden" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
        <input type="hidden" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />

    <div class="form-group">
            <!-- <label class="col-sm-2 control-label" for="varchar">Kelas <?php echo form_error('kelas') ?></label> -->
            <div class="col-md-12">
                <input type="button" class="btn btn-primary btn-flat btn-block" value="Data Siswa" disabled/>
            </div>
    </div>
        <div class="form-group">
         
          <div class="table-responsive">
            <div id="list_ku">
              <img src="<?php echo base_url()?>image/loading.gif" width="30%" id="loading" style="float:inherit;display:block;position:relative; margin-left:400px;margin-right:400px;">
        </div>
    </div>
    </div>
	    
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pembayaran_spp') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
