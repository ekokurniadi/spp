
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Siswa<small>Control Panel</small></h3>
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
                    <h2>Siswa<small></small></h2>
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
                    <form action="<?php echo $action; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nis <?php echo form_error('nis') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Siswa <?php echo form_error('nama_siswa') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <div class="col-sm-6">
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
              <option value="<?=$jenis_kelamin?>">Select an option</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
              </select>
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Agama <?php echo form_error('agama') ?></label>
            <div class="col-sm-6">
            <select name="agama" id="agama" class="form-control">
              <option value="<?=$agama?>">Select an option</option>
              <option value="Islam">Islam</option>
              <option value="Kristen">Kristen</option>
              <option value="Budha">Budha</option>
              <option value="Hindu">Hindu</option>
              <option value="Konghucu">Konghucu</option>
              </select>
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
            </div>
    </div>
	    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <div class="col-sm-6">
                <textarea class="ckeditor" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">No Telp Orang Tua <?php echo form_error('no_telp_orang_tua') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_telp_orang_tua" id="no_telp_orang_tua" placeholder="No Telp Orang Tua" value="<?php echo $no_telp_orang_tua; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Foto <?php echo form_error('foto') ?></label>
            <div class="col-sm-6">
                <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
            </div>
    </div>
	    
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
