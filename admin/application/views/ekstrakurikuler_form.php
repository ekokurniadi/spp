
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Ekstrakurikuler <small>Control Panel</small></h3>
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
                    <h2>Ekstrakurikuler<small></small></h2>
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
            <label class="col-sm-2 control-label" for="varchar">Kode Kelas <?php echo form_error('kode_kelas') ?></label>
            <div class="col-sm-6">
                <!-- <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Kode Kelas" value="<?php echo $kode_kelas; ?>" /> -->
            <select name="kode_kelas" id="kode_kelas" class="form-control">
              <option value="<?=$kode_kelas?>">Select an option</option>
              <?php foreach($pilih_kelas as $pk):?>
              <option value="<?=$pk->kode_kelas?>"><?=$pk->kode_kelas?>  | <?=$pk->kelas?></option>
              <?php endforeach;?>
            </select>
            
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kelas <?php echo form_error('kelas') ?></label>
            <div class="col-sm-6">
                <input type="text" readonly class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Biaya ekstrakurikuler <?php echo form_error('biaya_ekstrakurikuler') ?></label>
            <div class="col-sm-6">
                <input type="text" oninput="masking();" class="form-control" name="biaya_ekstrakurikuler" id="biaya_ekstrakurikuler" placeholder="Biaya ekstrakurikuler" value="<?php echo $biaya_ekstrakurikuler; ?>" />
            </div>
    </div>
	    
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('ekstrakurikuler') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="jquery.masknumber.js"></script>

<script type="text/javascript">


// ambil data jenis potongan
$(document).ready(function(){

$('#kode_kelas').change(function(){    
var kode_kelasnya = $('#kode_kelas').val(); 

 $.ajax({      
    method: "POST",      
    url: "<?php echo base_url('ekstrakurikuler/ambil_kelas')?>", 
    dataType:'json',   // file PHP yang akan merespon ajax
    data: { kode_kelas: kode_kelasnya}
   
  })
    .done(function( hasilajax) {   
      $("#kelas").val(hasilajax.kelas);

    });
 })
});

// ambil nama karyawan,jabatan dan juga gaji pokok
$(document).ready(function(){

$('#nik').change(function(){    
var niknya = $('#nik').val(); 

 $.ajax({      
    method: "POST",      
    url: "<?php echo base_url('bpjs/ambil_data_karyawan')?>", 
    dataType:'json',  
    data: { nik: niknya}
   
  })
    .done(function( hasilajax2) {   
      $("#nama_karyawan").val(hasilajax2.nama_karyawan);
      $("#gaji_pokok").val(hasilajax2.gaji_pokok);

    });
 })
});

// fungsi pemotongan nominal bpjs
function potong_bpjs() {
      var txtFirstNumberValue = $('#gaji_pokok').val();
      var txtSecondNumberValue = $('#persentase_potongan').val();
    //   fungsi pengecekan stok
      if(txtFirstNumberValue < txtSecondNumberValue || txtFirstNumberValue < 0)
         {
            alert('Oopps,Something went wrong');
            document.getElementById('gaji_pokok').value=txtFirstNumberValue;
            document.getElementById('persentase_potongan').value=0;
                    document.getElementById("persentase_potongan").focus();
        } else {
            var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue))/100;
                if (!isNaN(result)) {
                    document.getElementById('potongan').value = result;
                }else{
                    document.getElementById('potongan').value=0;     
                }
        }
    }

    function masking(){
      $('#biaya_ekstrakurikuler').maskNumber();
    }
</script>

<!--  -->