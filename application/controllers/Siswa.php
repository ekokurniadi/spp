<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends MY_Controller {

    // protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/index.dart?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/index.dart?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/index.dart';
            $config['first_url'] = base_url() . 'siswa/index.dart';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('siswa_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nis' => $row->nis,
		'nama_siswa' => $row->nama_siswa,
		'jenis_kelamin' => $row->jenis_kelamin,
		'agama' => $row->agama,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
		'nama_ayah' => $row->nama_ayah,
		'nama_ibu' => $row->nama_ibu,
		'no_telp_orang_tua' => $row->no_telp_orang_tua,
		'foto' => $row->foto,
	    );
            $this->load->view('header');
            $this->load->view('siswa_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
	    'id' => set_value('id'),
	    'nis' => set_value('nis'),
	    'nama_siswa' => set_value('nama_siswa'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'agama' => set_value('agama'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'alamat' => set_value('alamat'),
	    'nama_ayah' => set_value('nama_ayah'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'no_telp_orang_tua' => set_value('no_telp_orang_tua'),
	    'foto' => set_value('foto'),
	);

        $this->load->view('header');
        $this->load->view('siswa_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'no_telp_orang_tua' => $this->input->post('no_telp_orang_tua',TRUE),
		'foto' => $this->input->post('foto',TRUE),
	    );

            $this->Siswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('siswa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'id' => set_value('id', $row->id),
		'nis' => set_value('nis', $row->nis),
		'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'agama' => set_value('agama', $row->agama),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
		'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
		'no_telp_orang_tua' => set_value('no_telp_orang_tua', $row->no_telp_orang_tua),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('header');
            $this->load->view('siswa_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }
    
    // public function update_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->update($this->input->post('id', TRUE));
    //     } else {
    //         $data = array(
	// 	'nis' => $this->input->post('nis',TRUE),
	// 	'nama_siswa' => $this->input->post('nama_siswa',TRUE),
	// 	'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
	// 	'agama' => $this->input->post('agama',TRUE),
	// 	'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
	// 	'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
	// 	'alamat' => $this->input->post('alamat',TRUE),
	// 	'nama_ayah' => $this->input->post('nama_ayah',TRUE),
	// 	'nama_ibu' => $this->input->post('nama_ibu',TRUE),
	// 	'no_telp_orang_tua' => $this->input->post('no_telp_orang_tua',TRUE),
	// 	'foto' => $this->input->post('foto',TRUE),
	//     );

    //         $this->Siswa_model->update($this->input->post('id', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('siswa'));
    //     }
    // }

    public function update_action() 
    {
        $this->load->library('upload');
        $nmfile = "user".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
        $config['file_name'] = $_FILES['foto']['name'];

        $this->upload->initialize($config);
        
                if(!empty($_FILES['foto']['name']))
                {  
                        unlink("./image/".$this->input->post('foto'));

                    if($_FILES['foto']['name'])
                    {
                        if($this->upload->do_upload('foto'))
                        {
                            $gbr = $this->upload->data();
                            $data = array(
                                'nis' => $this->input->post('nis',TRUE),
                                'nama_siswa' => $this->input->post('nama_siswa',TRUE),
                                'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
                                'agama' => $this->input->post('agama',TRUE),
                                'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                                'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                                'alamat' => $this->input->post('alamat',TRUE),
                                'nama_ayah' => $this->input->post('nama_ayah',TRUE),
                                'nama_ibu' => $this->input->post('nama_ibu',TRUE),
                                'no_telp_orang_tua' => $this->input->post('no_telp_orang_tua',TRUE),
                                'foto' => $gbr['file_name'],
                            );
                        }
                    }
                  
                    $this->Siswa_model->update($this->input->post('id', TRUE), $data);
                    $this->session->set_flashdata('message', 'Update Record Success');
                    redirect(site_url('dashboard'));
                }
                    else
                        {
                            $data = array(
                                'nis' => $this->input->post('nis',TRUE),
                                'nama_siswa' => $this->input->post('nama_siswa',TRUE),
                                'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
                                'agama' => $this->input->post('agama',TRUE),
                                'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
                                'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
                                'alamat' => $this->input->post('alamat',TRUE),
                                'nama_ayah' => $this->input->post('nama_ayah',TRUE),
                                'nama_ibu' => $this->input->post('nama_ibu',TRUE),
                                'no_telp_orang_tua' => $this->input->post('no_telp_orang_tua',TRUE),
                            );
                        }
                    
                        $this->Siswa_model->update($this->input->post('id', TRUE), $data);
                        $this->session->set_flashdata('message', 'Update Record Success');
                        redirect(site_url('dashboard'));
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('siswa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	$this->form_validation->set_rules('no_telp_orang_tua', 'no telp orang tua', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-19 16:00:13 */
/* http://harviacode.com */