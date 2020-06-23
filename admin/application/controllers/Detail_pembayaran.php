<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Detail_pembayaran extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Detail_pembayaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_pembayaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_pembayaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_pembayaran/index.html';
            $config['first_url'] = base_url() . 'detail_pembayaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_pembayaran_model->total_rows($q);
        $detail_pembayaran = $this->Detail_pembayaran_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_pembayaran_data' => $detail_pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header_siswa');
        $this->load->view('detail_pembayaran_list', $data);
        $this->load->view('footer');
    }
    public function history()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'detail_pembayaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'detail_pembayaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'detail_pembayaran/index.html';
            $config['first_url'] = base_url() . 'detail_pembayaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Detail_pembayaran_model->total_rows($q);
        $detail_pembayaran = $this->Detail_pembayaran_model->get_all_history();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'detail_pembayaran_data' => $detail_pembayaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header_siswa');
        $this->load->view('riwayat_spp_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Detail_pembayaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_pembayaran' => $row->kode_pembayaran,
		'semester' => $row->semester,
		'bulan' => $row->bulan,
		'kode_kelas' => $row->kode_kelas,
		'kelas' => $row->kelas,
		'nis' => $row->nis,
		'nama' => $row->nama,
		'biaya_spp' => $row->biaya_spp,
		'status_spp' => $row->status_spp,
		'biaya_osis' => $row->biaya_osis,
		'status_osis' => $row->status_osis,
		'tanggal_jatuh_tempo' => $row->tanggal_jatuh_tempo,
	    );
            $this->load->view('header_siswa');
            $this->load->view('detail_pembayaran_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pembayaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('detail_pembayaran/create_action'),
	    'id' => set_value('id'),
	    'kode_pembayaran' => set_value('kode_pembayaran'),
	    'semester' => set_value('semester'),
	    'bulan' => set_value('bulan'),
	    'kode_kelas' => set_value('kode_kelas'),
	    'kelas' => set_value('kelas'),
	    'nis' => set_value('nis'),
	    'nama' => set_value('nama'),
	    'biaya_spp' => set_value('biaya_spp'),
	    'status_spp' => set_value('status_spp'),
	    'biaya_osis' => set_value('biaya_osis'),
	    'status_osis' => set_value('status_osis'),
	    'tanggal_jatuh_tempo' => set_value('tanggal_jatuh_tempo'),
	);

        $this->load->view('header_siswa');
        $this->load->view('detail_pembayaran_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_pembayaran' => $this->input->post('kode_pembayaran',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'bulan' => $this->input->post('bulan',TRUE),
		'kode_kelas' => $this->input->post('kode_kelas',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'biaya_spp' => $this->input->post('biaya_spp',TRUE),
		'status_spp' => $this->input->post('status_spp',TRUE),
		'biaya_osis' => $this->input->post('biaya_osis',TRUE),
		'status_osis' => $this->input->post('status_osis',TRUE),
		'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo',TRUE),
	    );

            $this->Detail_pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('detail_pembayaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Detail_pembayaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('detail_pembayaran/update_action'),
		'id' => set_value('id', $row->id),
		'kode_pembayaran' => set_value('kode_pembayaran', $row->kode_pembayaran),
		'semester' => set_value('semester', $row->semester),
		'bulan' => set_value('bulan', $row->bulan),
		'kode_kelas' => set_value('kode_kelas', $row->kode_kelas),
		'kelas' => set_value('kelas', $row->kelas),
		'nis' => set_value('nis', $row->nis),
		'nama' => set_value('nama', $row->nama),
		'biaya_spp' => set_value('biaya_spp', $row->biaya_spp),
		'status_spp' => set_value('status_spp', $row->status_spp),
		'biaya_osis' => set_value('biaya_osis', $row->biaya_osis),
		'status_osis' => set_value('status_osis', $row->status_osis),
		'tanggal_jatuh_tempo' => set_value('tanggal_jatuh_tempo', $row->tanggal_jatuh_tempo),
	    );
            $this->load->view('header_siswa');
            $this->load->view('detail_pembayaran_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pembayaran'));
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
		'bulan' => $this->input->post('bulan',TRUE),
		'kode_kelas' => $this->input->post('kode_kelas',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'biaya_spp' => $this->input->post('biaya_spp',TRUE),
		'status_spp' => $this->input->post('status_spp',TRUE),
		'biaya_osis' => $this->input->post('biaya_osis',TRUE),
		'status_osis' => $this->input->post('status_osis',TRUE),
		'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo',TRUE),
	    );

            $this->Detail_pembayaran_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('detail_pembayaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Detail_pembayaran_model->get_by_id($id);

        if ($row) {
            $this->Detail_pembayaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('detail_pembayaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('detail_pembayaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_pembayaran', 'kode pembayaran', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');
	$this->form_validation->set_rules('bulan', 'bulan', 'trim|required');
	$this->form_validation->set_rules('kode_kelas', 'kode kelas', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('biaya_spp', 'biaya spp', 'trim|required|numeric');
	$this->form_validation->set_rules('status_spp', 'status spp', 'trim|required');
	$this->form_validation->set_rules('biaya_osis', 'biaya osis', 'trim|required|numeric');
	$this->form_validation->set_rules('status_osis', 'status osis', 'trim|required');
	$this->form_validation->set_rules('tanggal_jatuh_tempo', 'tanggal jatuh tempo', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Detail_pembayaran.php */
/* Location: ./application/controllers/Detail_pembayaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-11 04:10:00 */
/* http://harviacode.com */