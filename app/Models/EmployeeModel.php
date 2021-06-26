<?php namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table      = 'employee';
    protected $primaryKey = 'id';

    protected $returnType = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['name', 'email', 'mobile', 'salary', 'designation', 'city'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [
    	'name' => 'required|min_length[3]|max_length[10]',
		'email' => 'required|valid_email',
		'mobile' => 'required|numeric|exact_length[11]',
		'salary' => 'required',
		'designation' => 'required',
		'city' => 'required'
    ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}