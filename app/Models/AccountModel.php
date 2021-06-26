<?php namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table      = 'users';

    public function getLoginData($email)
    {
        $builder = $this->db->table($this->table);
        $builder->select('username, password, status, uniid');
        $builder->where('email', $email);
        $query = $builder->get();
        if (count($query->getResultArray()) == 1) {
            //return $query->getRow(); //return stdobject
            return $query->getRowArray(); // return array
        }else{
            return false;
        }   
    }
    public function registration($data)
    {
    	$builder = $this->db->table($this->table);
    	$res = $builder->insert($data);
    	if ($this->db->affectedRows() == 1) {
    		return true;
    	}else{
    		return false;
    	}
    }
    public function getActibationData($uniid)
    {
        $builder = $this->db->table($this->table);
        $builder->select('status, uniid, activation_date');
        $builder->where('uniid', $uniid);
        $query = $builder->get();
        if (count($query->getResultArray()) == 1) {
            return $query->getRow();
        }else{
            return false;
        }   
    }
    public function updateActivation($uniid)
    {
        $builder = $this->db->table($this->table);
        $builder->where('uniid', $uniid);
        $builder->update(['status' => 'active']);
        if ($this->db->affectedRows() == 1) {
            return true;
        }else{
            return false;
        }
    }
    public function insertActivityInfo($data)
    {
        $builder = $this->db->table('login_activity');
        $builder->insert($data);
        if ($this->db->affectedRows() == 1) {
            return $this->db->insertID();
        }else{
            return false;
        }
    }
    public function updateActivityTime($id)
    {
        $builder = $this->db->table('login_activity');
        $builder->where('id', $id);
        $builder->update(['logout_at' => date('Y-m-d h:i:s')]);
        if ($this->db->affectedRows() == 1) {
            return true;
        }
    }
}