<!DOCTYPE html>
<html>
<head>
	<title>userdashboard</title>
	<link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>

	<div class="container col-md-6">

    <form action="" method="post" onclick="return false" id="productform">
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
          <label>Product details</label>
          <textarea rows="4" type="text" name="productdetails" id="productdetails" placeholder="productdetails" class="form-control" value="<?php set_value("productdetails")?>""></textarea>


          <button id="next-1" class=" btn btn-primary">next</button>

        </div>


      </fieldset>

      <fieldset style="display: none" id="fieldset1">
        <h1> Product Type Price</h1>
        <div class="form-group">
          <label>Specification</label>
          <textarea class="form-control" type="text" rows="4" name="Specification" id="Specification"
          placeholder="Specification" value="<?php set_value('Specification')?>"></textarea>

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
      <div class="form-group">
       <label for="type">Type</label>
       <select  class="form-control" value="<?php set_value('type')?>"  id="type" name="type">
        <option value="basic">basic</option>
        <option value="regular">regular</option>
        <option value="VIP">VIP</option>

      </select>
    </div>     
    <div class="form-group">
      <label for="price" >Price</label>
      <input  class="form-control" type="text" name="price" id="price" value="<?php set_value('price')?>">
      <select class="form-control" id="currency" name="currency" value="<?php set_value('currency')?>">
        <option value=" &#8377;"> &#8377;Rupees</option>
        <option value=" &#36;"> &#36;Doller</option>
        <option value="&#8352;"> &#8352; euro</option>

      </select>
    </div>
    <button id="prev-1"  class=" btn btn-primary">previous</button>
    <button id="next-2" class=" btn btn-primary">next</button>
  </fieldset>
  <fieldset id="fieldset2" style="display: none">
    <h1>Availability of product</h1>
    <div class="form-group">
      <input id="availability" type="text" name="availability" class="form-control" placeholder="availability" value="<?php set_value('availability')?>">
    </div>
    <div class="form-group">
      <label for="date">availability of product</label>
      <input type="date" name="startingdate" class="form-control" id="startingdate" value="<?php set_value('startingdate')?>">starting Date
      <input type="date" value="<?php set_value('endingdate')?>" name="endingdate" class="form-control" id="endingdate">End Date
    </div>
    <button id="prev-2" class=" btn btn-primary">previous</button>
    <button id="next-3" class="btn btn-primary">next</button>
  </fieldset>
  <fieldset id="fieldset4" style="display: none">

    <h1>preview</h1>
    <button id="prev-3" class=" btn btn-primary">previous</button>
    <button id="next-4" class="btn btn-primary">submit</button>
  </fieldset>

</div>
</div>
</form>
</div>
</body>
<script type="text/javascript">

  $(document).ready(function(){
    $("#next-1").click(function(){
      $("#fieldset1").show();
      $("#fieldset3").hide();

    })
    $("#prev-1").click(function(){
      $("#fieldset3").show();
      $("#fieldset1").hide();
    })
    $("#next-2").click(function(){
      $("#fieldset2").show();
      $("#fieldset1").hide();
    })
    $("#prev-2").click(function(){
      $("#fieldset1").show();
      $("#fieldset2").hide();

    })
    $("#next-3").click(function(){
      $("#fieldset4").show();
      $("#fieldset2").hide();
    })
    $("#prev-3").click(function(){
      $("#fieldset2").show();
      $("#fieldset4").hide();
    })

    $('#next-4').click(function(){
      alert('your product has been added');
      $.ajax( {
        url:'<?php echo base_url() ?>index.php/Auth/upload/',
        type:'POST',
        data:$('#productform').serialize(),  
        dataType:'json',

        // success: function(result){
          
        //   $('$id').val(result);
         
        // },
      })
    })


  })






</script>
</html>