<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeri extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Galeri_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'galeri/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'galeri/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'galeri/index.html';
            $config['first_url'] = base_url() . 'galeri/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Galeri_model->total_rows($q);
        $galeri = $this->Galeri_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'galeri_data' => $galeri,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('galeri_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Galeri_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'foto' => $row->foto,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('header');
            $this->load->view('galeri_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('galeri/create_action'),
	    'id' => set_value('id'),
	    'foto' => set_value('foto'),
	    'keterangan' => set_value('keterangan'),
	);

        $this->load->view('header');
        $this->load->view('galeri_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Galeri_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('galeri'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Galeri_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('galeri/update_action'),
		'id' => set_value('id', $row->id),
		'foto' => set_value('foto', $row->foto),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('header');
            $this->load->view('galeri_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'foto' => $this->input->post('foto',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Galeri_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('galeri'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Galeri_model->get_by_id($id);

        if ($row) {
            $this->Galeri_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('galeri'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('galeri'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Galeri.php */
/* Location: ./application/controllers/Galeri.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-04-23 08:42:03 */
/* http://harviacode.com */