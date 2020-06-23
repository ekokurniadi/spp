<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profil_sekolah extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profil_sekolah_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'profil_sekolah/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'profil_sekolah/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'profil_sekolah/index.html';
            $config['first_url'] = base_url() . 'profil_sekolah/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Profil_sekolah_model->total_rows($q);
        $profil_sekolah = $this->Profil_sekolah_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'profil_sekolah_data' => $profil_sekolah,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('profil_sekolah_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Profil_sekolah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_sekolah' => $row->nama_sekolah,
		'email' => $row->email,
		'alamat' => $row->alamat,
		'nomor_telp' => $row->nomor_telp,
		'nama_pimpinan' => $row->nama_pimpinan,
		'logo_kop' => $row->logo_kop,
		'active' => $row->active,
	    );
            $this->load->view('header');
            $this->load->view('profil_sekolah_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_sekolah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profil_sekolah/create_action'),
	    'id' => set_value('id'),
	    'nama_sekolah' => set_value('nama_sekolah'),
	    'email' => set_value('email'),
	    'alamat' => set_value('alamat'),
	    'nomor_telp' => set_value('nomor_telp'),
	    'nama_pimpinan' => set_value('nama_pimpinan'),
	    'logo_kop' => set_value('logo_kop'),
	    'active' => set_value('active'),
	);

        $this->load->view('header');
        $this->load->view('profil_sekolah_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'email' => $this->input->post('email',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nomor_telp' => $this->input->post('nomor_telp',TRUE),
		'nama_pimpinan' => $this->input->post('nama_pimpinan',TRUE),
		'logo_kop' => $this->input->post('logo_kop',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Profil_sekolah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('profil_sekolah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Profil_sekolah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profil_sekolah/update_action'),
		'id' => set_value('id', $row->id),
		'nama_sekolah' => set_value('nama_sekolah', $row->nama_sekolah),
		'email' => set_value('email', $row->email),
		'alamat' => set_value('alamat', $row->alamat),
		'nomor_telp' => set_value('nomor_telp', $row->nomor_telp),
		'nama_pimpinan' => set_value('nama_pimpinan', $row->nama_pimpinan),
		'logo_kop' => set_value('logo_kop', $row->logo_kop),
		'active' => set_value('active', $row->active),
	    );
            $this->load->view('header');
            $this->load->view('profil_sekolah_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_sekolah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'email' => $this->input->post('email',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nomor_telp' => $this->input->post('nomor_telp',TRUE),
		'nama_pimpinan' => $this->input->post('nama_pimpinan',TRUE),
		'logo_kop' => $this->input->post('logo_kop',TRUE),
		'active' => $this->input->post('active',TRUE),
	    );

            $this->Profil_sekolah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profil_sekolah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Profil_sekolah_model->get_by_id($id);

        if ($row) {
            $this->Profil_sekolah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profil_sekolah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profil_sekolah'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_sekolah', 'nama sekolah', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nomor_telp', 'nomor telp', 'trim|required');
	$this->form_validation->set_rules('nama_pimpinan', 'nama pimpinan', 'trim|required');
	$this->form_validation->set_rules('logo_kop', 'logo kop', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Profil_sekolah.php */
/* Location: ./application/controllers/Profil_sekolah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-27 14:40:27 */
/* http://harviacode.com */