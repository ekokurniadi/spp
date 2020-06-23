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
            <h4>Laporan Penerimaan Barang Per-Supplier </h4>
        </div>
        <form action="<?php echo base_url('laporan_pdf/laporan_penerimaan')?>" method="post" class="form-horizontal">
	   
        <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Suplier </label>
                <div class="col-sm-12">
                <select name="sup" id="sup" class="form-control">
                    <option value="">Select an Option</option>
                    <?php $sup=$this->db->query("SELECT * FROM supplier")->result();?>
                    <?php foreach($sup as $s):?>
                    <option value="<?=$s->kode_supplier?>"><?=$s->kode_supplier?> | <?=$s->nama_supplier?></option>
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
         <?php if($sup != ''){ ?>
           <table>
             <tr>
               <td></td>
             </tr>
           </table>
           <img src="image/images.png" alt="Metis Logo" style="width:80px"><br><br><p style="font-size:11px">PT INTI CAKRAWALA CITRA
          <br>Samping Terminal Truck, Jl. Lingkar Selatan, Kenali Asam Bawah,<br>  Kec. Kota Baru,Kota Jambi, Jambi 36129</p>
          <br>
          <br>
        
           <div style="text-align: center;font-size: 13pt"><b>LAPORAN PENERIMAAN BARANG PER SUPPLIER</b></div>        
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
           <?php $data=$this->db->query("SELECT * from penerimaan_barang where kode_supplier ='$sup'")->row_array();
           $kode_sup=$data['kode_supplier'];
           ?>
            <table style="font-size:10px;">
              <tr>
                <td> Kode Supplier</td>
                <td>:</td>
                <td><?php echo $data['kode_supplier']?></td>
               
              </tr>
              <tr>
                <td>Nama Supplier</td>
                <td>:</td>
                <td><?=$data['nama_supplier']?></td>
              </tr>
            </table>

           <table class='word-table' style='font-size: 8pt' width='100%'>
             
           <thead>
                   <tr>
                    
                       <th>No</th>
                       <th>Kode Penerimaan</th>
                       <th>Tanggal</th>
                       <th>Kode Barang</th>
                       <th>Nama Barang</th>
                       <th>Satuan Barang</th>
                       <th>QTY</th>
                   </tr>
                   </thead>
                   <?php $data2=$this->db->query("SELECT a.*,b.* from penerimaan_barang a join detail_penerimaan b on a.kode_penerimaan=b.kode_penerimaan where a.kode_supplier='$sup'")->result();?>
                   <?php $no=1; foreach($data2 as $dt):?>
                   <tr style="text-align:center;">
                    <td><?=$no++;?></td>
                    <td><?=$dt->kode_penerimaan;?></td>
                    <td><?=tgl_indo($dt->tanggal)?></td>
                    <td><?=$dt->kode_barang?></td>
                    <td><?=$dt->nama_barang?></td>
                    <td><?=$dt->satuan?></td>
                    <td><?=$dt->qty?></td>
                   </tr>
                   <?php endforeach;?>
           <tfoot>
          
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
  var value={sup:document.getElementById("sup").value,            
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
    $("#showReport").attr("src",'<?php echo site_url("laporan_pdf/index3?") ?>cetak='+value.cetak+'&sup='+value.sup);
    document.getElementById("showReport").onload = function(e){          
    $('.loader').hide();       
    };
  }
}
</script>
