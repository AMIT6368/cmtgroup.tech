<section class="Profile">
    <div class="profile_title">
        <div class="Profile_imgs"><img src="<?php echo base_url();  ?><?php echo $userdata->profile_pic; ?>" alt=""></div>
        
        <div class="profile_name"><?php echo $userdata->first_name; ?> <?php echo $userdata->last_name; ?></div>
        
    </div>
     <a href="<?php echo base_url(); ?>UEditProfileImage"><button class="editProfile">Edit Profile Image</button></a>
    <a href="<?php echo base_url(); ?>UEditProfileInfo"><button class="editProfile">Edit Profile Info</button></a>
   
    
<div class="Profile_table">
    <table class="table">
<tr>
    <td>Email</td>
    <td>: <?php echo $userdata->email; ?></td>
</tr>
<tr>
    <td>Phone</td>
    <td>: <?php echo $userdata->mobile; ?></td>
</tr>
<tr>
    <td>Pan Number</td>
    <td>: <?php echo $userdata->pan_number; ?></td>
</tr>
<tr>
    <td>Adhar Nuber</td>
    <td>: <?php echo $userdata->addhar_card; ?></td>
</tr>
<tr>
    <td>Bank Account</td>
    <td>: <?php echo $userdata->bank_account; ?></td>
</tr>
<tr>
    <td>IFSC Code</td>
    <td>: <?php echo $userdata->ifsc_code; ?></td>
</tr>
    </table>
    <a href="<?php echo base_url(); ?>UChangePassword"><button class="chenge_pass">Change Password</button></a>
    <a href="#" class="LogoutJS">Logout</a>
</div>
</section>

<style>
.editProfile {
    padding: 10px 25px 10px 25px;
    margin-top: 10px;
    background: linear-gradient(90deg, #ff5016 8%, #ffcd34 41%, #ff1717 79%);
    color: white;
    border-radius: 10px;
    border: none;
}
</style>