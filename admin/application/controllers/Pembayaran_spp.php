<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pembayaran_spp extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_spp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pembayaran_spp/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pembayaran_spp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pembayaran_spp/index.html';
            $config['first_url'] = base_url() . 'pembayaran_spp/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pembayaran_spp_model->total_rows($q);
        $pembayaran_spp = $this->Pembayaran_spp_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pembayaran_spp_data' => $pembayaran_spp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('pembayaran_spp_list', $data);
        $this->load->view('footer');
    }

  
    public function load_temp()
    {
        echo "<div class='table-responsive'>
         <table id='example1' class='table table-hover'>
                 <thead>
                    <tr>
                    <th width='20px'>No</th>
                    <th>Nis</th>
                    <th>Nama</th>
                    <th>Biaya Komite</th>
                    <th>Biaya Osis</th>
                    <th>Biaya Ekstrakurikuler</th>
                    </tr>
                    </thead>
                    <tbody>
                   ";
                    $id=$_GET['kode_kelas'];
                    $no=1;
                    $data = $this->db->query("SELECT a.nis,b.nama_siswa,c.biaya_komite,d.biaya_osis,e.biaya_ekstrakurikuler from detail_kelas a join siswa b on a.nis=b.nis join komite c on c.kode_kelas=a.kode_kelas join osis d on d.kode_kelas=a.kode_kelas join ekstrakurikuler e on e.kode_kelas=a.kode_kelas where c.kode_kelas='$id'")->result();
                 
                    $period_array = array();
                    $total=0;
                    foreach ($data as $d) {
                        $biaya1="Rp.".number_format($d->biaya_komite);
                        $biaya2="Rp.".number_format($d->biaya_osis);
                        $biaya3="Rp.".number_format($d->biaya_ekstrakurikuler);
                        echo "<tr id='dataku'>
                                <td>$no</td>
                                <td>$d->nis</td>
                                <td>$d->nama_siswa</td>
                                <td>$biaya1</td>
                                <td>$biaya2</td>
                                <td>$biaya3</td>
                             </tr>
                             </tbody>";
                        $no++;
                        
                    }
                    echo "</table></div>";  
                   
    }

    public function read($id) 
    {
        $row = $this->Pembayaran_spp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_pembayaran' => $row->kode_pembayaran,
        'semester' => $row->semester,
        'tanggal'=>$row->tanggal_jatuh_tempo,
		'bulan' => $row->bulan,
		'kode_kelas' => $row->kode_kelas,
		'kelas' => $row->kelas,
		'status' => $row->status,
	    );
            $this->load->view('header');
            $this->load->view('pembayaran_spp_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran_spp'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pembayaran_spp/create_action'),
	    'id' => set_value('id'),
	    'kode_pembayaran' => set_value('kode_pembayaran'),
	    'semester' => set_value('semester'),
	    'tanggal' => set_value('tanggal'),
	    'bulan' => set_value('bulan'),
	    'kode_kelas' => set_value('kode_kelas'),
	    'kelas' => set_value('kelas'),
	    'status' => set_value('status'),
	);

        $data['kode']=$this->Pembayaran_spp_model->kode();
        $this->load->view('header');
        $this->load->view('pembayaran_spp_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        echo "test";
            $kod=$this->input->post('kode_kelas');
            $kode_pembayaran = $this->input->post('kode_pembayaran');
            $semester = $this->input->post('semester');
            $bulan = $this->input->post('bulan');
            $tanggal=$this->input->post('tanggal');
            $kode_kelas=$this->db->query("SELECT a.nis,b.nama_siswa,c.biaya_komite,d.biaya_osis,a.kelas,a.kode_kelas,e.biaya_ekstrakurikuler from detail_kelas a join siswa b on a.nis=b.nis join komite c on c.kode_kelas=a.kode_kelas join osis d on d.kode_kelas=a.kode_kelas join ekstrakurikuler e on e.kode_kelas=a.kode_kelas where c.kode_kelas='$kod'")->result();
            $jumlah=$this->db->query("SELECT COUNT(*) as jml from detail_kelas where kode_kelas='$kod'")->row_array();
            foreach($kode_kelas as $ko)
            {
             $jumlah_data=$jumlah;
             $nis=$ko->nis;
             $nama=$ko->nama_siswa;
             $biaya_spp=$ko->biaya_komite;
             $biaya_osis=$ko->biaya_osis;
             $biaya_ekstrakurikuler=$ko->biaya_ekstrakurikuler;
             $kelas=$ko->kelas;
             $kode_kelasnya=$ko->kode_kelas;
             for($i=0; $i < sizeof($jumlah_data); $i++){
                 $data=array(
                     'kode_pembayaran'=>$kode_pembayaran,
                     'tanggal_jatuh_tempo'=>$tanggal,
                     'semester'=>$semester,
                     'bulan'=>$bulan,
                     'kode_kelas'=>$kode_kelasnya,
                     'kelas'=>$kelas,
                     'nis'=>$nis,
                     'nama'=>$nama,
                     'biaya_spp'=>$biaya_spp,
                     'status_spp'=>"Belum Lunas",
                     'biaya_osis'=>$biaya_osis,
                     'status_osis'=>"Belum Lunas",
                     'biaya_ekstrakurikuler'=>$biaya_ekstrakurikuler,
                     'status_ekstrakurikuler'=>"Belum Lunas",
                    );
                    $this->db->insert('detail_pembayaran',$data);
                }
            }

            $data = array(
        'kode_pembayaran' => $this->input->post('kode_pembayaran',TRUE),
        'tanggal_jatuh_tempo'=>$this->input->post('tanggal',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		'kode_kelas' => $this->input->post('kode_kelas',TRUE),
		'kelas' =>  $kelas=$ko->kelas,
		'status' => "Belum Lunas",
	    );

            $this->Pembayaran_spp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pembayaran_spp'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Pembayaran_spp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pembayaran_spp/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode_pembayaran', $row->kode_pembayaran),
		'semester' => set_value('semester', $row->semester),
		'tanggal' => set_value('tanggal', $row->tanggal_jatuh_tempo),
		'bulan' => set_value('bulan', $row->bulan),
		'kode_kelas' => set_value('kode_kelas', $row->kode_kelas),
		'kelas' => set_value('kelas', $row->kelas),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('header');
            $this->load->view('pembayaran_spp_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran_spp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_pembayaran' => $this->input->post('kode_pembayaran',TRUE),
        'semester' => $this->input->post('semester',TRUE),
        'tanggal_jatuh_tempo'=>$this->input->post('tanggal',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		'kode_kelas' => $this->input->post('kode_kelas',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Pembayaran_spp_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pembayaran_spp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pembayaran_spp_model->get_by_id($id);

        if ($row) {
            $this->Pembayaran_spp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pembayaran_spp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pembayaran_spp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_pembayaran', 'kode pembayaran', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');
	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	$this->form_validation->set_rules('kode_kelas', 'kode kelas', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pembayaran_spp.php */
/* Location: ./application/controllers/Pembayaran_spp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-04 15:55:34 */
/* http://harviacode.com */