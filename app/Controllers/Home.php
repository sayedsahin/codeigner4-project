<?php namespace App\Controllers;
class Home extends BaseController
{
	public $model;
	function __construct(){
		helper('form');
		$this->model = new \App\Models\ContactModel();
	}
	public function index()
	{
		//echo view('layouts/header');
		echo view('home_view');
		//echo view('layouts/footer');
	}

	public function about()
	{
		return view('about');
	}
	public function more()
	{
		echo view('layouts/header');
		echo view('more');
		echo view('layouts/footer');
	}
	public function email()
	{
		$email = \Config\Services::email();
		
		$email->setFrom('banglabaabu@gmail.com', 'Admin');
		$email->setTo('sahinsayed@gmail.com');
		//$email->setCC('another@example.com');
		//$email->setBCC('and@another.com');
		
		$email->setSubject('This is test email 2');
		$email->setMessage('<a href="http://bdjobs.com">Click</a> for verify.');
	
		if ($email->send()) {
			echo "Email Created Successfull";
		}else{
			$data = $email->printDebugger(['headers']);
			print_r($data);
		}
	}
	public function helpers()
	{
		helper(['form', 'array']);
		echo form_open();
		echo form_input();
		echo array_end([10,20,30,40]);
	}
	public function formValidation()
	{
		$data=[];
		$data['validation'] = NULL;
		/*$rules = [
			'username' => 'required',
			'password' => 'required',
			'email' => 'required|valid_email',
			'mobile' => 'required|numeric'
		];*/
		$rules = [
			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Username Alrady Exist !'
				]
			],
			'password' => 'required',
			'email' => 'required|valid_email',
			'mobile' => 'required|numeric'
		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				echo "Data Save Successfull";
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('form_view', $data);
	}
	public function contact()
	{
		$data = [];
		$data['validation'] = NULL;
		$session = \Config\Services::session();
		$rules = [
			'username' => 'required|min_length[3]|max_length[10]',
			'email' => 'required|valid_email',
			'mobile' => 'required|numeric|exact_length[11]',
			'message' => 'required'
		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$cdata = [
					'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
					'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
					'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
					'message' => $this->request->getVar('message', FILTER_SANITIZE_STRING)
				];
				$result = $this->model->insertData($cdata);
				if ($result) {
					$session->setTempdata('success', 'Data Submited Successfuly',3);
					return redirect()->to(current_url());
				}else{
					$session->setTempdata('error', 'Sorry, Data Not Submited',3);
					return redirect()->to(current_url());
				}
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('contact_view', $data);
	}
	public function redirect()
	{
		echo "<pre>";
		print_r($_GET);
		echo "</pre>";
	}
}