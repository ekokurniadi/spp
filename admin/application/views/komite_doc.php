<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Komite List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Kelas</th>
		<th>Kelas</th>
		<th>Biaya Komite</th>
		
            </tr><?php
            foreach ($komite_data as $komite)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $komite->kode_kelas ?></td>
		      <td><?php echo $komite->kelas ?></td>
		      <td><?php echo $komite->biaya_komite ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>