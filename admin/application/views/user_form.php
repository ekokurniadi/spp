
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>User<small>Control Panel</small></h3>
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
                    <h2>User<small></small></h2>
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
            <label class="col-sm-2 control-label" for="varchar">Nama <?php echo form_error('nama') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Username <?php echo form_error('username') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Password <?php echo form_error('password') ?></label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
            </div>
    </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Role <?php echo form_error('role') ?></label>
            <div class="col-sm-6">
                <!-- <input type="text" class="form-control" name="role" id="role" placeholder="Role" value="<?php echo $role; ?>" /> -->
                <select name="role" id="role" class="form-control">
                  <option value="<?=$role?>">Select an option</option>
                  <option value="Admin">Admin</option>
                  <option value="Siswa">Siswa</option>
                </select>
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
	    <a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
