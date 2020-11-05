<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
</head>
<body>
  <div class="container mt-4">

<div class="card">
  <div class="card-header">
    Admin Dashboard
  </div>

 <form action="<?php echo base_url().'index.php/Auth/adminlogin'?>" method="post" >
 <?php
$msg=$this->session->flashdata('msg');
if($msg !==""){

?>

<div class="alert alert-danger">
<?php echo $msg;?>
</div>
  <?php
}
?>
 
 
 
 <div class="card-body">
 


    
   
    <div class="form-group">
    <label for="name">Admin Name</label>
    <input type="text" name="name" id="admin" value="" class="form-control" placeholder="admin_name">
    <p class="invalid-feedback"><?php echo form_error('first_name');?></p>
    </div>
    
   
    <div class="form-group">
    <label for="name">Password</label>
    <input type="password" name="password" id="password" value="" class="form-control" placeholder="password">
    <p class="invalid-feedback"><?php echo form_error('password');?></p>
    </div>
   
    <button class="btn btn-success "> Submit</button>
   
    
  
  </div>
</div>
</form>


</div>
</div>
<div class="container mt-5">
<a href="<?php echo base_url().'index.php/Auth/userloginmain/'?>"<button class="btn btn-success ">user login</button></a>
</div>





</div>





























</body>
</html>