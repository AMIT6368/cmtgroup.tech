<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model
{
public function GetAllResultWhere($table,$where)
{
 $this->db->where($where);
 $query=$this->db->get($table)->result(); 
 return $query;   
}   
public function GetAllRowWhere($table,$where)
{
 $this->db->where($where);
 $query=$this->db->get($table)->row(); 
 return $query;   
}
public function GetAllResult($table)
{
 $query=$this->db->get($table)->result(); 
 return $query;   
}  
public function GetAllResultDistinct($table,$distinct)
{
 $query=$this->db->distinct($distinct);
 $query=$this->db->get($table)->result(); 
 return $query;   
} 



public function GetAllRow($table)
{
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

public function AmountTotalTypeSum($table,$where,$ColName)
{
$this->db->select_sum($ColName);
$this->db->where($where);
$query = $this->db->get($table);
return $query->row();  
}


public function AmountTotalTypeSumDate($table,$where,$ColName)
{
$this->db->select_sum($ColName);
$this->db->where($where);
$query = $this->db->get($table);
return $query->row();  
}
    
}?>