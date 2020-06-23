<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for all logged in users
 */
class Dashboard extends MY_Controller {

	//protected $access = array('Admin', 'Sales');
	

      function __construct()
    {
        parent::__construct();
        // $this->load->model('Transaksi_pemesanan_teknisi_model');
        $this->load->library('form_validation');
    }
  
 	public function index()
	{	
		if($_SESSION['id']==""){
			
			redirect('auth','refresh');
			
		}
	
		$data=array(
		'user' =>$this->db->get('user'),
		'barang'=>$this->db->get('barang'),
		'beli'=>$this->db->get('transaksi_pembelian'),
		'kat'=>$this->db->get('kategori_barang'),
		
        );
	
        $this->load->view('header',$data);
        $this->load->view('index',$data);
        $this->load->view('footer');
        
	}


	public function get_data()
	{
		$this->load->model('Grafik_model');
		$data 	= $this->Grafik_model->get_data();
		$cek	= json_encode($data);
		print_r($cek);
		exit(); 
	}

	public function get_pembelian()
	{
		$this->load->model('Grafik_model');
		$data 	= $this->Grafik_model->get_pembelian();
		$cek	= json_encode($data);
		print_r($cek);
		exit(); 
	}
   

}