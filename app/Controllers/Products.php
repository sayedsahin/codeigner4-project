<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Products extends ResourceController
{
    protected $model;
    function __construct()
    {
    	$this->model = new ProductModel();
    }

    public function index()
    {
    	$data = $this->model->getData();
        return $this->respond($data);
    }

    // ...
}