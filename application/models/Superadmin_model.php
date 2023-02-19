<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin_model extends CI_Model
{

public function GetAllResultWhereJoin($paymenttype)
{
 $this->db->select('user.first_name,user.last_name,payment_transition.*');
 $this->db->join('user','user.user_id=payment_transition.user_id');
 $this->db->where('payment_transition.pt_status',$paymenttype);
 $query=$this->db->get('payment_transition')->result(); 
 return $query;    
} 

public function GetAllResultWithdrawal($Status)
{
 $this->db->select('user.first_name,user.last_name,wallet_history.*');
 $this->db->join('user','user.user_id=wallet_history.user_id');
 $this->db->where('wallet_history.amount_type','Withdraw');
 $this->db->where('wallet_history.amount_type_status',$Status);
 $query=$this->db->get('wallet_history')->result(); 
 return $query;    
}     
    
public function GetAllResultWhere($table,$where)
{
 $this->db->where($where);
 $query=$this->db->get($table)->result(); 
 return $query;   
} 

public function GetAllResultWhereOrderBy($table,$where,$orderby)
{
 $this->db->where($where);
 $this->db->order_by($orderby,'DESC');
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
public function GetAllResultOrderBy($table,$coloum,$orderby)
{
 $query=$this->db->order_by($coloum,$orderby);  
 $query=$this->db->get($table)->result(); 
 return $query;   
}

public function GetAllResultOrderByWhere($table,$coloum,$orderby,$where)
{
 $query=$this->db->where($where);
 $query=$this->db->order_by($coloum,$orderby);  
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
public function deletedataOrderBy($table,$where)
{
 $this->db->where($where);
 $this->db->order_by($coloum, $orderby);
 $query=$this->db->delete($table);
 return $query;   
}



public function update_SSliderOne()
{
    $data_arr = array(
            'title' => $this->input->post("title"),
            'subtille' => $this->input->post("subtille"),
            'button_text' => $this->input->post("button_text"),
    );
    if ($_FILES["slider_image1"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image1')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image1"] ='upload/slider/'.$img_data['file_name'];
    }
}

 if ($_FILES["slider_image2"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image2')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image2"] ='upload/slider/'.$img_data['file_name'];
    }
}


 if ($_FILES["slider_image3"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image3')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image3"] ='upload/slider/'.$img_data['file_name'];
    }
}

 if ($_FILES["slider_image4"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image4')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image4"] ='upload/slider/'.$img_data['file_name'];
    }
}

 if ($_FILES["slider_image5"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image5')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image5"] ='upload/slider/'.$img_data['file_name'];
    }
}
$this->db->where('slider_id ', '1');
return $this->db->update('slider', $data_arr);  
}


public function update_SSliderTwo()
{
    $data_arr = array(
            'title' => $this->input->post("title"),
            'subtille' => $this->input->post("subtille"),
            'button_text' => $this->input->post("button_text"),
    );
    if ($_FILES["slider_image1"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image1')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image1"] ='upload/slider/'.$img_data['file_name'];
    }
}

 if ($_FILES["slider_image2"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image2')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image2"] ='upload/slider/'.$img_data['file_name'];
    }
}


 if ($_FILES["slider_image3"]["size"] > 0) {
    $config['upload_path']   = './upload/slider';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('slider_image3')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["slider_image3"] ='upload/slider/'.$img_data['file_name'];
    }
}

$this->db->where('slider_id ', '2');
return $this->db->update('slider', $data_arr);  
}

public function updatedataVerification($user_id,$dataarray){
    
    $data_arr =$dataarray;
    if ($_FILES["profile_pic"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('profile_pic')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
    } else {
        $img_data= $this->upload->data();
        $data_arr["profile_pic"] ='upload/usergraph/'.$img_data['file_name'];
    }
}

    if ($_FILES["aadhar_card_front"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('aadhar_card_front')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
    } else {
        $img_data= $this->upload->data();
        $data_arr["aadhar_card_front"] ='upload/usergraph/'.$img_data['file_name'];
    }
}


    if ($_FILES["aadhar_card_back"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('aadhar_card_back')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
    } else {
        $img_data= $this->upload->data();
        $data_arr["aadhar_card_back"] ='upload/usergraph/'.$img_data['file_name'];
    }
}



    if ($_FILES["pan_card_image"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('pan_card_image')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
    } else {
        $img_data= $this->upload->data();
        $data_arr["pan_card_image"] ='upload/usergraph/'.$img_data['file_name'];
    }
}



$this->db->where('user_id', $user_id);
return $this->db->update('user', $data_arr);     
    
}

public function uploadimageprofile($user_id){
    
    $data_arr = array(
            'dummydata' => $this->input->post("user_graph_name"),
    );
    if ($_FILES["image_file"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('image_file')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
    } else {
        $img_data= $this->upload->data();
        $data_arr["profile_pic"] ='upload/usergraph/'.$img_data['file_name'];
    }
}

$this->db->where('user_id', $user_id);
return $this->db->update('user', $data_arr);  
}

public function SCustomSetting($user_id)
{
    $data_arr = array(
            'dummydata' => $this->input->post("user_graph_name"),
    );
    if ($_FILES["user_graph_history"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('user_graph_history')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["user_graph_history"] ='upload/usergraph/'.$img_data['file_name'];
    }
}
    if ($_FILES["user_graph"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('user_graph')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["user_graph"] ='upload/usergraph/'.$img_data['file_name'];
    }
}

$this->db->where('user_id', $user_id);
return $this->db->update('user', $data_arr);  
}

public function SFeaturesEdit($id)
{
    $data_arr = array(
            'fo_title' => $this->input->post("fo_title"),
    );
    if ($_FILES["fo_image"]["size"] > 0) {
    $config['upload_path']   = './upload/features';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('fo_image')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["fo_image"] ='upload/features/'.$img_data['file_name'];
    }
}
       $this->db->where('fo_id', $id);
return $this->db->update('features_overview', $data_arr);

}


public function SCustomSettingContactUs()
{
    $data_arr = array(
            'app_name' => $this->input->post("app_name"),
            'whatsapp_number' => $this->input->post("mobile_number"),
            'mobile_number' => $this->input->post("mobile_number"),
            'email' => $this->input->post("email"),
    );
    if ($_FILES["user_graph_history"]["size"] > 0) {
    $config['upload_path']   = './upload/usergraph';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('user_graph_history')) {
        $error = array(
            'error' => $this->upload->display_errors()
        );
        print_r($error);
        die;
    } else {
        $img_data= $this->upload->data();
        $data_arr["main_logo"] ='upload/usergraph/'.$img_data['file_name'];
        $data_arr["fav_logo"] ='upload/usergraph/'.$img_data['file_name'];
    }
}


$this->db->where('cu_id','1');
return $this->db->update('contact_us', $data_arr);  
}


}?>