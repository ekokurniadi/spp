<!doctype html>
<html>
    <head>
        <title>Cetak Pembayaran SPP</title>
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
                font-size:10px;
            }
        </style>
    </head>
    
    <body>
        <h5>Bukti Pembayaran SPP</h5>
        <br>
        <?php $gambar="../image/";?>
        <br>
       <table style="font-size:12px; border-collapse: collapse !important; ">
            <tr>
                <td width="100px;"><p>Nomor Induk Siswa </p></td>
                <td><p>:</p></td>
                <td width="200px;"><p><?=$user['nis']?></p></td>
                <td rowspan="3"><img src="<?php echo $gambar.$user['foto']?>" alt="" width="100px;" height="100px;"></td>
            </tr>
            <tr>
                <td width="100px;" style="padding-top:-20px;"><p>Nama Siswa </p></td>
                <td style="padding-top:-20px;"><p>:</p></td>
                <td width="200px;" style="padding-top:-20px;"><p><?=$user['nama_siswa']?></p></td>
            </tr>
            <tr>
            <td width="100px;" style="padding-top:-35px;"><p>Kelas </p></td>
            <td style="padding-top:-35px;"><p>:</p></td>
            <td width="200px;" style="padding-top:-35px;"><p><?=$user['kelas']?></p></td>
            </tr>
       </table>

       <br>
       <br>

       <table class="word-table">
            <tr >
                <th width="10px;" style="background-color:pink;">No</th>
                <th style="background-color:pink;" width="20px;">Semester</th>
                <th style="background-color:pink;">Bulan</th>
                <th style="background-color:pink;">Nominal</th>
                <th style="background-color:pink;">Tanggal</th>
                <th style="background-color:pink;">Pembayaran</th>
                <th style="background-color:pink;">Keterangan</th>
            </tr>
            <?php foreach($bayar as $by):?>
            <?php
            if($by->bulan=="1"){
            $bulan="Januari";
            }elseif($by->bulan=="2"){
            $bulan="Februari";
            }elseif($by->bulan=="3"){
            $bulan="Maret";
            }elseif($by->bulan=="4"){
            $bulan="April";
            }elseif($by->bulan=="5"){
            $bulan="Mei";
            }elseif($by->bulan=="6"){
            $bulan="Juni";
            }elseif($by->bulan=="7"){
            $bulan="Juli";
            }elseif($by->bulan=="8"){
            $bulan="Agustus";
            }elseif($by->bulan=="9"){
            $bulan="September";
            }elseif($by->bulan=="10"){
            $bulan="Oktober";
            }elseif($by->bulan=="11"){
            $bulan="November";
            }elseif($by->bulan=="12"){
                $bulan="Desember";
            }
            ?>
            <tr>
                <td align="center"><?=++$start;?></td>
                <td align="center"><?=$by->semester?></td>
                <td align="center"><?=$bulan?></td>
                <td align="center" width="50px;">Rp. <?=number_format($by->biaya_spp,0,'.',',')?></td>
                <td><?=$by->tgl_spp?></td>
                <td align="center"><?php
                    if($by->foto_spp==""){
                        $jenis="Cash";
                    }else{
                        $jenis="Transfer";
                    }
                    echo $jenis;
                ?></td>
                <td align="center"><?=$by->status_spp?></td>
            </tr>
            <?php endforeach;?>
       </table>
                    <br>
                    <br>
       <table style="margin-left:300px;">
            <tr>
                <td colspan="5" align="right;" ><p style="font-size:11px;">Wali Murid</p></td>
            </tr>
            <tr>
                <td colspan="5" align="center;"><br><br></td>
            </tr>
            <tr>
                <td colspan="5" align="center;"><p style="font-size:11px;text-decoration:underline;">(  <?php if($user['nama_ayah']==""){
                    $wali=$user['nama_ibu'];
                }else{
                    $wali=$user['nama_ayah'];
                } echo $wali;?>  )</p></td>
            </tr>
       </table>
    </body>
</html>