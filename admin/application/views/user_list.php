
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>User<small></small></h3>
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

       <div class="clearfix"></div>


         <div class="col-md-12 col-sm-6 col-xs-12">
           
           <div class="x_panel">
           <div class="x_panel">
           <div class="col-md-12">
             <?php echo anchor(site_url('user/create'),'Create', 'class="btn btn-primary"'); ?>
             <div class="card-body">
              <?php                       
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {                    
                  ?>                  
                <div class="alert alert-<?php echo $_SESSION['tipe'] ?> alert-dismissable">
                    <strong><?php echo $_SESSION['pesan'] ?></strong>
                    <button class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>  
                    </button>
                </div>
                <?php
                }
                $_SESSION['pesan'] = '';        
                ?>
                </div>
             </div>
             <div class="x_title">
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
             <table id="example1" class="table table-bordered table-striped">
       <thead>
       <tr>
           <th>#</th>
		<th>Nama</th>
		<th>Username</th>
		<th>Password</th>
		<th>Role</th>
		<th>Foto</th>
		<th>Action</th>
       </tr>
       </thead>  
       <tbody><?php
       foreach ($user_data as $user)
       {
           ?>
         
           <tr>
			<td width="20px"><?php echo ++$start ?></td>
			<td><?php echo $user->nama ?></td>
			<td><?php echo $user->username ?></td>
			<td><?php echo sha1($user->password) ?></td>
			<td><?php echo $user->role ?></td>
			<td style="text-align:center;"><img src="<?php echo base_url()."image/".$user->foto ?>" alt="" width="120px"></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('user/read/'.$user->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); 
				echo '  '; 
				echo anchor(site_url('user/update/'.$user->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				echo '  '; 
				echo anchor(site_url('user/delete/'.$user->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin Ingin hapus data ?\')"'); 
				?>
			</td>
		</tr>
           <?php
       }
       ?>
       </tbody>
       <tfoot>
           
           </tfoot>
   </table>

             </div>
           </div>
         </div>                       
       
       
       <div class="row">
       <div class="col-md-6">
           <a href="#" class="btn btn-primary" style="padding-left:20px;">Total Data : <?php echo $total_rows ?></a>
	    </div>
       <div class="col-md-6 text-right">
          <!-- <?php echo $pagination ?> -->
       </div>

     </div>
     </div>
   </div>
   </div>
   <!-- /page content -->

   