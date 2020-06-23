<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('sources/vendors/bootstrap/dist/css/bootstrap.min.css') ?>"/>
      
    </head>
    <body>
<div class="clearfix">
        <h2 style="margin-top:0px">Komite Read</h2>
        <table class="table">
	    <tr><td>Kode Kelas</td><td><?php echo $kode_kelas; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td>Biaya Komite</td><td><?php echo $biaya_komite; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('komite') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
<div>
        </body>
</html>