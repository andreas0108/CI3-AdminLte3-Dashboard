<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->load->library('Nativesession', 'nativesession');
	}

	public function index()
	{
		// check if in the session already have userdata
		if ($this->session->userdata('email')) {

			// if in the userdata role_id = 1 redirect to admin page
			if ($this->session->userdata('role_id') == 1) {
				redirect('dashboard/home');
			} else {
				redirect('dashboard/user');
			}
		}

		// set the form validation
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'CI-App | Login';
			$this->load->view('dashboard/parts/auth_header', $data);
			$this->load->view('dashboard/auth/login', $data);
			$this->load->view('dashboard/parts/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// if user already registered
		if ($user) {
			// cek password
			// true
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id'],
					'id' => $user['id'],
				];
				$this->session->set_userdata($data);

				$this->db->set('status', '1');
				$this->db->where('id', $user['id']);
				$this->db->update('user');

				//cek role_id
				if ($user['role_id'] == 1) {
					redirect('dashboard/home');
				} else {
					redirect('dashboard/user');
				}
			} else {
				// false
				$this->session->set_flashdata(
					'flashmsg',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Wrong password!</strong> Please check again.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>'
				);
				redirect('login');
			}
		} else {
			// jika belum terdafar / salah
			$this->session->set_flashdata(
				'flashmsg',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email / Password wrong !</strong> Please check again.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
			);
			redirect('login');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('dashboard/user');
		}

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email already registered !'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password missmatch !',
			'min_length' => 'Password too short !'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		// default view / failed to regist

		if ($this->form_validation->run() == false) {
			$data['title'] = 'CI-App | Registration';
			$this->load->view('dashboard/parts/auth_header', $data);
			$this->load->view('dashboard/auth/registration');
			$this->load->view('dashboard/parts/auth_footer');
		} else {
			// registration succes, the data set to be save in database
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'img' => 'default.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'date_created' => time()
			];

			$this->db->insert('user', $data);

			$this->session->set_flashdata(
				'flashmsg',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registration Complete.</strong> Please login.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>'
			);
			redirect('login');
		}
	}

	public function changePassword()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('login');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|min_length[8]|matches[password1]');

		if ($this->form_validation->run() === false) {
			$data['title'] = 'CI-App | Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			$key = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$mail = $this->session->userdata('reset_email');

			$this->db->set('password', $key);
			$this->db->where('email', $mail);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');
			$this->db->delete('user_token', ['email' => $mail]);

			$this->session->set_flashdata(
				'flashmsg',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Password changed! </strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'
			);
			redirect('login');
		}
	}

	public function logout()
	{
		$this->db->set('status', '0');
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('user');

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata(
			'flashmsg',
			'<div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>You have been logged out !</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
		);
		redirect('login');
	}

	public function blocked()
	{
		$data['title'] = '403 : Access Forbidden';
		$data['title2'] = '';

		$this->load->view('dashboard/parts/auth_header', $data);
		$this->load->view('dashboard/auth/blocked');
		// $this->load->view('dashboard/parts/auth_footer');
	}
}
