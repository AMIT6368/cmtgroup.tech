<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'libraries/PaytmKit/lib/encdec_paytm.php'; 
//live
define('PAYTM_ENVIRONMENT', 'WEB'); // change value PROD for production
define('PAYTM_MERCHANT_KEY', 'OU5sIaIFpzSW3sNT'); // production key
define('PAYTM_MERCHANT_MID', 'HQbCLX32550518701167'); //  production mid
define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //production website
define('PAYTM_TXN_URL', 'https://securegw.paytm.in/theia/processTransaction'); //For live 
//test 
// define('PAYTM_ENVIRONMENT', 'WEB'); // change value PROD for production
// define('PAYTM_MERCHANT_KEY', '@McNc30SUm6SawHZ'); // testing key
// define('PAYTM_MERCHANT_MID', 'baygCI02489853282932'); //  testing mid
// // define('PAYTM_MERCHANT_WEBSITE', 'DEFAULT'); //testing websit
// define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); // testing website
// define('PAYTM_TXN_URL', 'https://securegw-stage.paytm.in/theia/processTransaction'); // for test

error_reporting(0);
class Home extends CI_Controller {
public function __construct()
{
 parent::__construct();
 $this->load->helper('url');
 $this->load->library('MyModel_lib');
 date_default_timezone_set('Asia/Kolkata');
 error_reporting(0);
}

public function LogoutJS()
{
    setcookie("user_id", " ", time() - 3600);
    setcookie("user_id", "", time() + (86400 * 15), "/"); 
    $this->session->sess_destroy();
    $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'You are Logout From Website'); 
    echo json_encode($data);  
}
public function Logout()
{
    setcookie("user_id", " ", time() - 3600);
    setcookie("user_id", "", time() + (86400 * 15), "/"); 
    $this->session->sess_destroy();
    redirect('Login'); 
}

public function page_not_found()
{
  $data['title'] = 'Dashboard | User'; 
  $this->load->view('frontend/signup', $data); 
}

public function index()
{
$data['title'] = 'Login';
$this->load->view('frontend/login', $data); 
}

public function login()
{
$data['title'] = 'Login';  
$this->load->view('frontend/login', $data);   
}

public function signup()
{
$data['title'] = 'signup | User'; 
$this->load->view('frontend/signup', $data);    
}

public function UDocumentVerify()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Document Verify | User';  
$data['userdata'] =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$this->load->view('frontend/DocumentVerify', $data);    
}

public function UDashboard()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | User'; 
$data['user_detail_ghaph']=$this->Superadmin_model->GetAllRowWhere('contact_us',array('cu_id'=>'1'));
$data['userdata'] =$this->Home_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));

$data['totalSpendtoday'] =$this->Home_model->AmountTotalTypeSumDate('wallet_history',array('user_id'=>$this->session->userdata('user_id'),'amount_type'=>'Debit','date_of_acion'=>Date('Y-m-d')),'amount');


$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/dashboard', $data);    
$this->load->view('frontend/layout/footer', $data); 
}

public function CustomerServices()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | User'; 
$data['userdata'] =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$data['CustomerServices'] =$this->Superadmin_model->GetAllRowWhere('contact_us',array('cu_id'=>'1'));

$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/CustomerServices', $data);    
$this->load->view('frontend/layout/footer', $data); 
}
public function UWallet()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | User'; 
$data['userdata'] =$this->Home_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
// $data['userdata'] =$this->Superadmin_model->AmountTotalTypeSum('wallet',array('user_id '=>$this->session->userdata('user_id'),'amount_type'=>''));

$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/wallet', $data);    
$this->load->view('frontend/layout/footer', $data); 
}
public function ProfitLoss()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['user_detail_ghaph']=$this->Superadmin_model->GetAllRowWhere('contact_us',array('cu_id'=>'1'));
$data['title'] = 'Dashboard | User'; 
$data['userdata'] =$this->Home_model->GetAllRowWhere('user',array('user_id '=>$this->session->userdata('user_id')));
$data['profitLoss'] =$this->Superadmin_model->GetAllResultWhere('ProfitLoss',array('user_id '=>$this->session->userdata('user_id')));
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/ProfitLoss', $data);    
$this->load->view('frontend/layout/footer', $data); 
}
public function MyProfile()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | User'; 
$data['userdata'] =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/profile', $data);    
$this->load->view('frontend/layout/footer', $data); 
}

public function ChangePassword()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | User'; 
$data['userdata'] =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/ChangePassword', $data);    
$this->load->view('frontend/layout/footer', $data); 
}

public function EditProfile()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | User'; 
$data['userdata'] =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/EditProfile', $data);    
$this->load->view('frontend/layout/footer', $data); 
}

public function EditProfileImage()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | User'; 
$data['userdata'] =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/EditProfileImage', $data);    
$this->load->view('frontend/layout/footer', $data); 
}

public function EditProfileImageProcess(){
    
    
    
}


public function VerifyDocumentProcess()
{
//   $user_id = $this->input->post('user_id');
  $user_id = $this->session->userdata('user_id');
  $bank_name = $this->input->post('bank_name');
  $bank_account_number = $this->input->post('bank_account_number');
  $ifsc_code = $this->input->post('ifsc_code');
  $acount_holder_name = $this->input->post('acount_holder_name');
  // aadhar_card_front   aadhar_card_back   pan_card_image
     if(!empty($user_id))
     {
        $dataarray =  array(
           // 'pan_card_image'=>$mobile_number,
           // 'aadhar_card_back'=>$mobile_number,
           // 'aadhar_card_front'=>$password,
           'file_upload_status'=>'Done',
           'bank_hold_name'=>$acount_holder_name,
           'bank_name'=>$bank_name,
           'bank_account'=>$bank_account_number,
           'ifsc_code'=>$ifsc_code,
           );
        $successstatus=$this->Superadmin_model->updatedataVerification($user_id,$dataarray);
        if(!empty($successstatus)){
            $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Verify');
        }else{
            $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');  
        }
   }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');    
   }
    echo json_encode($data);  
}


public function UpdateProfileProcess()
{
  $user_id = $this->session->userdata('user_id');
  $first_name = $this->input->post('first_name');
  $last_name = $this->input->post('last_name');
  $email = $this->input->post('email');
  $mobile_number = $this->input->post('mobile_number');
  $dob = $this->input->post('dob');
     if(!empty($user_id))
     {
        $dataarray =  array(
           'first_name'=>$first_name,
           'last_name'=>$last_name,
           'email'=>$email,
           'mobile'=>$mobile_number,
           'date_of_birth'=>$dob,
           );
        $successstatus=$this->Superadmin_model->updatedata('user',array('user_id' =>$user_id ),$dataarray);
        if(!empty($successstatus)){
            $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Update');
        }else{
            $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');  
        }
   }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');    
   }
    echo json_encode($data);  
}



public function UpdatePassword()
{
  $user_id = $this->session->userdata('user_id');
  $current_password = $this->input->post('current_password');
  $new_password = $this->input->post('new_password');
     if(!empty($user_id))
     { 
         $Passwordmatch =$this->Superadmin_model->GetAllRowWhere('user',array('password '=>$current_password));
         
       if(!empty($Passwordmatch)){
           
           $dataarray =  array(
           'password'=>$new_password,
           );
        $successstatus=$this->Superadmin_model->updatedata('user',array('user_id' =>$user_id ),$dataarray);
        if(!empty($successstatus)){
            $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Password Update');
        }else{
            $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');  
        } 
           
       }else{
           
         $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Current Password Doesnot Match.Please try Again');  
           
       } 
   }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');    
   }
    echo json_encode($data);  
}



public function WithdrawlAmount()
{
  $user_id = $this->session->userdata('user_id');
  $amount_withdraw = $this->input->post('amount_withdraw');
     if(!empty($user_id) && !empty($amount_withdraw) )
     {
        $dataarray =  array(
           'amount_type'=>'Withdraw',
           'amount'=>$amount_withdraw,
           'user_id'=>$user_id,
           'amount_type_status'=>'Pending',
           'date_of_acion'=>Date('Y-m-d'),
           );
        $successstatus=$this->Superadmin_model->insertdata('wallet_history',$dataarray);
        if(!empty($successstatus)){
            $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Accepted Your Withdraw.');
        }else{
            $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');  
        }
   }else{
    $data = array('statusCode' => '201','title' => 'OPPS!!!', 'message'=> 'Something Went Wrong. Please Try Again');    
   }
    echo json_encode($data);  
}


public function uploadImageFun()
	{
	   $user_id =  $this->session->userdata('user_id');
       $successstatus=$this->Superadmin_model->uploadimageprofile($user_id);
     $data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Uploaded Image');
	echo json_encode($data);  	
	}

public function TradeingStatusChange(){
$userdata = $this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$tradeing_status = $userdata->tradeing_status ? $userdata->tradeing_status :'Pending';

if($tradeing_status=='Approved'){
  $tradeing_statusfinal = 'Pending';
}else if($tradeing_status=='Pending'){
  $tradeing_statusfinal = 'Approved';
}

       $dataarray =  array(
           'tradeing_status'=>$tradeing_statusfinal,
           );

       $this->Home_model->updatedata('user',array('user_id' =>$this->session->userdata('user_id')),$dataarray);

$data = array('statusCode' => '200','title' => 'Successfully', 'message'=> 'Successfully Changed');
    echo json_encode($data); 

}

////////payment  


public function RegesterAndPay(){
    
$user_id = $this->session->userdata('user_id');
$userdetail =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$user_id));
$amount = $this->input->post('amount');

$dataarray =  array(
       'user_id'=>$user_id,
       'pt_amount'=>$amount,
       'pt_status'=>'Pending From User',
       'pt_date'=>Date('Y-m-d h:m:s'),
       );
$successstatus=$this->Superadmin_model->insertdata('payment_transition',$dataarray);

$orderno = 'AT'.substr(number_format(time() * rand(),0,'',''),0,6);
$final_order = $orderno.'_'.$user_id.'_'.$successstatus;
$this->session->set_userdata('orderID',$final_order);

$this->data['paytm'] = array(
          "ORDER_ID"      =>$final_order,
          "CUST_ID"       =>$user_id,
          "MOBILE_NO"     =>$userdetail->mobile,
          "EMAIL"         =>$userdetail->email,
          "MID"           =>PAYTM_MERCHANT_MID,
          "CHANNEL_ID"    =>PAYTM_ENVIRONMENT,
          "WEBSITE"       =>PAYTM_MERCHANT_WEBSITE,
          "INDUSTRY_TYPE_ID"=>"Retail",
          "CALLBACK_URL"  =>base_url('USuccessPayment'),
          "Amount"        =>$amount ? $amount:'500',
          //"Amount"        =>'1',
          "marchent_key"  =>PAYTM_MERCHANT_KEY,
          "redirect_url"  =>PAYTM_TXN_URL
          );
$this->load->view('frontend/payment/paytm_payment_page',$this->data);
}

public function PaymentSomethingWentWrong()
{if($this->session->userdata('user_id')=='') {redirect('Login');}
$data['title'] = 'Dashboard | Something Went Wrong'; 
$data['userdata'] =$this->Superadmin_model->GetAllRowWhere('user',array('user_id'=>$this->session->userdata('user_id')));
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/payment/SomethingWentWrong', $data);    
$this->load->view('frontend/layout/footer', $data); 
}

public function SuccessPayment()
{
      
 if(!empty($this->input->post()))
 {
  $currentdate  = date('Y-m-d');
  $paymentdata = $this->input->post();
  if($paymentdata['STATUS']=='TXN_FAILURE')
  {
      $this->session->set_userdata('ORDERID',$paymentdata['ORDERID']);
      
      $str=$paymentdata['ORDERID'];
      $del="_";
      $pos=explode($del, $str);
      $user_id = $pos[1];
      $Payment_Id_data = $pos[2];
      $userID = $user_id;
      $this->session->set_userdata('user_id',$userID);
    
      $successdata = array(
      'pt_amount' =>$paymentdata['TXNAMOUNT'] , 
      'pt_status' =>$paymentdata['STATUS'] , 
      'pt_transition_id' => $paymentdata['TXNID'], 
      'pt_response_msg' => $paymentdata['RESPMSG'], 
      'pt_order_id' => $paymentdata['ORDERID'], 
      'pt_currency' => $paymentdata['CURRENCY'], 
      'pt_banktrns_id' => $paymentdata['BANKTXNID'], 
      'pt_date' => date('Y-m-d'), 
      );
    $this->Home_model->updatedata('payment_transition',array('user_id' =>$userID,'pt_id'=>$Payment_Id_data),$successdata);
   redirect('UPaymentCancel');
  }else if($paymentdata['STATUS']=='TXN_SUCCESS'){
      $this->session->set_userdata('ORDERID',$paymentdata['ORDERID']);
      $str=$paymentdata['ORDERID'];
      $del="_";
      $pos=explode($del, $str);
      $user_id = $pos[1];
      $Payment_Id_data = $pos[2];
      $userID = $user_id;
      $this->session->set_userdata('user_id',$userID);
      
      $successdata = array(
      'pt_amount' =>$paymentdata['TXNAMOUNT'] , 
      'pt_status' =>$paymentdata['STATUS'] , 
      'pt_transition_id' => $paymentdata['TXNID'], 
      'pt_response_msg' => $paymentdata['RESPMSG'], 
      'pt_order_id' => $paymentdata['ORDERID'], 
      'pt_currency' => $paymentdata['CURRENCY'], 
      'pt_banktrns_id' => $paymentdata['BANKTXNID'], 
      'pt_date' => $paymentdata['TXNDATE'], 
      );
     $usernamecheck=$this->Home_model->updatedata('payment_transition',array('user_id' =>$userID,'pt_id'=>$Payment_Id_data),$successdata);
    if($usernamecheck){
    $userdata=$this->Home_model->GetAllRowWhere('user',array('user_id'=>$userID));
    $wallet_amount = $userdata->wallet_amount ? $userdata->wallet_amount :0;
    
    $dataarraywalethistpry =  array(
           'amount_type'=>'Credit',
           'amount'=>$paymentdata['TXNAMOUNT'],
           'user_id'=>$userID,
           'amount_type_status'=>'Approve',
           'amount_comment'=>'Payment Done Via Paytm',
           'date_of_acion'=>Date('Y-m-d'),
           );
   $successstatuswalethistpry=$this->Superadmin_model->insertdata('wallet_history',$dataarraywalethistpry);
   
   if($successstatuswalethistpry){
       $dataarraywaletupdate =  array(
           'wallet_amount'=>($wallet_amount)+($paymentdata['TXNAMOUNT']),
           );
           $walletupdatesuccess =$this->Home_model->updatedata('user',array('user_id'=>$userID),$dataarraywaletupdate);
           if($walletupdatesuccess){
               redirect('UPaymentSuccess');
           }else{
              redirect('UPaymentSomethingWentWrong');   
           }
          
   }else{
     redirect('UPaymentSomethingWentWrong');  
       
   }

   }else{
   redirect('UPaymentSomethingWentWrong');
   }
  }else{
   redirect('UPaymentSomethingWentWrong');
  }
 }else{
  redirect('UPaymentSomethingWentWrong');
 }
}



public function PaymentCancel()
{
    
$order_ID = $this->session->userdata('ORDERID');
$user_id = $this->session->userdata('user_id');
$orderIDfinal=$order_ID ? $order_ID : 'SL875875464_1_1';
$del="_";
$pos=explode($del, $str);
$pt_user_id = $pos[1];
$PaymentID = $pos[2];
$userID = $user_id ? $user_id : $pt_user_id;
$userdata = $this->Home_model->GetAllRowWhere('user',array('user_id'=>$userID));

$data['orderdata']=$this->Home_model->GetAllRowWhere('payment_transition',array('pt_order_id'=>$orderIDfinal));
$data['userdata']=$this->Home_model->GetAllRowWhere('user',array('user_id'=>$userID));

$data['title']='Algo Trade | Cancel Payment';
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/payment/cancelpayment', $data);    
$this->load->view('frontend/layout/footer', $data);


}

public function PaymentSuccess()
{
$order_ID = $this->session->userdata('ORDERID');
$user_id = $this->session->userdata('user_id');
$orderIDfinal=$order_ID ? $order_ID : 'SL875875464_1_1';
$del="_";
$pos=explode($del, $str);
$pt_user_id = $pos[1];
$PaymentID = $pos[2];
$userID = $user_id ? $user_id : $pt_user_id;
$userdata = $this->Home_model->GetAllRowWhere('user',array('user_id'=>$userID));

$data['orderdata']=$this->Home_model->GetAllRowWhere('payment_transition',array('pt_order_id'=>$orderIDfinal));
$data['userdata']=$this->Home_model->GetAllRowWhere('user',array('user_id'=>$userID));

$data['title']='Algo Trade | Success Payment';
$this->load->view('frontend/layout/header', $data);
$this->load->view('frontend/layout/sidebar', $data);
$this->load->view('frontend/payment/successpayment', $data);    
$this->load->view('frontend/layout/footer', $data);
}



}?>