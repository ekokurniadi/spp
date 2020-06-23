<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('sources/vendors/bootstrap/dist/css/bootstrap.min.css') ?>"/>
      
    </head>
    <body>
<div class="clearfix">
        <h2 style="margin-top:0px">Profil_sekolah Read</h2>
        <table class="table">
	    <tr><td>Nama Sekolah</td><td><?php echo $nama_sekolah; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Nomor Telp</td><td><?php echo $nomor_telp; ?></td></tr>
	    <tr><td>Nama Pimpinan</td><td><?php echo $nama_pimpinan; ?></td></tr>
	    <tr><td>Logo Kop</td><td><?php echo $logo_kop; ?></td></tr>
	    <tr><td>Active</td><td><?php echo $active; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('profil_sekolah') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<div>
        </body>
</html>