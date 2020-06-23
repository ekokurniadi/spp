<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('sources/vendors/bootstrap/dist/css/bootstrap.min.css') ?>"/>
      
    </head>
    <body>
<div class="clearfix">
        <h2 style="margin-top:0px">Siswa Read</h2>
        <table class="table">
	    <tr><td>Nis</td><td><?php echo $nis; ?></td></tr>
	    <tr><td>Nama Siswa</td><td><?php echo $nama_siswa; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Nama Ayah</td><td><?php echo $nama_ayah; ?></td></tr>
	    <tr><td>Nama Ibu</td><td><?php echo $nama_ibu; ?></td></tr>
	    <tr><td>No Telp Orang Tua</td><td><?php echo $no_telp_orang_tua; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('siswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<div>
        </body>
</html>