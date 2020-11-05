<!DOCTYPE html>
<html>
<head>
	<title>Avtive from</title>
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
	 <form action="<?php echo base_url().'index.php/Auth/activestatus'?>" method="post"  id="productform">
      <div class="card-body">
        <fieldset id="fieldset3">
         <h1>Product Details</h1>


         <p class="card-text">Fill your product Details Here.</p>

         <div class="form-group">
          <label for="Product Title">Product Title</label>
          <input type="text" name="p_title" id="product_title" value="<?php set_value("p_title")?>" class="form-control" placeholder="product_title">

        </div>

        <div class="form-group">
          <label for="product_name">Product Name</label>
          <input type="text" name="product_name" id="product_name" value="<?php set_value("product_name")?>" class="form-control" placeholder="product_name">

        </div>
        <div class="form-group">
          <label>status</label>
           <select class="form-control" id="status" name="status" value="<?php set_value('chooseproduct')?>">
          <option value="inactive">inactive</option>
          <option value="deactive">deactive</option></select>
         
         </div>
         <div class="form-group">
         <label for="chooseproduct">Choose your product:</label>
         <select class="form-control" id="chooseproduct" name="chooseproduct" value="<?php set_value('chooseproduct')?>">
          <option value="clothes">clothes</option>
          <option value="electricity">electricity</option>
          <option value="Grocery">Grocery</option>
          <option value="mobiles">mobiles</option>
        </select>
      </div> 
      <button class="btn btn-success">submit</button>

      

      </fieldset>
  </div>
</form>

</body>
</html>