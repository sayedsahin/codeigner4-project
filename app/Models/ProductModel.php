<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'product';
    public function getData()
    {
    	$builder = $this->db->table($this->table);
        $builder->select();
        $query = $builder->get();
        if (count($query->getResultArray()) > 0) {
            return $query->getResult();
        }else{
            return false;
        } 
    }

}