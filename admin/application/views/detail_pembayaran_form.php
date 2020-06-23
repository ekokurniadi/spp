
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Detail_pembayaran<small>Control Panel</small></h3>
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
                    <h2>Detail_pembayaran<small></small></h2>
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
            <label class="col-sm-2 control-label" for="varchar">Kode Pembayaran <?php echo form_error('kode_pembayaran') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_pembayaran" id="kode_pembayaran" placeholder="Kode Pembayaran" value="<?php echo $kode_pembayaran; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Semester <?php echo form_error('semester') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="int">Bulan <?php echo form_error('bulan') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Kelas <?php echo form_error('kode_kelas') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Kode Kelas" value="<?php echo $kode_kelas; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kelas <?php echo form_error('kelas') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nis <?php echo form_error('nis') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Biaya Spp <?php echo form_error('biaya_spp') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="biaya_spp" id="biaya_spp" placeholder="Biaya Spp" value="<?php echo $biaya_spp; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Status Spp <?php echo form_error('status_spp') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="status_spp" id="status_spp" placeholder="Status Spp" value="<?php echo $status_spp; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Biaya Osis <?php echo form_error('biaya_osis') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="biaya_osis" id="biaya_osis" placeholder="Biaya Osis" value="<?php echo $biaya_osis; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Status Osis <?php echo form_error('status_osis') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="status_osis" id="status_osis" placeholder="Status Osis" value="<?php echo $status_osis; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="date">Tanggal Jatuh Tempo <?php echo form_error('tanggal_jatuh_tempo') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tanggal_jatuh_tempo" id="tanggal_jatuh_tempo" placeholder="Tanggal Jatuh Tempo" value="<?php echo $tanggal_jatuh_tempo; ?>" />
            </div>
    </div>
	    
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('detail_pembayaran') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
