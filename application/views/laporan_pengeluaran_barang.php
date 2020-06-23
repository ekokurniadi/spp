<div class="main-content">
<section class="section">
  <?php 
    if($set=="view"){
    ?>
  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Laporan Pengeluaran Barang </h4>
        </div>
        <form action="<?php echo base_url('laporan_pdf/laporan_penerimaan')?>" method="post" class="form-horizontal">
	   
        <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kode Pengeluaran</label>
                <div class="col-sm-12">
                <select name="fak" id="fak" class="form-control">
                    <option value="">Select an Option</option>
                    <?php $fak=$this->db->query("SELECT * FROM pengeluaran_barang group by kode_pengeluaran")->result();?>
                    <?php foreach($fak as $f):?>
                    <option value="<?=$f->kode_pengeluaran?>"><?=$f->kode_pengeluaran?></option>
                    <?php endforeach;?>
                </select>
                </div>
              </div>
	   
              <div class="card-footer text-left">
	         <button type="button" onclick="getReport()" name="process" value="edit" class="btn btn-danger btn-flat"><i class="fa fa-print"></i> Preview</button>   
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
         <?php if($fak != ''){ ?>
           <table>
             <tr>
               <td></td>
             </tr>
           </table>
           <img src="image/images.png" alt="Metis Logo" style="width:80px"><br><br><p style="font-size:11px">PT INTI CAKRAWALA CITRA
          <br>Samping Terminal Truck, Jl. Lingkar Selatan, Kenali Asam Bawah,<br>  Kec. Kota Baru,Kota Jambi, Jambi 36129</p>
          <br>
          <br>
        
           <div style="text-align: center;font-size: 13pt"><b>LAPORAN PENGELUARAN BARANG</b></div>        
           <!-- <div style="text-align: center; font-weight: bold;">Bulan : <?php echo $tgl ?></div> -->
           <hr>      
           <!-- <table border="0" width="100%">
             <tr>
               <td style="text-align: left;font-size: 12px">Periode : <?php echo tgl_indo($tanggal2) ?> s/d <?php echo tgl_indo($tanggal3) ?></td>                     
             </tr>          
           </table> -->
           <br>
           <br>
           <br>
           <?php $data=$this->db->query("SELECT * from pengeluaran_barang where kode_pengeluaran ='$fak'")->row_array();
         
           ?>
            <table style="font-size:10px;">
              <tr>
                <td> Kode Pengeluaran</td>
                <td>:</td>
                <td><?php echo $data['kode_pengeluaran']?></td>
               
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><?=tgl_indo($data['tanggal'])?></td>
              </tr>
            </table>

           <table class='word-table' style='font-size: 8pt' width='100%'>
             
           <thead>
                   <tr>
                    
                       <th>No</th>
                       <th>Tanggal</th>
                       <th>Kode Barang</th>
                       <th>Nama Barang</th>
                       <th>Satuan Barang</th>
                       <th>QTY</th>
                   </tr>
                   </thead>
                   <?php $data2=$this->db->query("SELECT a.*,b.* from pengeluaran_barang a join detail_pengeluaran b on a.kode_pengeluaran=b.kode_pengeluaran where a.kode_pengeluaran='$fak'")->result();
                     $period_array = array();
                   ?>
                   <?php $no=1; foreach($data2 as $dt):?>
                   <?php  $period_array[] = intval($dt->qty);?>
                   <tr style="text-align:center;">
                    <td><?=$no++;?></td>
                    <td><?=tgl_indo($dt->tanggal)?></td>
                    <td><?=$dt->kode_barang?></td>
                    <td><?=$dt->nama_barang?></td>
                    <td><?=$dt->satuan?></td>
                    <td><?=$dt->qty?></td>
                   </tr>
                   <?php endforeach;?>
           <tfoot>
                <tr>
                    <td colspan='5' style="text-align:right;">Total Barang :</td>
                    <td><?php echo number_format($total=array_sum($period_array))?></td>
                </tr>
           </tfoot>
           
           </table> <br>
           <br><br><br>
      
          <p style="text-align:right; font-size:13px; padding-right:50px;">Mengetahui</p>
          <p style="text-align:right; font-size:13px; padding-right:55px;">Manager</p>
          <br>
          <br>
          <br>
          <br>
          <br>
        
          <p style="text-align:right; font-size:13px;">( -------------------------- ) <br></p>
      
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
  var value={fak:document.getElementById("fak").value,            
            cetak:'cetak',
            //tipe:getRadioVal(document.getElementById("frm"),"tipe"),
            }

  if (value.sup == '') {
    alert('Isi data dengan lengkap ..!');
    return false;
  }else{
    //alert(value.tipe);
    $('.loader').show();
    $('#btnShow').disabled;
    $("#showReport").attr("src",'<?php echo site_url("laporan_pdf/index4?") ?>cetak='+value.cetak+'&fak='+value.fak);
    document.getElementById("showReport").onload = function(e){          
    $('.loader').hide();       
    };
  }
}
</script>
