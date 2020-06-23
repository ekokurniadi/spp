<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function index()
    {
        $nis=$_SESSION['nis'];
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where nis='$nis' and status_ekstrakurikuler='Belum Lunas'")->result(),
        );
        $this->load->view("header");
        $this->load->view("ekskul_list",$data);
        $this->load->view("footer");
    }

    public function bayar_osis($id)
    {  
        $data=array(
            'id'=>set_value('id',$id)
        );
        $this->load->view("header");
        $this->load->view("pembayaran_osis",$data);
        $this->load->view("footer");
    }

    public function proses_bayar_osis() 
    {
        $id=$this->input->post('id');
        $this->load->library('upload');
        $nmfile = "user".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
        $config['file_name'] = $_FILES['foto_osis']['name'];

        $this->upload->initialize($config);
        
                if(!empty($_FILES['foto_osis']['name']))
                {  
                        unlink("./image/".$this->input->post('foto_osis'));

                    if($_FILES['foto_osis']['name'])
                    {
                        if($this->upload->do_upload('foto_osis'))
                        {
                            $gbr = $this->upload->data();
                            $data = array(
                                'foto_osis' => $gbr['file_name'],
                                'tgl_osis'=>date('Y-m-d'),
                                'status_osis'=>'Menunggu Konfirmasi'
                            );
                        }
                    }
                    $this->db->where('id', $id);
                    $this->db->update('detail_pembayaran', $data);
                    $_SESSION['pesan']="Successfully Save";
                    $_SESSION['tipe']="warning";
                    redirect(site_url('osis'));
                }
    }

    public function bayar_spp($id)
    {  
        $data=array(
            'id'=>set_value('id',$id)
        );
        $this->load->view("header");
        $this->load->view("pembayaran_spp",$data);
        $this->load->view("footer");
    }

    public function proses_bayar_spp() 
    {
        $id=$this->input->post('id');
        $this->load->library('upload');
        $nmfile = "user".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
        $config['file_name'] = $_FILES['foto_spp']['name'];

        $this->upload->initialize($config);
        
                if(!empty($_FILES['foto_spp']['name']))
                {  
                        unlink("./image/".$this->input->post('foto_spp'));

                    if($_FILES['foto_spp']['name'])
                    {
                        if($this->upload->do_upload('foto_spp'))
                        {
                            $gbr = $this->upload->data();
                            $data = array(
                                'foto_spp' => $gbr['file_name'],
                                'tgl_spp'=>date('Y-m-d'),
                                'status_spp'=>'Menunggu Konfirmasi'
                            );
                        }
                    }
                    $this->db->where('id', $id);
                    $this->db->update('detail_pembayaran', $data);
                    $_SESSION['pesan']="Successfully Save";
                    $_SESSION['tipe']="warning";
                    redirect(site_url('spp'));
                }
    }

    public function bayar_ekskul($id)
    {  
        $data=array(
            'id'=>set_value('id',$id)
        );
        $this->load->view("header");
        $this->load->view("pembayaran_ekskul",$data);
        $this->load->view("footer");
    }

    public function proses_bayar_ekskul() 
    {
        $id=$this->input->post('id');
        $this->load->library('upload');
        $nmfile = "user".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
        $config['file_name'] = $_FILES['foto_ekskul']['name'];

        $this->upload->initialize($config);
        
                if(!empty($_FILES['foto_ekskul']['name']))
                {  
                        unlink("./image/".$this->input->post('foto_ekskul'));

                    if($_FILES['foto_ekskul']['name'])
                    {
                        if($this->upload->do_upload('foto_ekskul'))
                        {
                            $gbr = $this->upload->data();
                            $data = array(
                                'foto_ekskul' => $gbr['file_name'],
                                'tgl_ekskul'=>date('Y-m-d'),
                                'status_ekstrakurikuler'=>'Menunggu Konfirmasi'
                            );
                        }
                    }
                    $this->db->where('id', $id);
                    $this->db->update('detail_pembayaran', $data);
                    $_SESSION['pesan']="Successfully Save";
                    $_SESSION['tipe']="warning";
                    redirect(site_url('ekskul'));
                }
    }


}

/* End of file SPP.php */
?>