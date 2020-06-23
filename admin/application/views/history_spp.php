
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>History Pembayaran SPP<small></small></h3>
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
           <div class="col-md-12">
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
		<th>NIS</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Bulan</th>
		<th>Semester</th>
		<th>Biaya SPP</th>
		<th>Action</th>
       </tr>
       </thead>  
       <tbody><?php
       $start=0;
       foreach ($data_spp as $komite)
       {
           ?>
         
           <tr>
			<td width="20px"><?php echo ++$start ?></td>
			<td><?php echo $komite->nis ?></td>
			<td><?php echo $komite->nama ?></td>
			<td><?php echo $komite->kelas ?></td>
			<td><?php echo $komite->bulan ?></td>
			<td><?php echo $komite->semester ?></td>
			<td><?php echo "Rp.". number_format($komite->biaya_spp) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pembayaran/cetak_spp/'.$komite->nis),'<i class="fa fa-print"></i>Cetak Bukti Pembayaran',array('title'=>'detail','class'=>'btn btn-success btn-sm','target'=>'_blank')); 
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
         </div>
         </div>                 
   </div>
   <!-- /page content -->

   