<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class LoginAuth extends CI_Controller {
public function __construct()
{
  parent::__construct();
  $this->load->helper('url');
  $this->load->library('MyModel_lib');
  date_default_timezone_set('Asia/Kolkata');
  error_reporting(0);
  $current_date = Date('Y-m-d');
}

public function page_not_found()
{
    $data['title']='Edesign | OPPS!! Page Not Found';
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/pagenotfound/pagenotfond', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
}
public function LogoutJS()
{
    setcookie("user_id", "", time() - 3600);
    $this->session->sess_destroy();
    $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'You are Logout From Website'); 
    echo json_encode($data);  
}
public function Logout()
{
    setcookie("user_id", "", time() - 3600);
    $this->session->sess_destroy();
    redirect('Login'); 
}

public function index()
{
    $data['title']='Login | Eplanet';
    $this->load->view('loginauth/login', $data);
}

public function signup()
{
    $data['title']='Login | Eplanet';
    $this->load->view('loginauth/signup', $data);
}


public function Getcookie(){
  if(!empty($_COOKIE)){
      $user_id = $_COOKIE['user_id'];
      $successdata=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$user_id));
      if(!empty($successdata)){
       $this->session->set_userdata('user_id',$successdata->user_id);
       $this->session->set_userdata('full_name',$successdata->full_name);
       $this->session->set_userdata('mobile',$successdata->mobile);
       $this->session->set_userdata('email',$successdata->email);
       $this->session->set_userdata('user_type',$successdata->user_type);
       $this->session->set_userdata('wallet_amount',$successdata->wallet_amount);
       $dataarray =  array(
           'user_id'=>$successdata->user_id,
           'full_name'=>$successdata->full_name,
           'mobile'=>$successdata->mobile,
           'username'=>$successdata->username,
           'user_type'=>$successdata->user_type,
           );
           $data = array('statusCode' => '200','title' => 'Successfully Login', 'message'=> 'Please Login','data'=>$dataarray);
      }else{
       $data = array('statusCode' => '201','title' => 'Opps!!', 'message'=> 'Please Login');  
      } 
  }else{
    $data = array('statusCode' => '201','title' => 'Opps!!', 'message'=> 'Please Login');  
  }
 echo json_encode($data);   
    
}

public function LoginProcess()
{
  $username = $this->input->post('username');
  $loginpassword = $this->input->post('loginpassword');
  $successdata=$this->Superadmin_model->GetAllRowWhere('user',array('mobile'=>$username,'password'=>$loginpassword));
 if(!empty($successdata))
 {
  if($successdata->user_status=='Active'){

       $this->session->set_userdata('user_id',$successdata->user_id);
       $this->session->set_userdata('full_name',$successdata->full_name);
       $this->session->set_userdata('mobile',$successdata->mobile);
       $this->session->set_userdata('email',$successdata->email);
       $this->session->set_userdata('user_type',$successdata->user_type);
       $this->session->set_userdata('wallet_amount',$successdata->wallet_amount);
       $dataarray =  array(
           'user_id'=>$successdata->user_id,
           'full_name'=>$successdata->full_name,
           'mobile'=>$successdata->mobile,
           'username'=>$successdata->username,
           'user_type'=>$successdata->user_type,
           );
       setcookie('user_id',$successdata->user_id, time() + ( 365 * 24 * 60 * 60), "/");
    $data = array('statusCode' => '200','title' => 'Successfully','Usertype'=>$successdata->user_type, 'message'=> 'Login Successfully','data'=>$dataarray);
  }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Your Account is '.$successdata->user_status.' . Please Contact To Admin');
  }
}else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Incorrect Mobile/Username  OR Paasword');    
}
echo json_encode($data);  
}


public function SignUpProcess()
{
  $full_name = $this->input->post('full_name');
  $email = $this->input->post('email');
  $mobile_number = $this->input->post('mobile_number');
  $pin_code = $this->input->post('pin_code');
  $password = $this->input->post('password');
  $num = rand(1000, 9999);
  $emaildata=$this->Superadmin_model->GetAllRowWhere('user',array('email'=>$email));
  $mobiledata=$this->Superadmin_model->GetAllRowWhere('user',array('mobile'=>$mobile_number));
  if(!empty($emaildata)){
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Email-id Already Exists');
    echo json_encode($data);
    return; 
    }else if(!empty($mobiledata)){
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Mobile Number Already Exists');
    echo json_encode($data); 
    return;
    }else{
     if(!empty($full_name))
     {
        $dataarray =  array(
           'full_name'=>$full_name,
           'username'=>$full_name.$num,
           'profile_pic'=>'upload/userprofile/default_user.gif',
           'email'=>$email,
           'mobile'=>$mobile_number,
           'user_type'=>'User',
           'user_status'=>'Active',
           'password'=>$password,
           'wallet_amount'=>0,
           'pin_code'=>$pin_code,
           'user_created_date'=>Date('Y-m-d'),
           );
        $successstatus=$this->Superadmin_model->insertdata('user',$dataarray);
        if(!empty($successstatus)){
            $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Sign Up Successfully');
        }else{
            $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');  
        }
   }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');    
   }
 }
echo json_encode($data);  
}


}?>