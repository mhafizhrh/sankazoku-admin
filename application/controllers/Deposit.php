<?php

error_reporting(0);

class Deposit extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('User_Model');

		if (!isset($this->session->user_id)) {
			
			redirect(base_url('auth/login'));

		}
	}

	public function index() {

		$user = $this->User_Model->user_data();

		$data['user_id'] 	= $user->user_id;
		$data['full_name'] 	= $user->full_name;
		$data['email'] 		= $user->email;
		$data['username'] 	= $user->username;
		$data['balance']	= $user->balance;
		$data['api_key']	= $user->api_key;

		$data['title'] = 'Deposit Manual';
		$data['date'] = date('Y');
		$this->load->view('header', $data);

		$this->load->view('footer', $data);
	}

	public function manual() {

		$user = $this->User_Model->user_data();

		$data['user_id'] 	= $user->user_id;
		$data['full_name'] 	= $user->full_name;
		$data['email'] 		= $user->email;
		$data['username'] 	= $user->username;
		$data['balance']	= $user->balance;
		$data['api_key']	= $user->api_key;

		$data['title'] = 'Deposit Manual';
		$data['date'] = date('Y');
		$this->load->view('header', $data);

		$this->load->view('footer', $data);
	}

	public function auto() {

		$user = $this->User_Model->user_data();

		$data['user_id'] 	= $user->user_id;
		$data['full_name'] 	= $user->full_name;
		$data['email'] 		= $user->email;
		$data['username'] 	= $user->username;
		$data['balance']	= $user->balance;
		$data['api_key']	= $user->api_key;

		$data['title'] = 'Deposit Otomatis';
		$data['date'] = date('Y');
		$this->load->view('header', $data);

		$this->load->view('footer', $data);
	}

	public function history() {

		$user = $this->User_Model->user_data();

		$data['user_id'] 	= $user->user_id;
		$data['full_name'] 	= $user->full_name;
		$data['email'] 		= $user->email;
		$data['username'] 	= $user->username;
		$data['balance']	= $user->balance;
		$data['api_key']	= $user->api_key;

		$data['title'] = 'Riwayat Deposit';
		$data['date'] = date('Y');
		$this->load->view('header', $data);

		$this->load->view('footer', $data);
	}
}