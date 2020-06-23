<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spp extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Spp_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'spp/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'spp/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'spp/index.html';
            $config['first_url'] = base_url() . 'spp/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Spp_model->total_rows($q);
        $spp = $this->Spp_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'spp_data' => $spp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('spp_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Spp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_kelas' => $row->kode_kelas,
		'kelas' => $row->kelas,
		'biaya_spp' => $row->biaya_spp,
	    );
            $this->load->view('header');
            $this->load->view('spp_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spp'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('spp/create_action'),
	    'id' => set_value('id'),
	    'kode_kelas' => set_value('kode_kelas'),
	    'kelas' => set_value('kelas'),
	    'biaya_spp' => set_value('biaya_spp'),
	);

        $this->load->view('header');
        $this->load->view('spp_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_kelas' => $this->input->post('kode_kelas',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'biaya_spp' => $this->input->post('biaya_spp',TRUE),
	    );

            $this->Spp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('spp'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Spp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('spp/update_action'),
		'id' => set_value('id', $row->id),
		'kode_kelas' => set_value('kode_kelas', $row->kode_kelas),
		'kelas' => set_value('kelas', $row->kelas),
		'biaya_spp' => set_value('biaya_spp', $row->biaya_spp),
	    );
            $this->load->view('header');
            $this->load->view('spp_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spp'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_kelas' => $this->input->post('kode_kelas',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'biaya_spp' => $this->input->post('biaya_spp',TRUE),
	    );

            $this->Spp_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spp'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Spp_model->get_by_id($id);

        if ($row) {
            $this->Spp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('spp'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('spp'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_kelas', 'kode kelas', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('biaya_spp', 'biaya spp', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Spp.php */
/* Location: ./application/controllers/Spp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-04 14:58:49 */
/* http://harviacode.com */