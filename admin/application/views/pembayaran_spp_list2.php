
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Pembayaran Komite<small></small></h3>
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
           <div class="col-md-4">
             <?php echo anchor(site_url('pembayaran_spp/create'),'Create', 'class="btn btn-primary"'); ?>
             <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
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
		<th>Kode Pembayaran</th>
		<th>Tanggal Jatuh Tempo</th>
		<th>Semester</th>
		<th>Bulan</th>
		<th>Kode Kelas</th>
		<th>Kelas</th>
		<!-- <th>Status</th> -->
		<th>Action</th>
       </tr>
       </thead>  
       <tbody><?php
       foreach ($pembayaran_spp_data as $pembayaran_spp)
       {
           ?>
         
           <tr>
			<td width="50px"><?php echo ++$start ?></td>
			<td><?php echo $pembayaran_spp->kode_pembayaran ?></td>
      <td><?php echo tgl_indo($pembayaran_spp->tanggal_jatuh_tempo) ?></td>
     <?php if($pembayaran_spp->bulan=="1"){
       $bulan="Januari";
     }elseif($pembayaran_spp->bulan=="2"){
      $bulan="Februari";
     }elseif($pembayaran_spp->bulan=="3"){
      $bulan="Maret";
     }elseif($pembayaran_spp->bulan=="4"){
      $bulan="April";
     }elseif($pembayaran_spp->bulan=="5"){
      $bulan="Mei";
     }elseif($pembayaran_spp->bulan=="6"){
      $bulan="Juni";
     }elseif($pembayaran_spp->bulan=="7"){
      $bulan="Juli";
     }elseif($pembayaran_spp->bulan=="8"){
      $bulan="Agustus";
     }elseif($pembayaran_spp->bulan=="9"){
      $bulan="September";
     }elseif($pembayaran_spp->bulan=="10"){
      $bulan="Oktober";
     }elseif($pembayaran_spp->bulan=="11"){
      $bulan="November";
     }elseif($pembayaran_spp->bulan=="12"){
      $bulan="Desember";
     }
       ?>
			<td><?php echo $pembayaran_spp->semester ?></td>
			<td><?php echo $bulan ?></td>
			<td><?php echo $pembayaran_spp->kode_kelas ?></td>
			<td><?php echo $pembayaran_spp->kelas ?></td>
			<!-- <td><?php echo $pembayaran_spp->status ?></td> -->
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pembayaran_spp/read/'.$pembayaran_spp->id),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-default btn-sm')); 
				echo '  '; 
				echo anchor(site_url('pembayaran_spp/update/'.$pembayaran_spp->id),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-warning btn-sm')); 
				echo '  '; 
				echo anchor(site_url('pembayaran_spp/delete/'.$pembayaran_spp->id),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Yakin Ingin hapus data ?\')"'); 
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
   <!-- /page content -->

   