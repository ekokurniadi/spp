<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ekstrakurikuler extends MY_Controller {

    
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ekstrakurikuler_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ekstrakurikuler/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ekstrakurikuler/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ekstrakurikuler/index.html';
            $config['first_url'] = base_url() . 'ekstrakurikuler/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ekstrakurikuler_model->total_rows($q);
        $ekstrakurikuler = $this->Ekstrakurikuler_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ekstrakurikuler_data' => $ekstrakurikuler,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('ekstrakurikuler_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Ekstrakurikuler_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_kelas' => $row->kode_kelas,
		'kelas' => $row->kelas,
		'biaya_ekstrakurikuler' => $row->biaya_ekstrakurikuler,
	    );
            $this->load->view('header');
            $this->load->view('ekstrakurikuler_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ekstrakurikuler'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ekstrakurikuler/create_action'),
	    'id' => set_value('id'),
	    'kode_kelas' => set_value('kode_kelas'),
	    'kelas' => set_value('kelas'),
        'biaya_ekstrakurikuler' => set_value('biaya_ekstrakurikuler'),
        'pilih_kelas'=>$this->db->get('kelas')->result()
	);

        $this->load->view('header');
        $this->load->view('ekstrakurikuler_form', $data);
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
		'biaya_ekstrakurikuler' => $this->input->post('biaya_ekstrakurikuler',TRUE),
	    );
            
            $this->Ekstrakurikuler_model->insert($data);
            $_SESSION['pesan']="Successfully Save";
            $_SESSION['tipe']="success";
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ekstrakurikuler'));
        }
    }

    public function ambil_kelas()
    {
        $kode_kelas = $_POST['kode_kelas'];
        $data2 = $this->db->query("SELECT * from kelas where kode_kelas='$kode_kelas'")->result();
        foreach($data2 as $dd2)
        {
            $data2 =array(
                'kelas'=>$dd2->kelas,
            );
            
           echo json_encode($data2);
        }
    }
    
    public function update($id) 
    {
        $row = $this->Ekstrakurikuler_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ekstrakurikuler/update_action'),
		'id' => set_value('id', $row->id),
		'kode_kelas' => set_value('kode_kelas', $row->kode_kelas),
		'kelas' => set_value('kelas', $row->kelas),
        'biaya_ekstrakurikuler' => set_value('biaya_ekstrakurikuler', $row->biaya_ekstrakurikuler),
        'pilih_kelas'=>$this->db->get('kelas')->result()
	    );
            $this->load->view('header');
            $this->load->view('ekstrakurikuler_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ekstrakurikuler'));
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
		'biaya_ekstrakurikuler' => $this->input->post('biaya_ekstrakurikuler',TRUE),
	    );

            $this->Ekstrakurikuler_model->update($this->input->post('id', TRUE), $data);
            $_SESSION['pesan']="Successfully Update";
            $_SESSION['tipe']="warning";
            redirect(site_url('ekstrakurikuler'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ekstrakurikuler_model->get_by_id($id);

        if ($row) {
            $this->Ekstrakurikuler_model->delete($id);
            $_SESSION['pesan']="Successfully delete";
            $_SESSION['tipe']="danger";
            redirect(site_url('ekstrakurikuler'));
        } else {
            $_SESSION['pesan']="Record not found";
            $_SESSION['tipe']="warning";
            redirect(site_url('ekstrakurikuler'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_kelas', 'kode kelas', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('biaya_ekstrakurikuler', 'biaya ekstrakurikuler', 'trim|required|numeric');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "ekstrakurikuler.xls";
        $judul = "ekstrakurikuler";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Biaya ekstrakurikuler");

	foreach ($this->Ekstrakurikuler_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->biaya_ekstrakurikuler);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=ekstrakurikuler.doc");

        $data = array(
            'ekstrakurikuler_data' => $this->Ekstrakurikuler_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('ekstrakurikuler_doc',$data);
    }

}

/* End of file ekstrakurikuler.php */
/* Location: ./application/controllers/ekstrakurikuler.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-01 09:46:48 */
/* http://harviacode.com */