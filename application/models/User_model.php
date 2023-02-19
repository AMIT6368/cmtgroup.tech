<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model
{   
public function GetAllResult($table)
{
 $query=$this->db->get($table)->result(); 
 return $query;   
} 
public function GetAllResultWhere($table,$where)
{
 $this->db->where($where);
 $query=$this->db->get($table)->result(); 
 return $query;   
}  
public function GetAllRow($table)
{
 $query=$this->db->get($table)->row(); 
 return $query;   
}
public function GetAllRowWhere($table,$where)
{
 $this->db->where($where);
 $query=$this->db->get($table)->row(); 
 return $query;   
}
public function insertdata($table,$data)
{
$this->db->insert($table,$data);
return $this->db->insert_id();   
}

public function updatedata($table,$where,$data)
{
$this->db->where($where);
$query=$this->db->update($table,$data);
return $query;    
}
public function deletedata($table,$where)
{
$this->db->where($where);
$query=$this->db->delete($table);
return $query;   
}
public function userdatamembership($userID){
  $this->db->select('user.*,membership_plan.*');  
  $this->db->join('membership_plan','membership_plan.m_planid=user.plan_id');  
  $this->db->where('user.user_id',$userID);  
 $query=$this->db->get('user')->row(); 
 return $query; 
}

public function UpdateLimit($userID)
{
$this->db->set('contain_today_limit', 'contain_today_limit-1', FALSE);
$this->db->where('user_id',$userID);
$query=$this->db->update('user');
return $query; 
}

}?>