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
    <table style="padding-bottom:0px;">
               <tr>
               <th width="150px;"><img src="image/logo.png" alt="Image" width="80px" id="logo" height="80px" ></th>
                <th colspan="2" style="font-family:sans-serif;text-align:center;">
                    <h4 style="padding-bottom:-20px;">YAYASAN AL-MADRASATUL MAHDALIYAH</h4>
                    <br>
                    <h4 style="font-family:sans-serif;padding-bottom:-40px;">MADRASAH TSANAWIYAH MAHDALIYAH KOTA JAMBI</h4>
                    <br>
                    <h6 style="font-family:sans-serif;padding-bottom:-80px;font-weight:normal">Jl. Sunan Kali Jaga RT. 04 RW. 11 Simpang III Sipin
                    </h6>
                    <br>
                    <h6 style="font-family:sans-serif;padding-top:-8px;font-weight:normal">Kecamatan Kota BaruKota Jambi</h6>
                </th>
                <th width="100px;"><h1></h1></th>
               </tr>
                <tr>
                    <th colspan="4" style="padding-top:-30px;"><hr style="border: 1.5px solid black;"></th>
                </tr>
          </table>
          <br>
       <table style="font-size:12px; border-collapse: collapse !important; ">
            <tr>
                <td width="100px;"><p>Nomor Induk Siswa </p></td>
                <td><p>:</p></td>
                <td width="200px;"><p><?=$user['nis']?></p></td>
                <td rowspan="3"><img src="<?php echo 'image/'. $user['foto']?>" alt="" width="100px;" height="100px;"></td>
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
<br><br>
       <table style="padding-left:15px;">
       <tr>
           <td width="500px;">
                <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Mengetahui</p>  
           </td>
           <td width="330px;">
                <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">Mengetahui</p>  
           </td>
       </tr>
       </table>

       <br>
       <br>
       <br>

       <table style="padding-left:15px;">
       <tr>
           <td width="500px;">
                <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">(Kepala Madrasah)</p>  
           </td>
           <td width="330px;">
                <p style="font-family:sans-serif;text-align:justify;font-size:12px;font-weight:normal;">(Bendahara)</p>  
           </td>
       </tr>
       </table>
        <br>
    </body>
</html>