<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('sources/vendors/bootstrap/dist/css/bootstrap.min.css') ?>"/>
      
    </head>
    <body>
<div class="clearfix">
        <h2 style="margin-top:0px">Pembayaran_spp Read</h2>
        <table class="table">
	    <tr><td>Kode Pembayaran</td><td><?php echo $kode_pembayaran; ?></td></tr>
	    <tr><td>Semester</td><td><?php echo $semester; ?></td></tr>
	    <tr><td>Bulan</td><td><?php echo $bulan; ?></td></tr>
	    <tr><td>Kode Kelas</td><td><?php echo $kode_kelas; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pembayaran_spp') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<div>
        </body>
</html>