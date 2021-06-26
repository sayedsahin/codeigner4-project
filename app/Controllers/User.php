<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class User extends Controller
{
	public function index()
	{
		$db = \Config\Database::connect();
		$query = $db->query('SELECT username, email FROM user');
		$results = $query->getResult();
		echo "<pre>";
		print_r($results);
	}
	public function useremail()
	{
		$model = new UsersModel();
		$data['user'] = $model->getUserList();
		echo view('user_view', $data);
	}
}