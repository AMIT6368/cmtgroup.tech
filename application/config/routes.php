<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home/login';
$route['404_override'] = 'Home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
////  GENERAL  Page 
$route['LoginProcess'] = 'Superadmin/LoginProcess';
$route['SignUpProcess'] = 'Superadmin/SignUpProcess';
$route['Home'] = 'Home/index';
$route['signup'] = 'Home/signup';
$route['Login'] = 'Home/login';
$route['LogoutJS'] = 'Home/LogoutJS';
$route['Logout'] = 'Home/Logout';


///  superadmin
$route['SDashboard'] = 'Superadmin/Dashboard';
$route['SActiveUser'] = 'Superadmin/ActiveUser';
$route['SDeactiveUser'] = 'Superadmin/DeactiveUser';
$route['SUserChangeStatus'] = 'Superadmin/UserChangeStatus';
$route['SUserDetail/(.+)'] = 'Superadmin/UserDetail/$1';
$route['SSuccessPaymentDetail'] = 'Superadmin/SuccessPaymentDetail';
$route['SFailedPaymentDetail'] = 'Superadmin/FailedPaymentDetail';
$route['SProfile'] = 'Superadmin/Profile';
$route['SCustomSetting'] = 'Superadmin/CustomSetting';
$route['SLogout'] = 'Home/Logout';
$route['SWithdrawDetailPending'] = 'Superadmin/WithdrawDetailPending';
$route['SWithdrawDetailApproval'] = 'Superadmin/WithdrawDetailApproval';
$route['SWithdrawDetailReject'] = 'Superadmin/WithdrawDetailReject';







///  user section 
$route['UDocumentVerify'] = 'Home/UDocumentVerify';
$route['UVerifyDocumentProcess'] = 'Home/VerifyDocumentProcess';
$route['UDashboard'] = 'Home/UDashboard';
$route['UCustomerServices'] = 'Home/CustomerServices';
$route['UWallet'] = 'Home/UWallet';
$route['UProfitLoss'] = 'Home/ProfitLoss';
$route['UMyProfile'] = 'Home/MyProfile';
$route['UChangePassword'] = 'Home/ChangePassword';
$route['UEditProfileInfo'] = 'Home/EditProfile';
$route['UEditProfileImage'] = 'Home/EditProfileImage';
$route['UUpdateProfileProcess'] = 'Home/UpdateProfileProcess';
$route['UUpdatePassword'] = 'Home/UpdatePassword';
$route['UWithdrawlAmount'] = 'Home/WithdrawlAmount';

$route['UPaymentCancel'] = 'Home/PaymentCancel';
$route['UPaymentSuccess'] = 'Home/PaymentSuccess';
$route['USuccessPayment'] = 'Home/SuccessPayment';
$route['UPaymentSomethingWentWrong'] = 'Home/PaymentSomethingWentWrong';
$route['URegesterAndPay'] = 'Home/RegesterAndPay';
$route['UTradeingStatusChange'] = 'Home/TradeingStatusChange';

?>