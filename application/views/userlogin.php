<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">
</head>
<body>
<div class="container col-md-6 ">
<form class="form-signin" action="<?php echo base_url().'index.php/Auth/userlogin';?> " method="post" id="frm" name="frm">
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
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
 <label for="email">Email</label>
 
  
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="<?php  echo set_value('email')?>" >
  <p class="invalid-feedback"><?php echo form_error('email');?></p>
  <label for="password">Password</label>
  <input type="password"  name="password" id="inputPassword" class="form-control" placeholder="Password" >
  <p class="invalid-feedback"><?php echo form_error('password');?></p>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
 


 
</form>
    </div>
</body>
</html>