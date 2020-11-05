<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>userdatatable</title>
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/styleusertable.css'?>">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
  <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>



</style>

</head> 
<body>
  <div id="text1">
    <h1 class="text-center">User Data Table</h1></div>
    <div class="container mt-4" id="table1">
      <table id="table_id" class="table table-bordered table-striped">
        <thead>
          <tr>            
            <th>id</th>
            <th>First name </th>
            <th>Last name</th>
            <th>email</th>
            <th>Phone</th>            
          </tr>
        </thead>  
<!-- <tfoot>
     <tr>            
            <th>id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>email</th>
            <th>Phone</th>            
        </tr>
  
      </tfoot>    -->                         
    </table>
  </div>    
</body>

<script type="text/javascript">
  $(document).ready(function(){
   $('#table_id').DataTable({
    'processing': true,
    'serverSide': true,
    'serverMethod': 'post',
    'ajax': {
      'url':"<?php echo base_url(); ;?>index.php/Auth/fetchdata"
      
    }
  });
    //  $(document).ready(function(){


    // $('#table_id tfoot th').each (function(){
    //   var title=$(this).text();
    //   $(this).html('<input type="text " placeholder="search '+title+'">');
    // })
    // var table=$('#table_id').DataTable({
    //   initcomplete:function(){
    //     this.api.columns().every(function(){
    //       var that=this;
    //       $('input',this.footer() ).on('keyup change clear',function(){
    //         if(that.search()!==this.value){
    //           that
    //               .search(this.value)
    //               .draw();
    //         }
    //       })
    //     })
    //   }
    // })
    // })
  });
</script>
