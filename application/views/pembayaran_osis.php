
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Pembayaran Osis </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Pembayaran Osis </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Upload Bukti Pembayaran </h4>
        </div>
        <form action="<?php echo base_url('pembayaran/proses_bayar_osis') ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Upload Bukti Pembayaran <?php echo form_error('nama_siswa') ?></label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="foto_osis" id="foto_osis" placeholder="Nama Siswa" />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span>Simpan</button> 
	    <a href="<?php echo site_url('osis') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
