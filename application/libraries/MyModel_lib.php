<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel_lib {

  public function __construct()
  { 
      $this->CI =& get_instance();
      $this->CI->load->model('User_model');
      $this->CI->load->model('Home_model');
      $this->CI->load->model('Superadmin_model');
      $this->CI->load->library('pagination');
      $this->CI->load->library('form_validation');
  }
}
?>