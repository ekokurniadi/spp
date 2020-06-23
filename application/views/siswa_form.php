
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Siswa </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Siswa </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Siswa </h4>
        </div>
        <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
              <div class="form-group">
                <!-- <label class="col-sm-2 control-label" for="varchar">Nis <?php echo form_error('nis') ?></label> -->
                <div class="col-sm-12">
                  <img src="<?php echo base_url().'image/'.$foto;?>" alt="Profile Picture" width="100px;">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nis <?php echo form_error('nis') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" readonly/>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama Siswa <?php echo form_error('nama_siswa') ?></label>
                <div class="col-sm-12">
                  <input type="text" readonly class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
                <div class="col-sm-12">
                  <input type="text" readonly class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Agama <?php echo form_error('agama') ?></label>
                <div class="col-sm-12">
                  <input type="text" readonly class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                <div class="col-sm-12">
                  <input type="text" readonly class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
                <div class="col-sm-12">
                  <input type="text" readonly class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
                </div>
              </div>
	      
              <div class="form-group">
                <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                <div class="col-sm-12">
                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">No Telp Orang Tua <?php echo form_error('no_telp_orang_tua') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="no_telp_orang_tua" id="no_telp_orang_tua" placeholder="No Telp Orang Tua" value="<?php echo $no_telp_orang_tua; ?>" />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Foto <?php echo form_error('foto') ?></label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><span class="fa fa-edit"></span><?php echo $button ?></button> 
	    <a href="<?php echo site_url('dashboard') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
