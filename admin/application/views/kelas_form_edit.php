
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Kelas<small>Control Panel</small></h3>
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
                    <h2>Kelas<small></small></h2>
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
                    <form action="<?php echo base_url('kelas/create_action2')?>" method="post" class="form-horizontal">
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Kelas <?php echo form_error('kode_kelas') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_kelas" id="kode_kelas" placeholder="Kode Kelas" value="<?php echo $kode; ?>" readonly/>
            </div>
      </div>
	   
    
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kelas <?php echo form_error('kelas') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>"  />
            </div>
    </div>
        <div class="form-group">
            <!-- <label class="col-sm-2 control-label" for="varchar">Kelas <?php echo form_error('kelas') ?></label> -->
            <div class="col-sm-12">
                <input type="button" class="btn btn-primary btn-flat btn-block" value="Data Siswa" disabled/>
            </div>
    </div>
        <div class="form-group">
            <div class="col-sm-12">
            <table id="example1" class="table table-striped table-bordered table-hover">
            <thead>
   <tr>
   <th>No</th>
   <th>NIS</th>
   <th>Nama Siswa</th>
   <th>Pilih</th>
   </tr>  
   </thead>
   <tbody>
   <?php
   $no=1;
   foreach($this->db->query('SELECT * from siswa')->result() as $data):?>
   <?php $data2 = $this->db->query("SELECT * FROM detail_kelas where nis='$data->nis'")->result();?>
   <?php 
   foreach($data2 as $dck){
     $cek=$dck->nis;
   }?>
    <tr>
        <td width="10px"><?php echo $no?></td>
        <td><?php echo $data->nis?></td>
        <td><?php echo $data->nama_siswa?></td>
        <td><input type="checkbox" name="kg[]" value="<?php echo $data->nis?>" <?php if($dck->nis == $data->nis){echo "checked disabled";}?>></td>
    </tr>
<?php 
$no++;
endforeach;?>
</tbody>
   </table>     <!-- <input type="button" class="btn btn-danger btn-flat btn-block" value="Data Siswa"/> -->
            </div>
    </div>
	    
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success">Save</button> 
	    <a href="<?php echo site_url('kelas') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
        </div>
