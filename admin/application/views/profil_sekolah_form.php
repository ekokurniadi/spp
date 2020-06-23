
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Profil_sekolah<small>Control Panel</small></h3>
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
                    <h2>Profil_sekolah<small></small></h2>
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
            <label class="col-sm-2 control-label" for="varchar">Nama Sekolah <?php echo form_error('nama_sekolah') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" placeholder="Nama Sekolah" value="<?php echo $nama_sekolah; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Email <?php echo form_error('email') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
            </div>
    </div>
	    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <div class="col-sm-6">
                <textarea class="ckeditor" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nomor Telp <?php echo form_error('nomor_telp') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nomor_telp" id="nomor_telp" placeholder="Nomor Telp" value="<?php echo $nomor_telp; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Pimpinan <?php echo form_error('nama_pimpinan') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_pimpinan" id="nama_pimpinan" placeholder="Nama Pimpinan" value="<?php echo $nama_pimpinan; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Logo Kop <?php echo form_error('logo_kop') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="logo_kop" id="logo_kop" placeholder="Logo Kop" value="<?php echo $logo_kop; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Active <?php echo form_error('active') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
            </div>
    </div>
	    
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('profil_sekolah') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
