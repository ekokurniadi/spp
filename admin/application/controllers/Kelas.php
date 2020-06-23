<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kelas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kelas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kelas/index.html';
            $config['first_url'] = base_url() . 'kelas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kelas_model->total_rows($q);
        $kelas = $this->Kelas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kelas_data' => $kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('kelas_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_kelas' => $row->kode_kelas,
		'kelas' => $row->kelas,
	    );
            $this->load->view('header');
            $this->load->view('kelas_form_edit', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kelas/create_action'),
	    'id' => set_value('id'),
	    'kode_kelas' => set_value('kode_kelas'),
	    'kelas' => set_value('kelas'),
	);

        $data['kode']=$this->Kelas_model->kode();
        $this->load->view('header');
        $this->load->view('kelas_form', $data);
        $this->load->view('footer');
    }
    
    // public function create_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->create();
    //     } else {
    //         $data = array(
	// 	'kode_kelas' => $this->input->post('kode_kelas',TRUE),
	// 	'kelas' => $this->input->post('kelas',TRUE),
	//     );

    //         $this->Kelas_model->insert($data);
    //         $this->session->set_flashdata('message', 'Create Record Success');
    //         redirect(site_url('kelas'));
    //     }
    // }


    public function create_action() 
    {
        
        $kode_kelas=$this->input->post('kode_kelas');
        $kelas=$this->input->post('kelas');
        $kg=$this->input->post('kg[]');
        

        for ($i=0; $i < sizeof($kg); $i++) {    
            $data = array(
                'kode_kelas' => $kode_kelas,
                'kelas' => $kelas,
                // 'tanggal' => $tanggal,
                'nis' => $kg[$i],
                'ck'=>1,
                
                // 'kode_rule' => $this->input->post('kode_rule',TRUE),
            );
            
            $this->db->insert('detail_kelas',$data);
        }
            $data2=array(
                'kode_kelas'=>$kode_kelas,
                'kelas'=>$kelas
            );
            $this->db->insert('kelas',$data2);
            $this->session->set_flashdata('message', 'Data Berhasil disimpan');
            $this->session->set_flashdata('message_class', 'alert-success');
            redirect(site_url('kelas'));
        
    }

    public function create_action2() 
    {
        
        $kode_kelas=$this->input->post('kode_kelas');
        $kelas=$this->input->post('kelas');
        $kg=$this->input->post('kg[]');
        

        for ($i=0; $i < sizeof($kg); $i++) {    
            $data = array(
                'kode_kelas' => $kode_kelas,
                'kelas' => $kelas,
                // 'tanggal' => $tanggal,
                'nis' => $kg[$i],
                'ck'=>1,
                
                // 'kode_rule' => $this->input->post('kode_rule',TRUE),
            );
            
            $this->db->insert('detail_kelas',$data);
        }
            $this->session->set_flashdata('message', 'Data Berhasil disimpan');
            $this->session->set_flashdata('message_class', 'alert-success');
            redirect(site_url('kelas'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kelas/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode_kelas', $row->kode_kelas),
		'kelas' => set_value('kelas', $row->kelas),
	    );
            $this->load->view('header');
            $this->load->view('kelas_form_edit', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }
    
    public function update_action() 
    {
        $kode_kelas=$this->input->post('kode_kelas');
        $kelas=$this->input->post('kelas');
        $kg=$this->input->post('kg[]');
       $cek_data=$this->db->query("SELECT * FROM detail_kelas where nis='$kg'")->row_array();
       print_r($cek_data['nis']);
       if($cek_data['nis']==""){
        for ($i=0; $i < sizeof($kg); $i++) {    
            $data = array(
                'kode_kelas' => $kode_kelas,
                'kelas' => $kelas,
                'nis' => $kg[$i],
                'ck'=>1,
                
                // 'kode_rule' => $this->input->post('kode_rule',TRUE),
            );
            
            $this->db->insert('detail_kelas',$data);
        }
        
        $data2 = array(
            'kode_kelas' => $this->input->post('kode_kelas',TRUE),
            'kelas' => $this->input->post('kelas',TRUE),
            );
    
                $this->Kelas_model->update($this->input->post('id', TRUE), $data2);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('kelas'));
    }else{
        
            $data = array(
		'kode_kelas' => $this->input->post('kode_kelas',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
	    );

            $this->Kelas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kelas'));
     
    }   
    }
    
    public function delete($id) 
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->Kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kelas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_kelas', 'kode kelas', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-27 14:34:23 */
/* http://harviacode.com */