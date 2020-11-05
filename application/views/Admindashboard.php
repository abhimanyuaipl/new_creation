<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <h1 class="mt-4">Registration Form for admin</h1>
    <div class="container col-md-6">
        <?php

        $msg=$this->session->flashdata('msg');
        if($msg != ""){
            echo "<div class='alert alert-success'>$msg</div>"; 
        }

        ?>

        <div class="card">
          <div class="card-header">
            Registration form
        </div>

        <form action="<?php echo base_url().'index.php/Auth/register'?>" method="post" enctype="multipart/form_data" >
          <div class="card-body">
            
            <p class="card-text">Fill your Details Here.</p>
            <div class="form-group">
                <label for="name">First NAME</label>
                <input type="text" name="first_name" id="first_name" value="<?php  echo set_value('first_name')?>" class="form-control" placeholder="firstName">
                <p class="invalid-feedback"><?php echo form_error('first_name');?></p>
            </div>
            <div class="form-group">
                <label for="name">Last NAME</label>
                <input type="text" name="last_name" id="last_name" value="<?php  echo set_value('last_name')?>" class="form-control" placeholder="Lastname">
                <p class="invalid-feedback"><?php echo form_error('last_name');?></p>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php  echo set_value('email')?>" class="form-control" placeholder="Email">
                <p class="invalid-feedback"><?php echo form_error('email');?></p>
            </div>
            
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" id="password" value="" class="form-control" placeholder="password">
                <p class="invalid-feedback"><?php echo form_error('password');?></p>
            </div>
            <div class="form-group">
                <label for="name">PHONE</label>
                <input type="text" name="phone" id="phone" value="<?php  echo set_value('phone')?>" class="form-control" placeholder="phone">
                <p class="invalid-feedback"><?php echo form_error('phone');?></p>

            </div>
            <div class="form-group">
                <label for="name">image upload</label>
                <input type="file" name="photo"  class="form-control" >
                
                
            </div>
            <button class="btn btn-success "> Submit</button>
            <a href="<?php echo base_url().'index.php/Auth'?>"<button class="btn btn-success "> login</button></a>
            
            
        </div>
    </div>
</form>

</div>
</div>

<div class="container my-4">
    <a href="<?php echo base_url().'index.php/Auth/userdatatable'?>"
        <button class="btn btn-dark">User Data Table</button></a>
    </div>

    <?php 
    if (!empty($user)){
        foreach($user as $data){
//    // echo "<div>
// Id: {$data['id']}<br>
// First Name: {$data['first_name']}<br>
// Last Name: {$data['last_name']}<br>
// Gmail:{$data['email']}<br>
// phone number:{$data['phone']}<br>
// <a href='". base_url()."index.php/Auth/updatedata/".$data['id']."'><button class='btn btn-primary' id='btn1 '>edit</button>
// <a href='". base_url()."index.php/Auth/deletedata/".$data['id']."'><button class='btn btn-danger' id='btn2' onclick='myfunction(".$data['id'].")'>delete</button></a>
// </div><br><br>";

            echo '<div>
            Id: '.$data['id'].'<br>
            First Name: '.$data['first_name'].'<br>
            Last Name: '.$data['last_name'].'<br>
            Gmail:'.$data['email'].'<br>
            phone number:'.$data['phone'].'<br>
            <a href="'.base_url().'index.php/Auth/updatedata/'.$data['id'].'"><button class="btn btn-primary" id="btn1 ">edit</button></a>
            <a href="'.base_url().'index.php/Auth/deletedata/'.$data['id'].'"><button class="btn btn-danger" id="btn2" onclick="myfunction('.$data['id'].',\''.$data['first_name'].'\')">delete</button></a>
            </div><br><br>';

        }


    }
    //This work is going on new creation branch
    ?>

    <script>
      
      function myfunction(id,name) {
        alert("Hello\nHow are you? "+ id+' name = '+ name);    
    };

</script>




</body>
</html>