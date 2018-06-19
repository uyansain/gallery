<?php
	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Бүртгүүлэх';

			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				//set message
				$this->session->set_flashdata('user_registered', 'Та амжилттай бүртгүүллээ. Одоо та нэвтэрч болно.');

				redirect('posts');
			}
		}
		// login user
		public function login(){
			$data['title'] = 'Нэвтрэх';

			
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{
				//get username
				$username = $this->input->post('username');
				//get and encrypt the password
				$password = md5($this->input->post('password'));

				//Login user
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'password' => $password,
						'logged_in' => true
					);
					// session saves this user data
					$this->session->set_userdata($user_data);
					//set message
					$this->session->set_flashdata('user_loggedin', 'Та амжилттай нэвтэрлээ.');
					redirect('posts');
				} else {
					//set message
					$this->session->set_flashdata('login_failed', 'Зөв мэдээлэл оруулна уу.');
					redirect('users/login');
				}
				
			}
		}

		public function logout(){
			// unset userdata
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			//set message
			$this->session->set_flashdata('user_loggedout', 'Та системээс гарсан байна.');
			redirect('users/login');
		}

		// check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists','Ийм нэртэй хэрэглэгч байгаа тул өөр нэр сонгоно уу?');
			if ($this->user_model->check_username_exists($username)) {
				return true;
			} else {
				return false;
			}
		}

		// check if username exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists','Ийм цахим шуудантай хэрэглэгч байгаа тул та өөрийг сонгоно уу?');
			if ($this->user_model->check_email_exists($email)) {
				return true;
			} else {
				return false;
			}
		}


	}


?>