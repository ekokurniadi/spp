
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Stok </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Stok </a></div>
    </div>
  </div>

  <div class="section-body">
  <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
        <div class="card-header">
            <h4>Form Stok </h4>
        </div>
        <form class="form-horizontal">
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kode Kategori <?php echo form_error('kode_kategori') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kode_kategori" id="kode_kategori" placeholder="Kode Kategori" value="<?php echo $kode_kategori; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kategori <?php echo form_error('kategori') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Kode Barang <?php echo form_error('kode_barang') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang" value="<?php echo $kode_barang; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="varchar">Satuan <?php echo form_error('satuan') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo $satuan; ?>" readonly />
                </div>
              </div>
	   
              <div class="form-group">
                <label class="col-sm-2 control-label" for="int">Qty <?php echo form_error('qty') ?></label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" readonly />
                </div>
              </div>
	   
     
        <div class="card-footer text-left">
        <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <a href="<?php echo site_url('stok') ?>" class="btn btn-icon icon-left btn-success">Cancel</a>
	
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
