<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    
    function __construct() {
        parent::__construct();
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
        date_default_timezone_set('Asia/Jakarta');
    }
    
   
      public function cetak_spp($nis)
      {
          $dompdf= new Dompdf();
        
          $data['bayar']=  $this->db->query("SELECT * FROM detail_pembayaran where nis='$nis' and status_spp='Lunas'")->result();
          $data['start']=0;
          
          $data['user']=  $this->db->query("SELECT a.*,b.kelas FROM siswa a join detail_kelas b on b.nis=a.nis where a.nis='$nis'")->row_array();
          $html=$this->load->view('cetak_spp',$data,true);
         
          $dompdf->load_html($html);
          $dompdf->set_paper('A5','potrait');
          $dompdf->render();
         
          $pdf = $dompdf->output();
   
          $dompdf->stream('Bukti Pembayaran Uang SPP.pdf',array("Attachment"=>FALSE));
       }
      public function cetak_osis($nis)
      {
          $dompdf= new Dompdf();
        
          $data['bayar']=  $this->db->query("SELECT * FROM detail_pembayaran where nis='$nis' and status_osis='Lunas'")->result();
          $data['start']=0;
          
          $data['user']=  $this->db->query("SELECT a.*,b.kelas FROM siswa a join detail_kelas b on b.nis=a.nis where a.nis='$nis'")->row_array();
          $html=$this->load->view('cetak_osis',$data,true);
         
          $dompdf->load_html($html);
          $dompdf->set_paper('A5','potrait');
          $dompdf->render();
         
          $pdf = $dompdf->output();
   
          $dompdf->stream('Bukti Pembayaran Uang Osis.pdf',array("Attachment"=>FALSE));
       }
      public function cetak_eks($nis)
      {
          $dompdf= new Dompdf();
        
          $data['bayar']=  $this->db->query("SELECT * FROM detail_pembayaran where nis='$nis' and status_ekstrakurikuler='Lunas'")->result();
          $data['start']=0;
          
          $data['user']=  $this->db->query("SELECT a.*,b.kelas FROM siswa a join detail_kelas b on b.nis=a.nis where a.nis='$nis'")->row_array();
          $html=$this->load->view('cetak_eks',$data,true);
         
          $dompdf->load_html($html);
          $dompdf->set_paper('A5','potrait');
          $dompdf->render();
         
          $pdf = $dompdf->output();
   
          $dompdf->stream('Bukti Pembayaran Uang Ekskul.pdf',array("Attachment"=>FALSE));
       }

    public function spp()
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where status_spp ='Belum Lunas' OR status_spp ='Invalid'")->result()
        );
        $this->load->view('header');
        $this->load->view('bayar_spp',$data);
        $this->load->view('footer');
    }
    public function proses_spp($id)
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where id='$id'")->row_array()
        );
        $this->load->view('header');
        $this->load->view('bayar_spp_langsung',$data);
        $this->load->view('footer');
    }

    public function proses_bayar_spp()
    {
        $date=date('Y-m-d');
        $id=$this->input->post('id');
        $proses_update=$this->db->query("update detail_pembayaran set status_spp='Lunas',tgl_spp='$date' where id='$id'");
        if($proses_update){
            $_SESSION['pesan']="Successfully Save";
            $_SESSION['tipe']="success";
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran/spp'));
        }else{
            echo '<script>window.history.back();</script>';
        }   
         
    }


    public function osis()
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where status_osis ='Belum Lunas' OR status_osis ='Invalid'")->result()
        );
        $this->load->view('header');
        $this->load->view('bayar_osis',$data);
        $this->load->view('footer');
    }
    public function proses_osis($id)
    {   
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where id='$id'")->row_array()
        );
        $this->load->view('header');
        $this->load->view('bayar_osis_langsung',$data);
        $this->load->view('footer');
    }

    public function proses_bayar_osis()
    {
        $date=date('Y-m-d');
        $id=$this->input->post('id');
        $proses_update=$this->db->query("update detail_pembayaran set status_osis='Lunas',tgl_osis='$date' where id='$id'");
        if($proses_update){
            $_SESSION['pesan']="Successfully Save";
            $_SESSION['tipe']="success";
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran/osis'));
        }else{
            echo '<script>window.history.back();</script>';
        }   
         
    }

    public function ekskul()
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where status_ekstrakurikuler ='Belum Lunas' OR status_ekstrakurikuler ='Invalid'")->result()
        );
        $this->load->view('header');
        $this->load->view('bayar_eks',$data);
        $this->load->view('footer');
    }
    public function history_spp()
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where status_spp ='Lunas'")->result()
        );
        $this->load->view('header');
        $this->load->view('history_spp',$data);
        $this->load->view('footer');
    }
    public function history_osis()
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where status_osis ='Lunas'")->result()
        );
        $this->load->view('header');
        $this->load->view('history_osis',$data);
        $this->load->view('footer');
    }
    public function history_eks()
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where status_ekstrakurikuler ='Lunas'")->result()
        );
        $this->load->view('header');
        $this->load->view('history_eks',$data);
        $this->load->view('footer');
    }
    public function proses_eks($id)
    {
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where id='$id'")->row_array()
        );
        $this->load->view('header');
        $this->load->view('bayar_eks_langsung',$data);
        $this->load->view('footer');
    }

    public function proses_bayar_eks()
    {
        $date=date('Y-m-d');
        $id=$this->input->post('id');
        $proses_update=$this->db->query("update detail_pembayaran set status_ekstrakurikuler='Lunas',tgl_ekskul='$date' where id='$id'");
        if($proses_update){
            $_SESSION['pesan']="Successfully Save";
            $_SESSION['tipe']="success";
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran/ekskul'));
        }else{
            echo '<script>window.history.back();</script>';
        }   
         
    }


}

/* End of file Pembayaran.php */


?>