<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('sources/vendors/bootstrap/dist/css/bootstrap.min.css') ?>"/>
      
    </head>
    <body>
<div class="clearfix">
        <h2 style="margin-top:0px">Detail_pembayaran Read</h2>
        <table class="table">
	    <tr><td>Kode Pembayaran</td><td><?php echo $kode_pembayaran; ?></td></tr>
	    <tr><td>Semester</td><td><?php echo $semester; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Kode Kelas</td><td><?php echo $kode_kelas; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td>Nis</td><td><?php echo $nis; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Biaya Spp</td><td><?php echo $biaya_spp; ?></td></tr>
	    <tr><td>Status Spp</td><td><?php echo $status_spp; ?></td></tr>
	    <tr><td>Biaya Osis</td><td><?php echo $biaya_osis; ?></td></tr>
	    <tr><td>Status Osis</td><td><?php echo $status_osis; ?></td></tr>
	    <tr><td>Tanggal Jatuh Tempo</td><td><?php echo $tanggal_jatuh_tempo; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('detail_pembayaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<div>
        </body>
</html>