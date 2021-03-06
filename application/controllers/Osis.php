<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Osis extends CI_Controller {

    public function index()
    {
        $nis=$_SESSION['nis'];
        $data=array(
            'data_spp'=>$this->db->query("SELECT * FROM detail_pembayaran where nis='$nis' and status_osis !='Lunas'")->result(),
        );
        $this->load->view("header");
        $this->load->view("osis_list",$data);
        $this->load->view("footer");
    }

    public function bukti_osis($id)
    {
        $data=array(
            'gambar'=>$this->db->query("select * from detail_pembayaran where id='$id'")->row_array(),
        );
        $this->load->view("header");
        $this->load->view("bukti_os",$data);
        $this->load->view("footer");
    }

    public function hasread()
    {   $id=$this->input->post('id');
        $update=$this->db->query("update detail_pembayaran set flag_osis ='1' where id='$id'");
        if($update){ 
            $this->session->set_flashdata('message', '
				<div class="toast" role="alert"  aria-live="assertive" aria-atomic="true" data-animation="true" data-delay="10000" data-autohide="true" style="position: absolute; top: 30; right: 0;z-index: 3">
				<div class="toast-header">
					<span class="rounded mr-2 bg-warning" style="width: 15px;height: 15px"></span>
					<strong class="mr-auto">Notifikasi</strong>
					<button type="button" class="close" data-dismiss="toast" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="toast-body" style="color:black;">
                   Pesan sudah di baca
					<br/>
					Untuk melihat history pembayaran bisa lihat pada menu Osis -> History Pembayaran Osis
				</div>
			</div>');
            redirect('dashboard','refresh');
        }
    }
}

/* End of file SPP.php */
?>