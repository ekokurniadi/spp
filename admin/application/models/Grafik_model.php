<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik_model extends CI_Model
{

    
    function get_data()
    {
            
         $query="SELECT nama_barang,stok FROM barang";
         return $this->db->query($query)->result();
    }

    function get_pembelian()
    {
        $query="SELECT kode_pembelian, SUM(jumlah) as jumlah FROM transaksi_pembelian_detail GROUP BY  kode_pembelian ORDER BY kode_pembelian ASC";
            return $this->db->query($query)->result();
    }


}
