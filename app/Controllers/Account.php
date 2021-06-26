<?php namespace App\Controllers;

use CodeIgniter\Controller;
class Account extends Controller
{
	public $session;
	public $model;
	function __construct(){
		
		helper(['form', 'date']);
		$this->session = \Config\Services::session();
		$this->model = new \App\Models\AccountModel();
	}
	public function index()
	{
		$this->login();
	}
	public function login()
	{
		if (session()->has('logged_user')) {
			return redirect()->to(base_url());
		}
		$data['validation'] = null;
		
		$rules = [
			'email' => 'required|valid_email',
			'password' => 'required|min_length[6]|max_length[20]',
		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				$userdata = $this->model->getLoginData($email);
				if ($userdata) {
					if (password_verify($password, $userdata['password'])) {
						if ($userdata['status'] != 'inactive') {
							$activity = [
								'uniid' => $userdata['uniid'],
								'agent' => $this->userAgentInfo(),
								'ip' => $this->request->getIPAddress()
							];
							$activity_id = $this->model->insertActivityInfo($activity);
							if ($activity_id) {
								$this->session->set('activity_id', $activity_id);
							}
							$this->session->set('logged_user', $userdata['uniid']);
							return redirect()->to(base_url());
						}else{
							$this->session->setTempdata('error', 'Your Account is Not Varified. Please Check Your Email or Contact With Admin.',3);
							return redirect()->to(current_url());
						}
					}else{
						$this->session->setTempdata('error', 'This Password Is Wrong !',3);
						return redirect()->to(current_url());
					}
				}else{
					$this->session->setTempdata('error', 'Sorry, your account is not found !',3);
					return redirect()->to(current_url());
				}
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('login_view', $data);
	}
	public function login_throttler()
	{
		if (session()->has('logged_user')) {
			return redirect()->to(base_url());
		}
		$data['validation'] = null;
		
		$rules = [
			'email' => 'required|valid_email',
			'password' => 'required|min_length[6]|max_length[20]',
		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$email = $this->request->getVar('email');
				$password = $this->request->getVar('password');
				//Request Limit
				$throttler = \Config\Services::throttler();
				$check = $throttler->check('login', 3, MINUTE);
				if ($check) {
					$userdata = $this->model->getLoginData($email);
					if ($userdata) {
						if (password_verify($password, $userdata['password'])) {
							if ($userdata['status'] != 'inactive') {
								$activity = [
									'uniid' => $userdata['uniid'],
									'agent' => $this->userAgentInfo(),
									'ip' => $this->request->getIPAddress()
								];
								$activity_id = $this->model->insertActivityInfo($activity);
								if ($activity_id) {
									$this->session->set('activity_id', $activity_id);
								}
								$this->session->set('logged_user', $userdata['uniid']);
								return redirect()->to(base_url());
							}else{
								$this->session->setTempdata('error', 'Your Account is Not Varified. Please Check Your Email or Contact With Admin.',3);
							}
						}else{
							$this->session->setTempdata('error', 'This Password Is Wrong !',3);
						}
					}else{
						$this->session->setTempdata('error', 'Sorry, your account is not found !',3);
					}
				}else{
					$this->session->setTempdata('error', 'Maximum number of login attempts. Try again after a minute !',3);
				}
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('login_view', $data);
	}
	public function googleAuth()
	{
		require_once APPPATH .'libraries/vendor/autoload.php';
		$client = new \Google_Client();
		$client->setClientId('282460309763-73ei654eknb1brb0te281mnpug94rgs0.apps.googleusercontent.com');
		$client->setClientSecret('aq2pYI0WqF4QIzIyx3XNohhs');
		$client->setRedirectUri('http://localhost/ci/public/account/googleauth');
		$client->addScope('email');
		$client->addScope('profile');
		if (!$this->session->get('logged_user') && !$this->request->getVar('code')) {
			$client_url = $client->createAuthUrl();
			return redirect()->to($client_url);
		}
		if ($this->request->getVar('code')) {
			$code = $this->request->getVar('code');
			$token = $client->fetchAccessTokenWithAuthCode($code);
			if (!isset($token['error'])) {
				$client->setAccessToken($token['access_token']);
				$this->session->set('logged_user', $token['access_token']);
				$client_service = new Google_Service_Oauth2($client);
				$gdata = $client_service->userinfo->get();
				print_r($gdata);
			}
		}
		
	}
	public function googleAuthCallback()
	{
		
	}
	public function signup()
	{
		if (session()->has('logged_user')) {
			return redirect()->to(base_url());
		}
		$data['validation'] = null;
		$this->session = \Config\Services::session();
		$rules = [
			'username' => 'required|min_length[3]|max_length[10]',
			'email' => 'required|valid_email',
			'password' => 'required|min_length[6]|max_length[20]',
			're-password' => 'required|matches[password]',
			'mobile' => 'required|numeric|exact_length[11]'
		];
		if ($this->request->getMethod() == 'post') {
			if ($this->validate($rules)) {
				$uniid = uniqid();
				$cdata = [
					'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
					'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
					'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
					'mobile' => $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
					'uniid' => $uniid,
					'activation_date' => date('Y-m-d h:i:s')
				];
				if ($this->model->registration($cdata)) {
				
					$msg = 'Hi '.$this->request->getVar('username').'! Your Account Created Successfull. Please Click The bleow Link And Active Your Account. <br> <a href="'.base_url().'/account/activation/'.$uniid.'">Click This</a>';
					$email = \Config\Services::email();
					$email->setFrom('banglabaabu@gmail.com', 'Info');
					$email->setTo($this->request->getVar('email'));
					$email->setSubject('Account Vaiyfy');
					$email->setMessage($msg);
				
					if ($email->send()) {
						$this->session->setTempdata('success', 'Account Created Successfuly. Check Your Mail And Active Your Account.',3);
						return redirect()->to(current_url());
					}else{
						$this->session->setTempdata('error', 'Account Created Successfuly. But Activation Link Not A Sent. Please Contuct With Admin.',3);
						return redirect()->to(current_url());
					}
				}else{
					$this->session->setTempdata('error', 'Sorry, Data Not Submited',3);
					return redirect()->to(current_url());
				}
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('signup_view', $data);
	}
	public function logout()
	{
		if (session()->has('activity_id')) {
			$activity_id = session()->get('activity_id');
			$this->model->updateActivityTime($activity_id);
		}
		session()->remove('logged_user');
		session()->destroy();
		return redirect()->to(base_url().'/account/login');
	}
	public function activation($uniid=null)
	{
		$data = [];
		if ($uniid != null) {
			$userdata = $this->model->getActibationData($uniid);
			if ($userdata) {
				if ($this->verifyExpir($userdata->activation_date)) {
					if ($userdata->status == 'inactive') {
						$status = $this->model->updateActivation($uniid);
						if ($status == true) {
							$data['success'] = 'Account Activation Successfully !';
						}
					}else{
						$data['success'] = 'Your Account Already Active.';
					}
				}else{
					$data['error'] = 'Sorry, activation link was expire !';
				}
			}else{
				$data['error'] = 'Sorry, We are unable to find your account !';
			}
		}else{
			$data['error'] = 'Your Request is Unable !';
		}
		return view('activation_view', $data);
	}
	public function verifyExpir($time)
	{
		$currenttime = now();
		$regtime = strtotime($time);
		$difftime = (int) $currenttime - (int) $regtime;
		if ($difftime < 86400) { //24 hours
			return true;
		}else{
			return false;
		}
	}
	public function userAgentInfo()
	{
		$agent = $this->request->getUserAgent();

		if ($agent->isBrowser()){
			$currentAgent = $agent->getBrowser().' '.$agent->getVersion();
		}
		elseif ($agent->isRobot()){
			$currentAgent = $this->agent->robot();
		}
		elseif ($agent->isMobile()){
			$currentAgent = $agent->getMobile();
		}
		else{
			$currentAgent = 'Unidentified User Agent';
		}
		return $currentAgent;
	}
}
