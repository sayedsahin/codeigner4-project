<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Auto extends Controller
{
	protected $model;
	function __construct()
	{
		$this->model = new \App\Models\AutoModel();
	}
	public function index()
	{
		$data = $this->model->findAll(2, 1);
		echo "<pre>";
		print_r($data);
	}
}