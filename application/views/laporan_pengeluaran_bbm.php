<?php 
function mata_uang3($a){
  if(preg_match("/^[0-9,]+$/", $a)) $a = str_replace(',', '', $a);
    if(is_numeric($a) AND $a != 0 AND $a != ""){
      return number_format($a, 0, ',', '.');
    }else{
      return $a;
    }        
}
function bln($a){
  $bulan=$bl=$month=$a;
  switch($bulan)
  {
    case"1":$bulan="Januari"; break;
    case"2":$bulan="Februari"; break;
    case"3":$bulan="Maret"; break;
    case"4":$bulan="April"; break;
    case"5":$bulan="Mei"; break;
    case"6":$bulan="Juni"; break;
    case"7":$bulan="Juli"; break;
    case"8":$bulan="Agustus"; break;
    case"9":$bulan="September"; break;
    case"10":$bulan="Oktober"; break;
    case"11":$bulan="November"; break;
    case"12":$bulan="Desember"; break;
  }
  $bln = $bulan;
  return $bln;
}
?>
<style type="text/css">
.myTable1{
  margin-bottom: 0px;
}
.myt{
  margin-top: 0px;
}
.isi{
  height: 25px;
  padding-left: 4px;
  padding-right: 4px;  
}
</style>
<base href="<?php echo base_url(); ?>" />
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Rekap Laporan Bulanan 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rekap Laporan Bulanan</li>
      </ol>
    </section>

    <?php 
    if($set=="view"){
    ?>

    


<!-- column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo base_url('laporan_pdf/laporan_penyusutan_action')?>" method="post" class="form-horizontal">
	   
    <div class="box-body"> 
        <div class="form-group">
        <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Awal *</label>
                  <div class="col-sm-3">
                    <input type="text" id="tanggal2" name="spk_awal" class="form-control" placeholder="Tanggal Awal" autocomplete="off">
                  </div>
                  <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Akhir *</label>
                  <div class="col-sm-3">
                    <input type="text" id="tanggal3" name="spk_akhir" class="form-control" placeholder="Tanggal Akhir" autocomplete="off">
                  </div> 
                  <div class="col-sm-2">
                    <button type="button" onclick="getReport()" name="process" value="edit" class="btn bg-maroon btn-flat"><i class="fa fa-print"></i> Preview</button>                                  
                  </div>       
        </div>
    </div>    
<div class="box-footer">
<div style="min-height: 600px">                 
                  <iframe style="overflow: auto; border: 0px solid #fff; width: 100%; height: 700px;margin-bottom: -5px;" id="showReport"></iframe>
                </div>
	
</div>
</form>
</div>
</div>
</div>


    
    <?php }elseif ($set=='cetak') { ?>
        <!doctype html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
               
                
            }
            .word-table th{
                border:1px solid black !important; 
                padding: 5px 10px;
                background-color:yellow;
                
            }
        </style>
    </head>
    <body>
      <?php if($tanggal2 != ''){ ?>
        <table>
          <tr>
            <td></td>
          </tr>
        </table>
        <img src="assets_log/img/index.png" alt="Metis Logo" style="width:40px"><br><p style="font-size:9px">Dinas Lingkungan Hidup Kota Jambi
       <br>Jl. H. Agus Salim No.07, Handil Jaya, Kec. Kota Baru, Kota Jambi, Jambi 36125</p>
       <br>
       <br>
     
        <div style="text-align: center;font-size: 13pt"><b>Laporan Pengeluaran BBM</b></div>        
        <!-- <div style="text-align: center; font-weight: bold;">Bulan : <?php echo $tgl ?></div> -->
        <hr>      
        <table border="0" width="100%">
          <tr>
            <td style="text-align: left;font-size: 12px">Periode : <?php echo $tanggal2 ?> s/d <?php echo $tanggal3 ?></td>                     
          </tr>          
        </table>
        <br>
        <br>
        <br>
        <table class='word-table' style='font-size: 8pt' width='100%'>
          
        <thead>
                <tr>
                 
                    <th>No</th>
                    <th>Id Kendaraan</th>
                    <th>No Plat</th>
                    <th>Jenis Kendaraan</th>
                    <th>Lokasi</th>
                    <th>Nama Sopir</th>
                    <th>BBM</th>
                    <th>Jumlah</th>
                </tr>
                </thead>
          <?php 
          $no=1;
          
          $sql = $this->db->query("select b.*,c.*,d.*,a.id,a.kode_operasi from operasi a join detail_operasi b on b.kode_operasi=a.kode_operasi join kendaraan c on b.id_kendaraan =c.id_kendaraan join lokasi_operasional d on b.id_lokasi=d.id_lokasi where a.tanggal BETWEEN '$tanggal2' AND '$tanggal3' order by b.id_kendaraan ASC;");
          $period_array = array();
          foreach ($sql->result() as $row) {
            $period_array[] = intval($row->jumlah);
                        
            echo "
               
                <tbody>
              <tr>
                <td>$no</td>
                <td>$row->id_kendaraan</td>
                <td width='70px'>$row->no_plat</td>
                <td width='70px'>$row->jenis_kendaraan</td>                
                <td width='120px'>$row->lokasi_awal-$row->lokasi_akhir</td>
                <td width='70px'>$row->nama_sopir</td>                
                <td>$row->bbm</td>                
                <td>$row->jumlah Liter</td>                
              </tr>
              </tbody>
            ";
            $no++;
          }
          ?>
        <tfoot>
        <tr>
          <td colspan="7" style="text-align:right;">Total :</td>
          <td><?php echo number_format($total=array_sum($period_array))?> Liter</td>
        </tr>
        </tfoot>
        
        </table> <br>
        <br><br><br>
   
       <p style="text-align:right; font-size:13px; padding-right:50px;">Mengetahui</p>
       <p style="text-align:right; font-size:13px; padding-right:13px;">Kepala DLH Kota Jambi</p>
       <br>
       <br>
       <br>
       <br>
       <br>
     
       <p style="text-align:right; font-size:13px; text-decoration:underline;">Dr. H. Ardi, SP, M. Si <br>NIP:19700612 199803 1 004</p>
   
      <?php }else{ ?>
        <p>Tanggal Harus ditentukan dulu.</p>
      <?php } ?>                
    </body>
  </html>
  <?php } ?>
  </section>
</div>
 


<script>
function getReport(){
  var value={tanggal2:document.getElementById("tanggal2").value,
            tanggal3:document.getElementById("tanggal3").value,            
            cetak:'cetak',
            //tipe:getRadioVal(document.getElementById("frm"),"tipe"),
            }

  if (value.tanggal2 == '' && value.tanggal3 == '') {
    alert('Isi data dengan lengkap ..!');
    return false;
  }else{
    //alert(value.tipe);
    $('.loader').show();
    $('#btnShow').disabled;
    $("#showReport").attr("src",'<?php echo site_url("laporan_pdf/index2?") ?>cetak='+value.cetak+'&tanggal2='+value.tanggal2+'&tanggal3='+value.tanggal3);
    document.getElementById("showReport").onload = function(e){          
    $('.loader').hide();       
    };
  }
}
</script>
