<?php namespace App\Controllers;

use CodeIgniter\Controller;

class File extends Controller
{
	public $session;
	function __construct(){
		helper(['form']);
		$this->session = \Config\Services::session();
	}
	public function index()
	{
		
	}
	public function Upload()
	{
		$data = [];
		$data['validation'] = null;
		if ($this->request->getMethod() == 'post') {
			$rules = [
			    'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,png,jpg]'
			];
			if ($this->validate($rules)) {
				$file = $this->request->getFile('file');
				if ($file->isValid() && !$file->hasMoved()) {
					$newname = $file->getRandomName();
					if ($file->move(WRITEPATH.'/uploads', $newname)) {
						$this->session->setTempdata('success', 'File Uploaded Successfuly.',3);
						return redirect()->to(current_url());
					}else{
						$this->session->setTempdata('error', 'File is not Uploaded !',3);
						return redirect()->to(current_url());
					}
				}
			}else{
				$data['validation'] = $this->validator;
			}
		}
		return view('fileupload_view', $data);
	}
}