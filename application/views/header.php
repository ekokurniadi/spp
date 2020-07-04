<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

   <!-- CSS Libraries -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link href="<?php echo base_url()?>admin/sources/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/sources/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/sources/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/sources/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>admin/sources/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo base_url().'image/o.png'?>">

  <!-- load library chart js -->
<!--   
  <script src="<?php echo base_url() ?>plugin/chartjs/Chart.js">
  <script src="<?php echo base_url() ?>plugin/chartjs/Chart.min.js"> -->

  <!-- load jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/components.css">

  <!-- komponen text area -->
  <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>    

 
</head>
<?php date_default_timezone_set('Asia/Jakarta');?>
<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep "><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <?php $id_siswa=$_SESSION['nis'];
            $date=date('Y-m-d');
            ?>
          
            <?php $notif_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Belum Lunas' and tanggal_jatuh_tempo <= '$date'");?>
                <?php $notif_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Belum Lunas' and tanggal_jatuh_tempo <= '$date' ");?>
                <?php $notif_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Belum Lunas' and tanggal_jatuh_tempo <= '$date'");?>

                <?php $invalid_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Invalid'");?>
                <?php $invalid_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Invalid'");?>
                <?php $invalid_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Invalid'");?>

                <?php $lunas_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Lunas' and flag_spp ='0'");?>
                <?php $lunas_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Lunas' and flag_osis ='0'");?>
                <?php $lunas_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Lunas' and flag_eks ='0'");?>

                <?php $w_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Menunggu Konfirmasi'");?>
                <?php $w_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Menunggu Konfirmasi'");?>
                <?php $w_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Menunggu Konfirmasi'");?>
              <div class="dropdown-header">
              <?php $total=$notif_spp->num_rows() + $notif_osis->num_rows() + $notif_eks->num_rows() + $invalid_spp->num_rows() + $invalid_osis->num_rows() + $invalid_eks->num_rows() + $lunas_spp->num_rows() + $lunas_osis->num_rows() + $lunas_eks->num_rows() + $w_spp->num_rows() + $w_osis->num_rows() + $w_eks->num_rows();?>
              <?php echo $total;?> Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
            
              <div class="dropdown-list-content dropdown-list-icons">
                <?php $notif_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Belum Lunas' and tanggal_jatuh_tempo <= '$date'")->result();?>
                <?php $notif_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Belum Lunas' and tanggal_jatuh_tempo <= '$date'")->result();?>
                <?php $notif_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Belum Lunas' and tanggal_jatuh_tempo <= '$date'")->result();?>

                <?php $invalid_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Invalid'")->result();?>
                <?php $invalid_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Invalid'")->result();?>
                <?php $invalid_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Invalid'")->result();?>

                <?php $lunas_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Lunas' and flag_spp ='0'")->result();?>
                <?php $lunas_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Lunas' and flag_osis ='0'")->result();?>
                <?php $lunas_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Lunas' and flag_eks ='0'")->result();?>

                <?php $w_spp =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_spp='Menunggu Konfirmasi'")->result();?>
                <?php $w_osis =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_osis='Menunggu Konfirmasi'")->result();?>
                <?php $w_eks =$this->db->query("select * from detail_pembayaran where nis='$id_siswa' and status_ekstrakurikuler='Menunggu Konfirmasi'")->result();?>

                <?php if($notif_spp){?>

                  <?php foreach($notif_spp as $psn):?>
                <?php if($psn->bulan=="1"){
                  $bulan="Januari";
                }elseif($psn->bulan=="2"){
                  $bulan="Februari";
                }elseif($psn->bulan=="3"){
                  $bulan="Maret";
                }elseif($psn->bulan=="4"){
                  $bulan="April";
                }elseif($psn->bulan=="5"){
                  $bulan="Mei";
                }elseif($psn->bulan=="6"){
                  $bulan="Juni";
                }elseif($psn->bulan=="7"){
                  $bulan="Juli";
                }elseif($psn->bulan=="8"){
                  $bulan="Agustus";
                }elseif($psn->bulan=="9"){
                  $bulan="September";
                }elseif($psn->bulan=="10"){
                  $bulan="Oktober";
                }elseif($psn->bulan=="11"){
                  $bulan="November";
                }elseif($psn->bulan=="12"){
                  $bulan="Desember";
                }?>

                <a href="<?php echo base_url('spp')?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-warning text-white">
                    <i class="fas fa-info"></i>
                  </div>
                    <div class="dropdown-item-desc">
                        Pembayaran Komite bulan <?=$bulan?> belum dibayar
                        <div class="time text-primary">Rp <?php echo number_format($psn->biaya_spp,0,'.',',')?></div>
                      <div class="time text-primary">Bayar Sekarang</div>
                    </div>
                    <?php endforeach;?>

                    <?php }if($notif_osis){ ?>

                      <?php foreach($notif_osis as $psno):?>
                        <?php if($psno->bulan=="1"){
                  $bulan="Januari";
                }elseif($psno->bulan=="2"){
                  $bulan="Februari";
                }elseif($psno->bulan=="3"){
                  $bulan="Maret";
                }elseif($psno->bulan=="4"){
                  $bulan="April";
                }elseif($psno->bulan=="5"){
                  $bulan="Mei";
                }elseif($psno->bulan=="6"){
                  $bulan="Juni";
                }elseif($psno->bulan=="7"){
                  $bulan="Juli";
                }elseif($psno->bulan=="8"){
                  $bulan="Agustus";
                }elseif($psno->bulan=="9"){
                  $bulan="September";
                }elseif($psno->bulan=="10"){
                  $bulan="Oktober";
                }elseif($psno->bulan=="11"){
                  $bulan="November";
                }elseif($psno->bulan=="12"){
                  $bulan="Desember";
                }?>

                <a href="<?php echo base_url('osis')?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-warning text-white">
                    <i class="fas fa-info"></i>
                  </div>
                    <div class="dropdown-item-desc">
                        Pembayaran Osis bulan <?=$bulan?> belum dibayar
                      <div class="time text-primary">Rp <?php echo number_format($psno->biaya_osis,0,'.',',')?></div>
                      <div class="time text-primary">Bayar Sekarang</div>
                    </div>
                    <?php endforeach;?>

                    <?php }if($notif_eks){ ?>

                      <?php foreach($notif_eks as $psne):?>

                        <?php if($psne->bulan=="1"){
                  $bulan="Januari";
                }elseif($psne->bulan=="2"){
                  $bulan="Februari";
                }elseif($psne->bulan=="3"){
                  $bulan="Maret";
                }elseif($psne->bulan=="4"){
                  $bulan="April";
                }elseif($psne->bulan=="5"){
                  $bulan="Mei";
                }elseif($psne->bulan=="6"){
                  $bulan="Juni";
                }elseif($psne->bulan=="7"){
                  $bulan="Juli";
                }elseif($psne->bulan=="8"){
                  $bulan="Agustus";
                }elseif($psne->bulan=="9"){
                  $bulan="September";
                }elseif($psne->bulan=="10"){
                  $bulan="Oktober";
                }elseif($psne->bulan=="11"){
                  $bulan="November";
                }elseif($psne->bulan=="12"){
                  $bulan="Desember";
                }?>

                <a href="<?php echo base_url('ekskul')?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-warning text-white">
                    <i class="fas fa-info"></i>
                  </div>
                    <div class="dropdown-item-desc">
                        Pembayaran Ekstrakurikuler bulan <?=$bulan?> belum dibayar
                        <div class="time text-primary">Rp <?php echo number_format($psne->biaya_ekstrakurikuler,0,'.',',')?></div>
                        <div class="time text-primary">Bayar Sekarang</div>
                    </div>
                    <?php endforeach;?>


              <?php } if($invalid_spp){?>

                <?php foreach($invalid_spp as $psn):?>
                <?php if($psn->bulan=="1"){
                $bulan="Januari";
                }elseif($psn->bulan=="2"){
                $bulan="Februari";
                }elseif($psn->bulan=="3"){
                $bulan="Maret";
                }elseif($psn->bulan=="4"){
                $bulan="April";
                }elseif($psn->bulan=="5"){
                $bulan="Mei";
                }elseif($psn->bulan=="6"){
                $bulan="Juni";
                }elseif($psn->bulan=="7"){
                $bulan="Juli";
                }elseif($psn->bulan=="8"){
                $bulan="Agustus";
                }elseif($psn->bulan=="9"){
                $bulan="September";
                }elseif($psn->bulan=="10"){
                $bulan="Oktober";
                }elseif($psn->bulan=="11"){
                $bulan="November";
                }elseif($psn->bulan=="12"){
                $bulan="Desember";
                }?>

                <a href="<?php echo base_url('pembayaran/bayar_spp/'.$psn->id)?>" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-danger text-white">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                  <div class="dropdown-item-desc">
                      Bukti Pembayaran Komite bulan <?=$bulan?> tidak valid
                       <!-- <div class="time text-primary">Rp <?php echo number_format($psn->biaya_spp,0,'.',',')?></div> -->
                    <div class="time text-primary">Upload Ulang</div>
                  </div>
                  <?php endforeach;?>

                  <?php }if($invalid_osis){ ?>

                    <?php foreach($invalid_osis as $psno):?>
                      <?php if($psno->bulan=="1"){
                $bulan="Januari";
                }elseif($psno->bulan=="2"){
                $bulan="Februari";
                }elseif($psno->bulan=="3"){
                $bulan="Maret";
                }elseif($psno->bulan=="4"){
                $bulan="April";
                }elseif($psno->bulan=="5"){
                $bulan="Mei";
                }elseif($psno->bulan=="6"){
                $bulan="Juni";
                }elseif($psno->bulan=="7"){
                $bulan="Juli";
                }elseif($psno->bulan=="8"){
                $bulan="Agustus";
                }elseif($psno->bulan=="9"){
                $bulan="September";
                }elseif($psno->bulan=="10"){
                $bulan="Oktober";
                }elseif($psno->bulan=="11"){
                $bulan="November";
                }elseif($psno->bulan=="12"){
                $bulan="Desember";
                }?>

              <a href="<?php echo base_url('pembayaran/bayar_osis/'.$psno->id)?>" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-icon bg-danger text-white">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                  <div class="dropdown-item-desc">
                      Bukti Pembayaran Osis bulan <?=$bulan?> tidak valid
                    <!-- <div class="time text-primary">Rp <?php echo number_format($psno->biaya_osis,0,'.',',')?></div> -->
                    <div class="time text-primary">Upload Ulang</div>
                  </div>
                  <?php endforeach;?>

                  <?php }if($invalid_eks){ ?>

                    <?php foreach($invalid_eks as $psne):?>

                      <?php if($psne->bulan=="1"){
                $bulan="Januari";
                }elseif($psne->bulan=="2"){
                $bulan="Februari";
                }elseif($psne->bulan=="3"){
                $bulan="Maret";
                }elseif($psne->bulan=="4"){
                $bulan="April";
                }elseif($psne->bulan=="5"){
                $bulan="Mei";
                }elseif($psne->bulan=="6"){
                $bulan="Juni";
                }elseif($psne->bulan=="7"){
                $bulan="Juli";
                }elseif($psne->bulan=="8"){
                $bulan="Agustus";
                }elseif($psne->bulan=="9"){
                $bulan="September";
                }elseif($psne->bulan=="10"){
                $bulan="Oktober";
                }elseif($psne->bulan=="11"){
                $bulan="November";
                }elseif($psne->bulan=="12"){
                $bulan="Desember";
                }?>

                <a href="<?php echo base_url('pembayaran/bayar_ekskul/'.$psne->id)?>" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-danger text-white">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                  <div class="dropdown-item-desc">
                     Bukti Pembayaran Ekstrakurikuler bulan <?=$bulan?> tidak valid
                      <!-- <div class="time text-primary">Rp <?php echo number_format($psne->biaya_ekstrakurikuler,0,'.',',')?></div> -->
                      <div class="time text-primary">Upload Ulang</div>
                  </div>
                  <?php endforeach;?>

      
                <?php }if($lunas_spp){?>

                <?php foreach($lunas_spp as $psn):?>
                <?php if($psn->bulan=="1"){
                $bulan="Januari";
                }elseif($psn->bulan=="2"){
                $bulan="Februari";
                }elseif($psn->bulan=="3"){
                $bulan="Maret";
                }elseif($psn->bulan=="4"){
                $bulan="April";
                }elseif($psn->bulan=="5"){
                $bulan="Mei";
                }elseif($psn->bulan=="6"){
                $bulan="Juni";
                }elseif($psn->bulan=="7"){
                $bulan="Juli";
                }elseif($psn->bulan=="8"){
                $bulan="Agustus";
                }elseif($psn->bulan=="9"){
                $bulan="September";
                }elseif($psn->bulan=="10"){
                $bulan="Oktober";
                }elseif($psn->bulan=="11"){
                $bulan="November";
                }elseif($psn->bulan=="12"){
                $bulan="Desember";
                }?>
               
                <a href="<?php echo base_url('spp/bukti_spp/'.$psn->id)?>" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-icon bg-info text-white">
                <i class="fas fa-check"></i>
                </div>
                <div class="dropdown-item-desc">
                    Pembayaran Komite bulan <?=$bulan?> sudah dikonfirmasi
                  <div class="time text-primary">Lihat Bukti Pembayaran</div>
                </div>
                <?php endforeach;?>

                <?php }if($lunas_osis){ ?>

                  <?php foreach($lunas_osis as $psno):?>
                    <?php if($psno->bulan=="1"){
                $bulan="Januari";
                }elseif($psno->bulan=="2"){
                $bulan="Februari";
                }elseif($psno->bulan=="3"){
                $bulan="Maret";
                }elseif($psno->bulan=="4"){
                $bulan="April";
                }elseif($psno->bulan=="5"){
                $bulan="Mei";
                }elseif($psno->bulan=="6"){
                $bulan="Juni";
                }elseif($psno->bulan=="7"){
                $bulan="Juli";
                }elseif($psno->bulan=="8"){
                $bulan="Agustus";
                }elseif($psno->bulan=="9"){
                $bulan="September";
                }elseif($psno->bulan=="10"){
                $bulan="Oktober";
                }elseif($psno->bulan=="11"){
                $bulan="November";
                }elseif($psno->bulan=="12"){
                $bulan="Desember";
                }?>

              
              <a href="<?php echo base_url('osis/bukti_osis/'.$psno->id)?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-info text-white">
                  <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                      Pembayaran Osis bulan <?=$bulan?> sudah dikonfirmasi
                    <div class="time text-primary">Lihat Bukti Pembayaran</div>
                  </div>
                <?php endforeach;?>

                <?php }if($lunas_eks){ ?>

                  <?php foreach($lunas_eks as $psne):?>

                    <?php if($psne->bulan=="1"){
                $bulan="Januari";
                }elseif($psne->bulan=="2"){
                $bulan="Februari";
                }elseif($psne->bulan=="3"){
                $bulan="Maret";
                }elseif($psne->bulan=="4"){
                $bulan="April";
                }elseif($psne->bulan=="5"){
                $bulan="Mei";
                }elseif($psne->bulan=="6"){
                $bulan="Juni";
                }elseif($psne->bulan=="7"){
                $bulan="Juli";
                }elseif($psne->bulan=="8"){
                $bulan="Agustus";
                }elseif($psne->bulan=="9"){
                $bulan="September";
                }elseif($psne->bulan=="10"){
                $bulan="Oktober";
                }elseif($psne->bulan=="11"){
                $bulan="November";
                }elseif($psne->bulan=="12"){
                $bulan="Desember";
                }?>

              <a href="<?php echo base_url('ekskul/bukti_ekskul/'.$psne->id)?>" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-info text-white">
                  <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                      Pembayaran Ekstrakurikuler bulan <?=$bulan?> sudah dikonfirmasi
                    <div class="time text-primary">Lihat Bukti Pembayaran</div>
                  </div>
                <?php endforeach;?>

              <?php }if($w_spp){ ?>
              <?php foreach($w_spp as $psnw):?>

                <?php if($psnw->bulan=="1"){
              $bulan="Januari";
              }elseif($psnw->bulan=="2"){
              $bulan="Februari";
              }elseif($psnw->bulan=="3"){
              $bulan="Maret";
              }elseif($psnw->bulan=="4"){
              $bulan="April";
              }elseif($psnw->bulan=="5"){
              $bulan="Mei";
              }elseif($psnw->bulan=="6"){
              $bulan="Juni";
              }elseif($psnw->bulan=="7"){
              $bulan="Juli";
              }elseif($psnw->bulan=="8"){
              $bulan="Agustus";
              }elseif($psnw->bulan=="9"){
              $bulan="September";
              }elseif($psnw->bulan=="10"){
              $bulan="Oktober";
              }elseif($psnw->bulan=="11"){
              $bulan="November";
              }elseif($psnw->bulan=="12"){
              $bulan="Desember";
              }?>

              <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-icon bg-success text-white">
              <i class="fas fa-history"></i>
              </div>
              <div class="dropdown-item-desc">
                  Pembayaran Komite bulan <?=$bulan?> Menunggu konfirmasi
                  <div class="time text-primary">Pembayaran akan di validasi oleh admin</div>
              </div>
              <?php endforeach;?>
              <?php }if($w_osis){ ?>
              <?php foreach($w_osis as $psnwo):?>

                <?php if($psnwo->bulan=="1"){
              $bulan="Januari";
              }elseif($psnwo->bulan=="2"){
              $bulan="Februari";
              }elseif($psnwo->bulan=="3"){
              $bulan="Maret";
              }elseif($psnwo->bulan=="4"){
              $bulan="April";
              }elseif($psnwo->bulan=="5"){
              $bulan="Mei";
              }elseif($psnwo->bulan=="6"){
              $bulan="Juni";
              }elseif($psnwo->bulan=="7"){
              $bulan="Juli";
              }elseif($psnwo->bulan=="8"){
              $bulan="Agustus";
              }elseif($psnwo->bulan=="9"){
              $bulan="September";
              }elseif($psnwo->bulan=="10"){
              $bulan="Oktober";
              }elseif($psnwo->bulan=="11"){
              $bulan="November";
              }elseif($psnwo->bulan=="12"){
              $bulan="Desember";
              }?>

            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-icon bg-success text-white">
              <i class="fas fa-history"></i>
              </div>
              <div class="dropdown-item-desc">
                  Pembayaran Osis bulan <?=$bulan?> Menunggu konfirmasi
                <div class="time text-primary">Pembayaran akan di validasi oleh admin</div>
              </div>
              <?php endforeach;?>
              <?php }if($w_eks){ ?>
              <?php foreach($w_eks as $psnwe):?>

                <?php if($psnwe->bulan=="1"){
              $bulan="Januari";
              }elseif($psnwe->bulan=="2"){
              $bulan="Februari";
              }elseif($psnwe->bulan=="3"){
              $bulan="Maret";
              }elseif($psnwe->bulan=="4"){
              $bulan="April";
              }elseif($psnwe->bulan=="5"){
              $bulan="Mei";
              }elseif($psnwe->bulan=="6"){
              $bulan="Juni";
              }elseif($psnwe->bulan=="7"){
              $bulan="Juli";
              }elseif($psnwe->bulan=="8"){
              $bulan="Agustus";
              }elseif($psnwe->bulan=="9"){
              $bulan="September";
              }elseif($psnwe->bulan=="10"){
              $bulan="Oktober";
              }elseif($psnwe->bulan=="11"){
              $bulan="November";
              }elseif($psnwe->bulan=="12"){
              $bulan="Desember";
              }?>

            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-icon bg-success text-white">
              <i class="fas fa-history"></i>
              </div>
              <div class="dropdown-item-desc">
                  Pembayaran Ekstrakurikuler bulan <?=$bulan?> Menunggu konfirmasi
                <div class="time text-primary">Pembayaran akan di validasi oleh admin</div>
              </div>
              <?php endforeach;?>
              <?php }if($total==0){ ?>
                  <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                      <div class="dropdown-item-desc">
                        No Message
                      </div>
                      <?php } ?>
                    </a>
              </div>
              
              <div class="dropdown-footer text-center">
                <a href="<?php echo base_url('')?>">View All <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <?php 
          $id=$_SESSION['id'];
          $foto = $this->db->query("select * from siswa where id='$id'")->row_array();
          if($foto['foto'] ==''){?>
            <img alt="image" src="<?php echo base_url()?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
          <?php } else{ ?>
            <img alt="image" src="<?php echo base_url().'image/'.$foto['foto']?>" class="rounded-circle mr-1">
          <?php }?>
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo ucwords($foto['nama_siswa'])?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <!-- <a href="<?php echo base_url('user/read/'.$_SESSION['id'])?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="<?php echo base_url('user/update/'.$_SESSION['id'])?>" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Changes Password
              </a> -->
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('auth/logout')?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
     
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
           <a href="#" class="shadow-light">Control Panel</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <div class="img-responsive">
          <img src="<?= base_url()?>image/logo.png" alt="" width="60px">
          </div>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url('dashboard')?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
            
              <li class="menu-header">Menu</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-building"></i> <span>Master</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('siswa/update/'.$_SESSION['id'])?>">Profil Saya</a></li>
               
                </ul>
              </li>
              <li class="menu-header">Pembayaran</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Pembayaran</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('spp')?>">Komite</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('osis')?>">Osis</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('ekskul')?>">Ektrakurikuler</a></li>
                </ul>
              </li>
             
       
              <li class="menu-header">Reporting</li>
              <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-pdf-o"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('laporan_pdf/rekap_spp/'.$_SESSION['nis'])?>" target="_blank">Rekap Pembayaran Komite</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('laporan_pdf/rekap_osis/'.$_SESSION['nis'])?>" target="_blank">Rekap Pembayaran Osis</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('laporan_pdf/rekap_eks/'.$_SESSION['nis'])?>" target="_blank">Rekap Pembayaran Ekskul</a></li>
                </ul>
              </li>
       
              </ul> 
        </aside>
      </div>
      <!-- <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?> -->