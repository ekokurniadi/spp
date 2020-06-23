<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for (all) non logged in users
 */
class Login_siswa extends MY_Controller {	

	public function logged_in_check()
	{
		if ($this->session->userdata("logged_in")) {
			redirect("panel_siswa");
		}
	}

	public function index()
	{	
		$this->logged_in_check();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules("nis", "nis", "trim|required");
		$this->form_validation->set_rules("tanggal_lahir", "tanggal_lahir", "trim|required");
		if ($this->form_validation->run() == true) 
		{
			$this->load->model('auth_model2', 'auth');	
			// check the username & password of user
			$status = $this->auth->validate();
			if ($status == ERR_INVALID_USERNAME) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>NIS atau Tanggal Lahir Salah</div>');
			}
			elseif ($status == ERR_INVALID_PASSWORD) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close" style="">&times;</a>NIS atau Tanggal Lahir Salah</div>');
			}

			else
			{
				// success
				// store the user data to session
				$this->session->set_userdata($this->auth->get_data());
				$this->session->set_userdata("logged_in", true);
				// redirect to dashboard
				redirect("Panel_siswa");
			}
		}
		
		$this->load->view("login_siswa");
	}

	public function logout()
	{
		$this->session->unset_userdata("logged_in");
		$this->session->sess_destroy();
		redirect("login_siswa");
	}

	public function forget()
	{
		$this->load->view('forget');
	}

}