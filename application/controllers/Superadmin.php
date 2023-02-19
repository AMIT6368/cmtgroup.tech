<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Superadmin extends CI_Controller {
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
    $data['title']='Login | Edesign-Let’s make something different';
    $this->load->view('superadmin/login/login', $data);
}

public function Getcookie(){
  if(!empty($_COOKIE)){
      $user_id = $_COOKIE['user_id'];
      $successdata=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$user_id));
      if(!empty($successdata)){
           $this->session->set_userdata('user_id',$successdata->user_id);
           $this->session->set_userdata('first_name',$successdata->first_name);
           $this->session->set_userdata('last_name',$successdata->last_name);
           $this->session->set_userdata('mobile',$successdata->mobile);
           $this->session->set_userdata('email',$successdata->email);
           $this->session->set_userdata('user_type',$successdata->user_type);
           $this->session->set_userdata('wallet_amount',$successdata->wallet_amount);
           $dataarray =  array(
           'user_id'=>$successdata->user_id,
           'full_name'=>$successdata->first_name .' '.$successdata->last_name,
           'mobile'=>$successdata->mobile,
           'username'=>$successdata->username,
           'user_type'=>$successdata->user_type,
           );
           $data = array('statusCode' => '200','title' => 'Successfully Login', 'message'=> 'Please Login','data'=>$dataarray,'Document_verify_status'=>$successdata->file_upload_status);
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
       $this->session->set_userdata('first_name',$successdata->first_name);
       $this->session->set_userdata('last_name',$successdata->last_name);
       $this->session->set_userdata('mobile',$successdata->mobile);
       $this->session->set_userdata('email',$successdata->email);
       $this->session->set_userdata('user_type',$successdata->user_type);
       $this->session->set_userdata('wallet_amount',$successdata->wallet_amount);
       $dataarray =  array(
           'user_id'=>$successdata->user_id,
           'full_name'=>$successdata->first_name .' '.$successdata->last_name,
           'mobile'=>$successdata->mobile,
           'username'=>$successdata->username,
           'user_type'=>$successdata->user_type,
           );
       setcookie('user_id',$successdata->user_id, time() + ( 365 * 24 * 60 * 60), "/");
    $data = array('statusCode' => '200','title' => 'Successfully','Usertype'=>$successdata->user_type, 'message'=> 'Login Successfully','data'=>$dataarray,'Document_verify_status'=>$successdata->file_upload_status);
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
  $first_name = $this->input->post('first_name');
  $last_name = $this->input->post('last_name');
  $email = $this->input->post('email');
  $mobile_number = $this->input->post('mobile_number');
  $dob = $this->input->post('dob');
  $password = $this->input->post('password');
  $pan_number = $this->input->post('pan_number');
  $adhar_card = $this->input->post('adhar_card');
  $num = rand(1000, 9999);
  $emaildata=$this->Superadmin_model->GetAllRowWhere('user',array('email'=>$email));
  $mobiledata=$this->Superadmin_model->GetAllRowWhere('user',array('mobile'=>$mobile_number));
  $pan_numberdata=$this->Superadmin_model->GetAllRowWhere('user',array('pan_number'=>$pan_number));
  $adhar_carddata=$this->Superadmin_model->GetAllRowWhere('user',array('addhar_card'=>$adhar_card));
  if(!empty($emaildata)){
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Email-id Already Exists');
    echo json_encode($data);
    return; 
    }else if(!empty($mobiledata)){
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Mobile Number Already Exists');
    echo json_encode($data); 
    return;
    }else if(!empty($pan_numberdata)){
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'PanCard Number Already Exists');
    echo json_encode($data);
    return; 
    }else if(!empty($adhar_carddata)){
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'AadharCard Number Already Exists'); 
    echo json_encode($data);
    return;
    }else{
     if(!empty($first_name))
     {
        $dataarray =  array(
           'first_name'=>$first_name,
           'last_name'=>$last_name,
           'username'=>$last_name.$first_name.$num,
           'profile_pic'=>'upload/userprofile/default_user.gif',
           'email'=>$email,
           'mobile'=>$mobile_number,
           'user_type'=>'User',
           'user_status'=>'Active',
           'password'=>$password,
           'wallet_amount'=>0,
           'pan_number'=>$pan_number,
           'addhar_card'=>$adhar_card,
           'date_of_birth'=>$dob,
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

public function Dashboard()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Dashboard';
   

    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/dashboard/dashboard', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 

public function ActiveUser()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Active User';
    $data['user_detail']=$this->Superadmin_model->GetAllResultWhere('user',array('user_type'=>'User','user_status'=>'Active'));
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/user/active_member_list', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 

public function DeactiveUser()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
     $data['user_detail']=$this->Superadmin_model->GetAllResultWhere('user',array('user_type'=>'User','user_status'=>'Deactive'));
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/user/deactive_member_list', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 

public function UserDetail($user_id)
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
    
    $this->load->library('form_validation');
        $this->form_validation->set_rules('user_graph_name', 'FIle Name', 'trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            if ($this->form_validation->error_string() != "")
             {
                $data["error"] = '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> ' . $this->form_validation->error_string() . '</div>';
            }
        }else{

         $all_ready_exit = $this->Superadmin_model->SCustomSetting($user_id);

         $this->session->set_flashdata("success_req", ' <div class="alert alert-success" role="alert"><strong>SUCCESS </strong> Update Sucessfully..</div>');
          redirect("SUserDetail/$user_id");
        }

    
     $data['user_detail']=$this->Superadmin_model->GetAllResultWhere('user',array('user_type'=>'User','user_status'=>'Deactive'));
     $data['selected_user_detail']=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$user_id));
     $data['profitlosshistory']=$this->Superadmin_model->GetAllResultWhere('ProfitLoss',array('user_id'=>$user_id));
     $data['wallet_history']=$this->Superadmin_model->GetAllResultWhere('wallet_history',array('user_id'=>$user_id));
     
     $data['Credit'] =$this->Home_model->AmountTotalTypeSum('wallet_history',array('user_id '=>$user_id,'amount_type'=>'Credit'),'amount');
     $data['Debit'] =$this->Home_model->AmountTotalTypeSum('wallet_history',array('user_id '=>$user_id,'amount_type'=>'Debit'),'amount');
     $data['Withdraw'] =$this->Home_model->AmountTotalTypeSum('wallet_history',array('user_id '=>$user_id,'amount_type'=>'Withdraw'),'amount');
     $data['Profit'] =$this->Home_model->AmountTotalTypeSum('ProfitLoss',array('user_id '=>$user_id,'pl_type'=>'Profit'),'pl_amount');
     $data['Loss'] =$this->Home_model->AmountTotalTypeSum('ProfitLoss',array('user_id '=>$user_id,'pl_type'=>'Loss'),'pl_amount');
     
     
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/user/MemberDetail', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
}




public function CustomSetting()
{if($this->session->userdata('user_id')=='') {redirect('Login');}

         $this->load->library('form_validation');
        $this->form_validation->set_rules('mobile_number', 'mobile_number', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('app_name', 'app_name', 'trim|required');
        if ($this->form_validation->run() == FALSE) 
        {
            if ($this->form_validation->error_string() != "")
             {
                $data["error"] = '<div class="alert alert-danger" role="alert"><strong>Warning!</strong> ' . $this->form_validation->error_string() . '</div>';
            }
        }else{

         $all_ready_exit = $this->Superadmin_model->SCustomSettingContactUs();

         $this->session->set_flashdata("success_req", ' <div class="alert alert-success" role="alert"><strong>SUCCESS </strong> Update Sucessfully..</div>');
          redirect("SCustomSetting");
        }

    $data['title']='Algo Trade | Deactive User';
    $data['user_detail_ghaph']=$this->Superadmin_model->GetAllRowWhere('contact_us',array('cu_id'=>'1'));
    $data['user_detail']=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/CustomSetting/CustomSetting', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 


public function Profile()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
     $data['user_detail']=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/Profile/Profile', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 


public function FailedPaymentDetail()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
    $data['WithdrawStatus']=$this->Superadmin_model->GetAllResultWhereJoin('TXN_FAILURE');
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/payment/FailedPayment', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 

//// Withdraw Start

public function WithdrawDetailPending()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
    $data['WithdrawStatus']=$this->Superadmin_model->GetAllResultWithdrawal('Pending');
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/Withdraw/Pending', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 


public function WithdrawDetailApproval()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
    $data['WithdrawStatus']=$this->Superadmin_model->GetAllResultWithdrawal('Approve');
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/Withdraw/Approval', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 


public function WithdrawDetailReject()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
    $data['WithdrawStatus']=$this->Superadmin_model->GetAllResultWithdrawal('Reject');
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/Withdraw/Reject', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 

//// Withdraw END

public function SuccessPaymentDetail()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
    $data['title']='Algo Trade | Deactive User';
     $data['user_detail']=$this->Superadmin_model->GetAllResultWhere('user',array('user_type'=>'User','user_status'=>'Deactive'));
      $data['Paymenthistory']=$this->Superadmin_model->GetAllResultWhereJoin('TXN_SUCCESS');
    $this->load->view('backend/superadmin/layout/header', $data);
    $this->load->view('backend/superadmin/layout/sidebar', $data);
    $this->load->view('backend/superadmin/payment/SuccessPayment', $data);
    $this->load->view('backend/superadmin/layout/footer', $data);
} 



public function UserChangeStatus()
{
  $user_id = $this->input->post('user_id');
  $status = $this->input->post('status');  
  if(!empty($user_id) && !empty($status))
  {
      $dataarray =  array(
       'user_status'=>$status,
       );
       $successdata=$this->Superadmin_model->updatedata('user',array('user_id '=>$user_id),$dataarray);
       if($successdata){
           $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully User ' .$status);   
       }else{
           $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again.');     
       }
  }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Unknown User Found');    
  }
echo json_encode($data); 
}


public function UpdateSattelamount()
{
  $user_id = $this->input->post('user_id');
  $pl_id = $this->input->post('pl_id');
  $pl_amount_status = $this->input->post('pl_amount_status');  
  $pl_amount = $this->input->post('pl_amount');  
  if(!empty($user_id) && !empty($pl_id) && !empty($pl_amount_status))
  {
      $dataarray =  array(
       'pl_type'=>$pl_amount_status,
       );
       $successdata=$this->Superadmin_model->updatedata('ProfitLoss',array('user_id '=>$user_id,'pl_id '=>$pl_id),$dataarray);
       if($successdata){
           
           $successdata=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$user_id));
           
           $wallet_amount = $successdata->wallet_amount ? $successdata->wallet_amount:0;
           if($pl_amount_status == 'Loss'){
               $final_amount = $wallet_amount-$pl_amount;
           }else if($pl_amount_status == 'Profit'){
                $final_amount = $wallet_amount+$pl_amount;
           }else{
               $final_amount = $wallet_amount;
           }
           
              $wallet_amount_data =  array(
               'wallet_amount'=>$final_amount,
              );
       
            $successdata=$this->Superadmin_model->updatedata('user',array('user_id '=>$user_id),$wallet_amount_data);
           
           
           $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Satteled Amount ' .$status);   
       }else{
           $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again.');     
       }
  }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Unknown Error Found');    
  }
echo json_encode($data); 
}



public function UserChangeStatusofMargin()
{
  $user_id = $this->input->post('user_id');
  $spend_amount = $this->input->post('spend_amount');  
  $spend_status = $this->input->post('spend_status');  
  $spend_date = $this->input->post('spend_date');  
  $spend_comment = $this->input->post('spend_comment');  
  $original_amout = $this->input->post('original_amout');  
  if(!empty($user_id) && !empty($spend_amount))  
  {
      
       
       $wallet_history_data =  array(
       'user_id'=>$user_id,
       'amount'=>$spend_amount,
       'amount_type'=>'Debit',
       'amount_type_status'=>'Approve',
       'amount_comment'=>$spend_comment,
       'date_of_acion'=>$spend_date,
       );
       
       $wallet_history_data_success=$this->Superadmin_model->insertdata('wallet_history',$wallet_history_data);
       
     $ProfitLoss_data =  array(
       'wallet_history_id'=>$wallet_history_data_success,
       'user_id'=>$user_id,
       'pl_amount'=>$spend_amount,
       'pl_type'=>'Pending',
       'pl_amount_status'=>$spend_status,
       'pl_date'=>Date('Y-m-d'),
       'pl_comment'=>$spend_comment,
       );
       
       $wallet_history_data_success=$this->Superadmin_model->insertdata('ProfitLoss',$ProfitLoss_data);
       
    //   $wallet_amount_data =  array(
    //   'wallet_amount'=>($original_amout)-($spend_amount),
    //   );
       
    //   $successdata=$this->Superadmin_model->updatedata('user',array('user_id '=>$user_id),$wallet_amount_data);
       if($wallet_history_data_success){
           $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully User ' .$status);   
       }else{
           $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again.');     
       }
  }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Unknown User Found');    
  }
echo json_encode($data); 
}



public function UserChangeWalletAmount()
{
  $user_id = $this->input->post('user_id');
  $add_amount = $this->input->post('add_amount');   
  if(!empty($user_id) && !empty($add_amount))  
  {
      
      $userdata=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$user_id));
      $wallet_amount =   $userdata->wallet_amount ? $userdata->wallet_amount:0;
      $add_amount_final =   $add_amount ? $add_amount:0;


       $wallet_history_data =  array(
       'user_id'=>$user_id,
       'amount'=>$add_amount,
       'amount_type'=>'Credit',
       'amount_type_status'=>'Approve',
       'amount_comment'=>'Added By Admin Manual',
       'date_of_acion'=>Date('Y-m-d'),
       'added_by'=>'Manual',
       );
       
       $wallet_history_data_success=$this->Superadmin_model->insertdata('wallet_history',$wallet_history_data);
       
     
       if($wallet_history_data_success){
          $wallet_amount_data =  array(
             'wallet_amount'=>($wallet_amount)+($add_amount_final)
           );
       
      $successdata=$this->Superadmin_model->updatedata('user',array('user_id '=>$user_id),$wallet_amount_data);


           $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully User ' .$status);   
       }else{
           $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again.');     
       }
  }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Unknown User Found');    
  }
echo json_encode($data); 
}


public function UserChangeWithdrawlAmount()
{
  $user_id = $this->input->post('user_id');
  $wallet_id = $this->input->post('wallet_id');   
  $admin_comment = $this->input->post('admin_comment');   
  $amount_type_status = $this->input->post('amount_type_status');   
  $amountdata = $this->input->post('amountdata');   
  if(!empty($user_id) && !empty($wallet_id) && !empty($admin_comment) && !empty($amount_type_status) && !empty($amountdata))  
  {
      
      $userdata=$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$user_id));
      $wallet_amount =   $userdata->wallet_amount ? $userdata->wallet_amount:0;
      $add_amount_final =   $amountdata ? $amountdata:0;
       $wallet_history_data =  array(
       'amount_type_status'=>$amount_type_status,
       'amount_comment'=>$admin_comment,
       'date_of_acion'=>Date('Y-m-d'),
       'added_by'=>'Manual',
       );
       $wallet_history_data_success=$this->Superadmin_model->updatedata('wallet_history',array('wallet_id '=>$wallet_id),$wallet_history_data);
       if($wallet_history_data_success){
        if($amount_type_status=='Approve')
        {

          $wallet_amount_data =  array(
             'wallet_amount'=>($wallet_amount)-($add_amount_final)
           );
          $successdata=$this->Superadmin_model->updatedata('user',array('user_id '=>$user_id),$wallet_amount_data);

        }

      $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Accepted Amount' .$amountdata);   
       }else{
           $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again.');     
       }
  }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Unknown User Found');    
  }
echo json_encode($data); 
}

}?>