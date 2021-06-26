<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';

    public function getUserList()
    {
    	$db = \Config\Database::connect();
    	$query = $db->query('SELECT username, email FROM user');
    	$results = $query->getResult();
    	if (count($results) > 0) {
    		return $results;
    	}else{
    		return false;
    	}
    }
    public function getUserData($uniid)
    {
        $builder = $this->db->table($this->table);
        $builder->where('uniid', $uniid);
        $query = $builder->get();
        if (count($query->getResultArray()) == 1) {
            return $query->getRow(); //return stdobject
            //return $query->getRowArray(); // return array
        }else{
            return false;
        } 
    }
    public function getActivityData($uniid)
    {
        $builder = $this->db->table('login_activity');
        $builder->where('uniid', $uniid);
        $builder->orderBy('id', 'DESC');
        $builder->limit(10);
        $query = $builder->get();
        if (count($query->getResultArray()) > 0) {
            return $query->getResult();
        }else{
            return false;
        } 
    }
    public function updatePassword($password, $uniid)
    {
        $builder = $this->db->table($this->table);
        $builder->where('uniid', $uniid);
        $builder->update(['password' => $password]);
        if ($this->db->affectedRows() == 1) {
            return true;
        }else{
            return false;
        }
    }
}