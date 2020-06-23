<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Grafik_model extends CI_Model
{

    
    function get_data()
    {
            
         $query="SELECT * from stok ORDER BY qty DESC ";
         return $this->db->query($query)->result();
    }
    function get_data2()
    {
            
         $query="SELECT description,brand, sum(stok) as stok  from stok_sku GROUP BY brand ORDER BY stok DESC";
         return $this->db->query($query)->result();
    }

    function get_pembelian()
    {
        $query="SELECT kode_pembelian, SUM(jumlah) as jumlah FROM transaksi_pembelian_detail GROUP BY  kode_pembelian ORDER BY kode_pembelian ASC";
            return $this->db->query($query)->result();
    }


}
