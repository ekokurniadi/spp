<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_siswa extends CI_Controller {

    public function index()
    {
        
        $data=array(
            'siswa'=>$this->db->get('siswa'),
            'kelas'=>$this->db->get('kelas'),
            'tahun_akademik'=>$this->db->get('tahun_akademik'),
            'perempuan'=>$this->db->query("SELECT COUNT(*) AS PR from siswa where jenis_kelamin='Perempuan'")->row_array(),
            'laki'=>$this->db->query("SELECT COUNT(*) AS LK from siswa where jenis_kelamin='Laki-laki'")->row_array(),
            'user'=>$this->db->get('user'),
        );
       
            $this->load->view('header_siswa');
            $this->load->view('index',$data);
            $this->load->view('footer');
       
        
    }

}




?>