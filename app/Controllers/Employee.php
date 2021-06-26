<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Employee extends Controller
{
	protected $model;
	function __construct()
	{
		$this->model = new \App\Models\EmployeeModel();
		helper('form');
	}
	public function index()
	{
		$this->getData();
	}
	public function getData()
	{
		$data['employee'] = $this->model->findAll(); 
		echo view('employee_get_view', $data);
	}
	public function saveData()
	{
		$data = [];
		if ($this->request->getMethod() == 'post') {
			$edata = [
				'name'=> $this->request->getVar('name', FILTER_SANITIZE_STRING),
				'email'=> $this->request->getVar('email', FILTER_SANITIZE_STRING),
				'mobile'=> $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
				'salary'=> $this->request->getVar('salary', FILTER_SANITIZE_STRING),
				'designation'=> $this->request->getVar('designation', FILTER_SANITIZE_STRING),
				'city'=> $this->request->getVar('city', FILTER_SANITIZE_STRING)
			];
			$save = $this->model->save($edata);
			if ($save === true) {
				$data['success'] = 'Data Save Successfuly.';
			}else{
				$data['error'] = $this->model->errors();
			}
		}
		echo view('employee_save_view', $data);
	}
	public function editdata(int $id=null)
	{
		$data['employee'] = $this->model->find($id);
		if ($this->request->getMethod() == 'post') {
			$edata = [
				'name'=> $this->request->getVar('name', FILTER_SANITIZE_STRING),
				'mobile'=> $this->request->getVar('mobile', FILTER_SANITIZE_STRING),
				'salary'=> $this->request->getVar('salary', FILTER_SANITIZE_STRING),
				'designation'=> $this->request->getVar('designation', FILTER_SANITIZE_STRING),
				'city'=> $this->request->getVar('city', FILTER_SANITIZE_STRING)
			];
			$save = $this->model->update($id, $edata);
			if ($save === true) {
				$data['success'] = 'Data Update Successfuly.';
			}else{
				$data['error'] = $this->model->errors();
			}
		}
		echo view('employee_edit_view', $data);
	}
	public function deleteData(int $id=null)
	{
		$data = $this->model->where('id', $id)->delete();
		if ($data) {
			session()->setTempdata('success', 'Data Deleted Successfuly',3);
			return redirect()->to(base_url().'/employee');
		}else{
			session()->setTempdata('error', 'Data Not Deleted !',3);
			return redirect()->to(base_url().'/employee');
		}
	}
}
