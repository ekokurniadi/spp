<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url()?>image/logo_mts.png" type="image/ico" />

    <title>Dashboard</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>sources/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>sources/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url()?>sources/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url()?>sources/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url()?>sources/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url()?>sources/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>sources/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="<?php echo base_url()?>sources/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>sources/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>sources/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>sources/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>sources/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>sources/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo base_url()?>sources/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo base_url()?>sources/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo base_url()?>sources/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url()?>sources/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>sources/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url('dashboard')?>" class="site_title"><span>MTS MAHDALIYAH</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
               
          <?php $id=$_SESSION['id'];
          $foto = $this->db->query("select foto from user where id='$id'")->row_array();
          if($foto['foto'] ==''){?>
             <img src="<?php echo base_url()?>sources/production/images/img.jpg" alt="..." class="img-circle profile_img">
          <?php } else{ ?>
            <img alt="image" src="<?php echo base_url().'image/'.$foto['foto']?>" class="img-circle profile_img">
          <?php }?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= strtoupper($_SESSION['nama'])?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Control Panel</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('siswa')?>">Data Siswa</a></li>
                      <li><a href="<?php echo base_url('kelas')?>">Data Kelas</a></li>
                      <!-- <li><a href="<?php echo base_url('tahun_akademik')?>">Tahun Akademik</a></li> -->
                      <li><a href="<?php echo base_url('komite')?>">Biaya SPP</a></li>
                      <li><a href="<?php echo base_url('osis')?>">Biaya Osis</a></li>
                      <li><a href="<?php echo base_url('ekstrakurikuler')?>">Biaya Ekstrakurikuler</a></li>
                      <!-- <li><a href="form_validation.html">Setting Bulan Persemester</a></li> -->
                      <li><a href="<?php echo base_url('profil_sekolah')?>">Profil Sekolah</a></li>
                      <li><a href="<?php echo base_url('user')?>">Data User</a></li>
                      <!-- <li><a href="form_wizards.html">Form Wizard</a></li>
                      <li><a href="form_upload.html">Form Upload</a></li>
                      <li><a href="form_buttons.html">Form Buttons</a></li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Pembayaran <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('pembayaran_spp')?>">Setting Pembayaran</a></li>
                      <li><a href="<?php echo base_url('pembayaran/spp')?>">Pembayaran SPP</a></li>
                      <li><a href="<?php echo base_url('pembayaran/osis')?>">Pembayaran Osis</a></li>
                      <li><a href="<?php echo base_url('pembayaran/ekskul')?>">Pembayaran Ekstrakurikuler</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-calendar"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('laporan/spp')?>">Pembayaran SPP</a></li>
                      <li><a href="<?php echo base_url('laporan/osis')?>">Pembayaran Osis</a></li>
                      <li><a href="<?php echo base_url('laporan/ekskul')?>">Pembayaran Ekstrakurikuler</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
             

            </div>

            <!-- <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div> -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                
                    <?php $id=$_SESSION['id'];
                    $foto = $this->db->query("select foto from user where id='$id'")->row_array();
                    if($foto['foto'] ==''){?>
                        <img src="<?php echo base_url()?>sources/production/images/img.jpg" alt=""><?=ucwords($_SESSION['nama'])?>
                    <?php } else{ ?>
                      <img alt="image" src="<?php echo base_url().'image/'.$foto['foto']?>"><?=ucwords($_SESSION['nama'])?>
                    <?php }?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?=base_url('user/update/'.$_SESSION['id'])?>"> Profile</a></li>
                    <li><a href="<?= base_url('auth/logout')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>



                <?php $w_spp =$this->db->query("select * from detail_pembayaran where status_spp='Menunggu Konfirmasi'")->result();?>
                <?php $w_osis =$this->db->query("select * from detail_pembayaran where status_osis='Menunggu Konfirmasi'")->result();?>
                <?php $w_eks =$this->db->query("select * from detail_pembayaran where status_ekstrakurikuler='Menunggu Konfirmasi'")->result();?>

                <?php $w_spp1 =$this->db->query("select * from detail_pembayaran where status_spp='Menunggu Konfirmasi'");?>
                <?php $w_osis2 =$this->db->query("select * from detail_pembayaran where status_osis='Menunggu Konfirmasi'");?>
                <?php $w_eks3 =$this->db->query("select * from detail_pembayaran where status_ekstrakurikuler='Menunggu Konfirmasi'");?>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-green"><?php echo $w_spp1->num_rows() + $w_osis2->num_rows() + $w_eks3->num_rows() ?></span>
                  </a>
                
               <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                <?php if($w_spp){?>
                <?php foreach($w_spp as $psn):?>
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
                    <li>
                      <a>
                        <span>
                          <span class=""> 
                            <i class="fa fa-info"></i>
                             Notifikasi Pembayaran SPP
                          </span>
                          <!-- <span class="time">3 mins ago</span> -->
                        </span>
                        <span class="message">
                         Pembayaran SPP bulan <?=$bulan?> semester <?=$psn->semester?> dari <?php echo $psn->nama?> kelas <?=$psn->kelas?> Menunggu Konfirmasi
                      </span>
                      <span>
                          <a href="<?php echo base_url('konfirmasi/spp/'.$psn->id);?>">
                            <span class="badge bg-green"> 
                                  <i class="fa fa-check"></i>
                                  Proses Pembayaran SPP
                            </span>
                          </a>
                      </span>
                      </a>
                    </li>
              <?php endforeach;?>
              <?php }if($w_osis){?>
                <?php foreach($w_osis as $psno):?>
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
                  <li>
                      <a>
                        <span>
                          <span class=""> 
                            <i class="fa fa-info"></i>
                             Notifikasi Pembayaran Osis
                          </span>
                          <!-- <span class="time">3 mins ago</span> -->
                        </span>
                        <span class="message">
                         Pembayaran Osis bulan <?=$bulan?> semester <?=$psno->semester?> dari <?php echo $psno->nama?> kelas <?=$psno->kelas?> Menunggu Konfirmasi
                      </span>
                      <span>
                          <a href="<?php echo base_url('konfirmasi/osis/'.$psno->id);?>">
                            <span class="badge bg-red"> 
                                  <i class="fa fa-check"></i>
                                  Proses Pembayaran Osis
                            </span>
                          </a>
                      </span>
                      </a>
                    </li>
              <?php endforeach;?>
                <?php }if($w_eks){?>
                <?php foreach($w_eks as $psne):?>
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
                  <li>
                      <a>
                        <span>
                          <span class=""> 
                            <i class="fa fa-info"></i>
                             Notifikasi Pembayaran Ekstrakurikuler
                          </span>
                          <!-- <span class="time">3 mins ago</span> -->
                        </span>
                        <span class="message">
                         Pembayaran Ekstrakurikuler bulan <?=$bulan?> semester <?=$psne->semester?> dari <?php echo $psne->nama?> kelas <?=$psne->kelas?> Menunggu Konfirmasi
                      </span>
                      <span>
                          <a href="<?php echo base_url('konfirmasi/eks/'.$psne->id);?>">
                            <span class="badge bg-orange"> 
                                  <i class="fa fa-check"></i>
                                  Proses Pembayaran Ekstrakurikuler
                            </span>
                          </a>
                      </span>
                      </a>
                    </li>
                <?php endforeach;?>
                <?php }?>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
          </div>
          
        <!-- /top navigation -->

