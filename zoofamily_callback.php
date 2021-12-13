<?php
$Query_String  = explode("&", explode("?", $_SERVER['REQUEST_URI'])[1] );
$status = $Query_String[0];
//print_r(explode('=',$status));
foreach($Query_String as $key=>$value)
{
   $data_array = explode('=',$value);
   if($data_array[0]=='status')
   {
      $status = $data_array[1];
   }
   elseif($data_array[0]=='order_id')
   {
      $order_id = $data_array[1];
   }
   elseif($data_array[0]=='amount')
   {
      $amount = $data_array[1];
   } 
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Zoofamily Callback Response</title>
    <!-- Bootstrap core CSS -->    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

  <body class="bg-light">
    <div class="container">
      <div class="py-5 text-center">       
        <h2>Zoofamily Callback Response</h2>
      <div class="card" >
         <div class="card-body">
            <h5 class="card-title"><?php if($status =='success'){ ?>
               <div class="alert alert-success">
                  <strong>Success!</strong> Your Transaction Completed Successfully.                  
               </div>
               <ul class="list-group list-group-flush">
                  <li class="list-group-item">Invoice No  : <?php echo " $order_id " ?></li>
                  <li class="list-group-item">Bill Amount : <?php echo " $amount " ?></li>
               </ul>
               <?php } else { ?>
                  <div class="alert alert-danger alert-dismissible fade show">
                     <strong>Error!</strong> A problem has been occurred while submitting your data.                  
                  </div>
               <?php } ?></h5>
            
            
         </div>
    </div>
      </div>
      
      
    </div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
     
  </body>
</html>

