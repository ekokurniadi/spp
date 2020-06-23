<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    protected $access = array('Admin', 'Pimpinan','Finance');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('user_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'username' => $row->username,
		'password' => $row->password,
		'role' => $row->role,
		'foto' => $row->foto,
	    );
            $this->load->view('header');
            $this->load->view('user_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'role' => set_value('role'),
	    'foto' => set_value('foto'),
	);

        $this->load->view('header');
        $this->load->view('user_form', $data);
        $this->load->view('footer');
    }
    

    public function create_action() 
    {
        $this->load->library('upload');
            $nmfile = "user".time();
            $config['upload_path']   = './image/';
            $config['overwrite']     = true;
            $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
            $config['file_name'] = $nmfile;

            $this->upload->initialize($config);

            if($_FILES['foto']['name'])
            {
                if($this->upload->do_upload('foto'))
                {
                $gbr = $this->upload->data();
                $data = array(
                    'foto' =>  $gbr['file_name'],
                    'nama' => $this->input->post('nama',TRUE),
                    'username' => $this->input->post('username',TRUE),
                    'password' => $this->input->post('password',TRUE),
                    'role' => $this->input->post('role',TRUE),
                );

                $this->User_model->insert($data);
                $_SESSION['pesan']="Successfully Save";
                $_SESSION['tipe']="success";
                redirect(site_url('user'));
            }
        }
    }

    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'role' => set_value('role', $row->role),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->load->view('header');
            $this->load->view('user_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->load->library('upload');
        $nmfile = "user".time();
        $config['upload_path']   = './image/';
        $config['overwrite']     = true;
        $config['allowed_types'] = 'gif|jpeg|png|jpg|bmp|PNG|JPEG|JPG';
        $config['file_name'] = $nmfile;

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
                                'nama' => $this->input->post('nama',TRUE),
                                'username' => $this->input->post('username',TRUE),
                                'password' => $this->input->post('password',TRUE),
                                'role' => $this->input->post('role',TRUE),
                                'foto' => $gbr['file_name'],
                            );
                        }
                    }
                  
                    $this->User_model->update($this->input->post('id', TRUE), $data);
                    $_SESSION['pesan']="Successfully Update";
                    $_SESSION['tipe']="warning";
                    redirect(site_url('user'));
                }
                    else
                        {
                            $data = array(
                                'nama' => $this->input->post('nama',TRUE),
                                'username' => $this->input->post('username',TRUE),
                                'password' => $this->input->post('password',TRUE),
                                'role' => $this->input->post('role',TRUE),
                            );
                        }
                    
                        $this->User_model->update($this->input->post('id', TRUE), $data);
                        $_SESSION['pesan']="Successfully Update";
                        $_SESSION['tipe']="warning";
                        redirect(site_url('user'));
    }
    // public function update_action() 
    // {
    //     $this->_rules();

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->update($this->input->post('id', TRUE));
    //     } else {
    //         $data = array(
	// 	'nama' => $this->input->post('nama',TRUE),
	// 	'username' => $this->input->post('username',TRUE),
	// 	'password' => $this->input->post('password',TRUE),
	// 	'role' => $this->input->post('role',TRUE),
	// 	'foto' => $this->input->post('foto',TRUE),
	//     );

    //         $this->User_model->update($this->input->post('id', TRUE), $data);
    //         $this->session->set_flashdata('message', 'Update Record Success');
    //         redirect(site_url('user'));
    //     }
    // }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $_SESSION['pesan']="Successfully Delete";
            $_SESSION['tipe']="danger";
            redirect(site_url('user'));
        } else {
            $_SESSION['pesan']="Record Not Found";
            $_SESSION['tipe']="warning";
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "user.xls";
        $judul = "user";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Role");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");

	foreach ($this->User_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->role);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=user.doc");

        $data = array(
            'user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user_doc',$data);
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-15 02:54:59 */
/* http://harviacode.com */