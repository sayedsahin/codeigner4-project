<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	//public $session;
	public $model;
	function __construct(){
		
		helper(['form', 'date']);
		//$this->session = \Config\Services::session();
		$this->model = new \App\Models\UsersModel();
	}
	public function Test()
	{
		echo "This is not With isLoggedUser Filter";
	}
	public function index()
	{
		$data = [];
		/*if (!session()->has('logged_user')) {
			return redirect()->to(base_url().'/account/login');
		}*/
		$uniid = session()->get('logged_user');
		$data['userdata'] = $this->model->getUserData($uniid);
		//print_r($data['userdata']);exit();
		return view('dashboard_view', $data);
	}
	public function login_activity()
	{
		/*if (!session()->has('logged_user')) {
			return redirect()->to(base_url().'/account/login');
		}*/
		$data = [];
		$uniid = session()->get('logged_user');
		$data['activity'] = $this->model->getActivityData($uniid);
		return view('login_activity_view', $data);
	}
	public function changePassword()
	{
		/*if (!session()->has('logged_user')) {
			return redirect()->to(base_url());
		}*/
		$data = [];
		$data['validation'] = null;
		$this->session = \Config\Services::session();
		$rules = [
			'oldpass' => 'required|min_length[6]|max_length[20]',
			'newpass' => 'required|min_length[6]|max_length[20]',
			'newpassre' => 'required|matches[newpass]',
		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$oldpass = $this->request->getVar('oldpass');
				$newpass = password_hash($this->request->getVar('newpass'), PASSWORD_DEFAULT);
				$uniid = session()->get('logged_user');
				$userdata = $this->model->getUserData($uniid);
				if (password_verify($oldpass, $userdata->password)) {
					if ($this->model->updatePassword($newpass, $uniid)) {
						$this->session->setTempdata('success', 'Password Updated Successfuly',3);
						return redirect()->to(current_url());
					}else{
						$this->session->setTempdata('error', 'Password Not Updated',3);
						return redirect()->to(current_url());
					}
				}else{
					$this->session->setTempdata('error', 'Old Password Does Not Match !',3);
					return redirect()->to(current_url());
				}
				
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('changepass_view', $data);
	}
}