<?php
 if($gambar['bulan']=="1"){
       $bulan="Januari";
     }elseif($gambar['bulan']=="2"){
      $bulan="Februari";
     }elseif($gambar['bulan']=="3"){
      $bulan="Maret";
     }elseif($gambar['bulan']=="4"){
      $bulan="April";
     }elseif($gambar['bulan']=="5"){
      $bulan="Mei";
     }elseif($gambar['bulan']=="6"){
      $bulan="Juni";
     }elseif($gambar['bulan']=="7"){
      $bulan="Juli";
     }elseif($gambar['bulan']=="8"){
      $bulan="Agustus";
     }elseif($gambar['bulan']=="9"){
      $bulan="September";
     }elseif($gambar['bulan']=="10"){
      $bulan="Oktober";
     }elseif($gambar['bulan']=="11"){
      $bulan="November";
     }elseif($gambar['bulan']=="12"){
        $bulan="Desember";
     }
    ?>

<div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Bukti Pembayaran Ekstrakurikuler </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Bukti Pembayaran Ekstrakurikuler </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
        <a href="<?php echo site_url('dashboard') ?>" class="btn btn-icon icon-left" style="background-color:#f522a4;color:white;"><i class="fa fa-arrow-left" ></i> Kembali</a>
        </div>
        <form action="<?php echo base_url('ekskul/hasread') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
              <div class="form-group">
              <label class="col-sm-2 control-label" for="varchar">Foto Bukti Pembayaran <?php echo form_error('nis') ?></label>
                <div class="col-sm-12" style="text-align:left;">
                    <a href ="<?php echo base_url().'image/'.$gambar['foto_ekskul']?>" target="_blank"><img src="<?php echo base_url().'image/'.$gambar['foto_ekskul']?>" alt="" width="280px;"></a>
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-4 control-label" for="varchar">Pembayaran Ekstrakurikuler Bulan <?php echo form_error('nis') ?></label>
              <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?=$bulan?>" readonly>
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label" for="varchar">Semester<?php echo form_error('nis') ?></label>
              <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?=$gambar['semester']?>" readonly>
                </div>
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label" for="varchar">Status Pembayaran <?php echo form_error('nis') ?></label>
              <div class="col-sm-12">
                    <input type="text" class="form-control" value="<?=$gambar['status_ekstrakurikuler']?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-12">
                    <input type="hidden" name="id" value="<?php echo $gambar['id']; ?>" /> 
                    <button type="submit" class="btn btn-primary"><span class="fa fa-check"></span> Tandai sudah dibaca</button> 
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>