<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model2 extends CI_Model {

	private $table = "siswa";
	private $_data = array('tanggal_lahir');

	public function validate()
	{
		$username = $this->input->post('nis');
		$password = $this->input->post('tanggal_lahir');
		$kode = $this->input->post('captcha');
		$mycaptcha 	= $this->session->userdata('mycaptcha');

		$this->db->where("nis", $username);
		$query = $this->db->get($this->table);
		if($kode==$mycaptcha){
			return ERR_CP;
		}else{
			if ($query->num_rows()) 
		{
			// found row by username	
			$row = $query->row_array();

			// now check for the password
			if ($row['tanggal_lahir'] == $password)
			{
				// we not need password to store in session
				unset($row['tanggal_lahir']);
				$this->_data = $row;
				return ERR_NONE;
			}

			// password not match
			return ERR_INVALID_PASSWORD;
		}
		else {
			// not found
			return ERR_INVALID_USERNAME;
		}
		}
		
	}

	public function get_data()
	{
		return $this->_data;
	}

}