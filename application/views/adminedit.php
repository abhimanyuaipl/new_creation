<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminupdate</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
</head>
<body>
<h1 class="mt-4">Edit  Form by admin</h1>
<div class="container col-md-6">
<?php

$msg=$this->session->flashdata('msg');
if($msg != ""){
    echo "<div class='alert alert-success'>$msg</div>";
}

?>

<div class="card">
  <div class="card-header">
    Edit your form
  </div>

 <form action="<?php echo base_url().'index.php/Auth/updatedata/'.$user['id'];?>" method="post" >
  <div class="card-body">
    
    <p class="card-text">Fill your Details Here.</p>
    <div class="form-group">
    <label for="name">First NAME</label>
    <input type="text" name="first_name" id="first_name" value="<?php  echo set_value('first_name',$user['first_name'])?>" class="form-control" placeholder="firstName">
    <p class="invalid-feedback"><?php echo form_error('first_name');?></p>
    </div>
    <div class="form-group">
    <label for="name">Last NAME</label>
    <input type="text" name="last_name" id="last_name" value="<?php  echo set_value('last_name',$user['last_name'])?>" class="form-control" placeholder="Lastname">
    <p class="invalid-feedback"><?php echo form_error('last_name');?></p>
    </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" value="<?php  echo set_value('email',$user['email'])?>" class="form-control" placeholder="Email">
    <p class="invalid-feedback"><?php echo form_error('email');?></p>
    </div>
  
    <div class="form-group">
    <label for="name">Password</label>
    <input type="password" name="password" id="password" value="" class="form-control" placeholder="password">
    <p class="invalid-feedback"><?php echo form_error('password');?></p>
    </div>
    <div class="form-group">
    <label for="name">PHONE</label>
    <input type="text" name="phone" id="phone" value="<?php  echo set_value('phone',$user['phone'])?>" class="form-control" placeholder="phone">
    <p class="invalid-feedback"><?php echo form_error('phone');?></p>
    </div>
    <button class="btn btn-success "> update</button>
    <a href="<?php echo base_url().'index.php/Auth/userdatatable/'?>"<button class="btn btn-dark ">Cancel</button></a>


   <!--   <?php 
// echo '<a href="'.index.php/Auth/userdatatable/.'?><button class="btn btn-dark ">Cancel</button></a>';
    ?> -->


    







  
  </div>
</div>
</form>

</div>
</div>

</body>
</html>

<?php



?>