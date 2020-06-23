<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {

    public function spp($id)
    {
        $data=array(
            'data_spp'=>$this->db->query("select * from detail_pembayaran where id='$id'")->row_array(),
        );
        $this->load->view("header");
        $this->load->view("konfirmasi_spp",$data);
        $this->load->view("footer"); 
    }
    public function osis($id)
    {
        $data=array(
            'data_spp'=>$this->db->query("select * from detail_pembayaran where id='$id'")->row_array(),
        );
        $this->load->view("header");
        $this->load->view("konfirmasi_osis",$data);
        $this->load->view("footer"); 
    }
   
    public function eks($id)
    {
        $data=array(
            'data_spp'=>$this->db->query("select * from detail_pembayaran where id='$id'")->row_array(),
        );
        $this->load->view("header");
        $this->load->view("konfirmasi_eks",$data);
        $this->load->view("footer"); 
    }
   
    public function invalid($id)
    {
        
        $proses_update=$this->db->query("update detail_pembayaran set status_spp='Invalid' where id='$id'");
        if($proses_update){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">Pembayaran SPP berhasil di reject
            <button class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>  
        </button>
            </div>');
            redirect('panel','location');
        }else{
            echo '<script>window.history.back();</script>';
        }
        
         
    }
    public function invalid_osis($id)
    {
        
        $proses_update=$this->db->query("update detail_pembayaran set status_osis='Invalid' where id='$id'");
        if($proses_update){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">Pembayaran Osis berhasil di reject
            <button class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>  
        </button>
            </div>');
            redirect('panel','location');
        }else{
            echo '<script>window.history.back();</script>';
        }
        
         
    }
    
    public function invalid_eks($id)
    {
        
        $proses_update=$this->db->query("update detail_pembayaran set status_ekstrakurikuler='Invalid' where id='$id'");
        if($proses_update){
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">Pembayaran Ekstrakurikuler berhasil di reject
            <button class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>  
        </button>
            </div>');
            redirect('panel','location');
        }else{
            echo '<script>window.history.back();</script>';
        }   
         
    }
    public function proses_spp()
    {
        $date=date('Y-m-d');
        $id=$this->input->post('id');
        $proses_update=$this->db->query("update detail_pembayaran set status_spp='Lunas' where id='$id'");
        if($proses_update){
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">Pembayaran SPP berhasil di konfirmasi
            <button class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>  
        </button>
            </div>');
            redirect('panel','location');
        }else{
            echo '<script>window.history.back();</script>';
        }   
         
    }
    public function proses_osis()
    {
        $id=$this->input->post('id');
        $proses_update=$this->db->query("update detail_pembayaran set status_osis='Lunas' where id='$id'");
        if($proses_update){
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">Pembayaran Osis berhasil di konfirmasi
            <button class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>  
        </button>
            </div>');
            redirect('panel','location');
        }else{
            echo '<script>window.history.back();</script>';
        }   
         
    }
    public function proses_eks()
    {
        $id=$this->input->post('id');
        $proses_update=$this->db->query("update detail_pembayaran set status_ekstrakurikuler='Lunas' where id='$id'");
        if($proses_update){
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissable">Pembayaran Ekstrakurikuler berhasil di konfirmasi
            <button class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>  
        </button>
            </div>');
            redirect('panel','location');
        }else{
            echo '<script>window.history.back();</script>';
        }   
         
    }

}

/* End of file Konfirmasi.php */


?>