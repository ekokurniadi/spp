<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Osis extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Osis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'osis/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'osis/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'osis/index.html';
            $config['first_url'] = base_url() . 'osis/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Osis_model->total_rows($q);
        $osis = $this->Osis_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'osis_data' => $osis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('osis_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Osis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_kelas' => $row->kode_kelas,
		'kelas' => $row->kelas,
		'biaya_osis' => $row->biaya_osis,
	    );
            $this->load->view('header');
            $this->load->view('osis_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('osis'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('osis/create_action'),
	    'id' => set_value('id'),
	    'kode_kelas' => set_value('kode_kelas'),
	    'kelas' => set_value('kelas'),
        'biaya_osis' => set_value('biaya_osis'),
        'pilih_kelas'=>$this->db->get('kelas')->result()
	);

    
        $this->load->view('header');
        $this->load->view('osis_form', $data);
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
		'biaya_osis' => $this->input->post('biaya_osis',TRUE),
	    );

            $this->Osis_model->insert($data);
            $_SESSION['pesan']="Successfully Save";
            $_SESSION['tipe']="warning";
            redirect(site_url('osis'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Osis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('osis/update_action'),
		'id' => set_value('id', $row->id),
		'kode_kelas' => set_value('kode_kelas', $row->kode_kelas),
		'kelas' => set_value('kelas', $row->kelas),
        'biaya_osis' => set_value('biaya_osis', $row->biaya_osis),
        'pilih_kelas'=>$this->db->get('kelas')->result()
	    );
            $this->load->view('header');
            $this->load->view('osis_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('osis'));
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
        'biaya_osis' => $this->input->post('biaya_osis',TRUE),
        
	    );

            $this->Osis_model->update($this->input->post('id', TRUE), $data);
            $_SESSION['pesan']="Successfully Update";
            $_SESSION['tipe']="warning";
            redirect(site_url('osis'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Osis_model->get_by_id($id);

        if ($row) {
            $this->Osis_model->delete($id);
            $_SESSION['pesan']="Successfully Delete";
            $_SESSION['tipe']="warning";
            redirect(site_url('osis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('osis'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_kelas', 'kode kelas', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('biaya_osis', 'biaya osis', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Osis.php */
/* Location: ./application/controllers/Osis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-04 15:00:04 */
/* http://harviacode.com */