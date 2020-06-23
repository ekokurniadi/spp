
 <div class="main-content">
<section class="section">
  <div class="section-header">
    <h1> Pembayaran osis </h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></div>
      <div class="breadcrumb-item"><a href="#"> Pembayaran osis </a></div>
    </div>
  </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                <div class="card-header">
                  <div class="col-12">
                    <a href="<?php echo base_url('osis/history_osis')?>" class="btn btn-icon icon-left btn-primary"><i class="fa fa-history"></i> History Pembayaran Osis</a>
                </div>
                </div>
                  <div class="card-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>No</th>
                            <th>Semester</th>
                            <th>Bulan</th>
                            <th>Kelas</th>
                            <th>Nominal Pembayaran</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Status</th>
		<th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $start=1;
                    foreach ($data_spp as $spp)
                    {
                        ?>
                          <tr>
			<td width="80px"><?php echo $start++ ?></td>
			<td><?php echo $spp->semester ?></td>
            <?php if($spp->bulan=="1"){
       $bulan="Januari";
     }elseif($spp->bulan=="2"){
      $bulan="Februari";
     }elseif($spp->bulan=="3"){
      $bulan="Maret";
     }elseif($spp->bulan=="4"){
      $bulan="April";
     }elseif($spp->bulan=="5"){
      $bulan="Mei";
     }elseif($spp->bulan=="6"){
      $bulan="Juni";
     }elseif($spp->bulan=="7"){
      $bulan="Juli";
     }elseif($spp->bulan=="8"){
      $bulan="Agustus";
     }elseif($spp->bulan=="9"){
      $bulan="September";
     }elseif($spp->bulan=="10"){
      $bulan="Oktober";
     }elseif($spp->bulan=="11"){
      $bulan="November";
     }elseif($spp->bulan=="12"){
      $bulan="Desember";
     }
       ?>
			<td><?php echo $bulan ?></td>
			<td><?php echo $spp->kelas ?></td>
			<td>Rp.<?php echo number_format($spp->biaya_osis,0,',','.') ?></td>
			<td><?php echo tgl_indo($spp->tanggal_jatuh_tempo) ?></td>
			<td><?php echo $spp->status_osis ?></td>
			<td style="text-align:center" width="200px">
        <?php 
         if($spp->status_osis=='Lunas' or $spp->status_osis=='Menunggu Konfirmasi'){
          echo '  '; 
        }
        else if($spp->status_osis=='Belum Lunas')
        {
          echo anchor(site_url('pembayaran/bayar_osis/'.$spp->id),'<i class="fa fa-upload"></i> Bayar Sekarang',array('title'=>'edit','class'=>'btn btn-icon icon-left btn-success')); 
        }
        else if($spp->status_osis=='Invalid')
        {
          echo anchor(site_url('pembayaran/bayar_osis/'.$spp->id),'<i class="fa fa-upload"></i> Upload Ulang Bukti Pembayaran',array('title'=>'edit','class'=>'btn btn-icon icon-left btn-danger'));  
        } 
				?>
			</td>
		</tr>
                          <?php
                      }
                      ?>
             </tbody>       
                    </table>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                  <!-- <?php echo $pagination ?> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="row">
        <div class="col-md-6">
            <!-- <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a> -->
            
	    </div>
       
    </div>
      </div>

      