<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    public function insertData($data)
    {
    	$db = \Config\Database::connect();
    	$query = $db->table('contact');
    	$res = $query->insert($data);
    	if ($res->connID->affected_rows >= 1) {
    		return true;
    	}else{
    		return false;
    	}
    }
}