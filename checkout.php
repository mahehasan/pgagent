<?php
if (isset($_POST['formName'])){
			$characters = '0123456789abc';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $charactersLength; $i++) {
			 $randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		$SensitiveData = array(
      'clientId'=>'1-11122022',
      'orderId' => $randomString,
      'amount' => $_POST['amount'],
      'client_callback_url' => 'http://localhost:81/pgagent/zoofamily_callback.php',
      'bill_to_forename' => $_POST['bill_to_forename'],
      'bill_to_surname' => $_POST['bill_to_surname'],
      'bill_to_email' => $_POST['bill_to_email'],
      'bill_to_phone' => $_POST['bill_to_phone'],
      'bill_to_address_line1' => $_POST['bill_to_address_line1'],
      'bill_to_address_line2' => $_POST['bill_to_address_line2'],
      'bill_to_address_city' => $_POST['bill_to_address_city'],
      'bill_to_address_country' => $_POST['bill_to_address_country'],
      'bill_to_postal_code' => $_POST['bill_to_postal_code'],
    );
			$simple_string = json_encode($SensitiveData) ;
			$ciphering = "AES-128-CTR";
			$iv_length = openssl_cipher_iv_length($ciphering);
			$options = 0;
			$encryption_iv = '1234599691011121';
			$encryption_key = "TravelZooPaymentGateway2021";
			$encryption = openssl_encrypt($simple_string, $ciphering,
			$encryption_key, $options, $encryption_iv);
			$encodedstr =str_replace("%","-",urlencode($encryption));
			//echo $encodedstr;
			$newURL = "http://127.0.0.1:8000/payment/".$encodedstr ;
			header('Location: '.$newURL);
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('css/gateway_home_style.css')}}">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">       
        <h2>Travel Zoo Checkout form</h2>
      </div>

      <div class="row">
        
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form method="post" class="needs-validation"  name="billing_details" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" name="bill_to_forename" id="firstName" placeholder="" value="Md.Minhazur" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control"  name="bill_to_surname" id="lastName" placeholder="" value="Rahman" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" class="form-control" name="bill_to_email" id="email" placeholder="you@example.com" value="mzrahman@gmail.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address.
              </div>
            </div>

            <div class="mb-3">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" name="bill_to_phone" id="phone" placeholder="01756439987" value="01756439987" required>
              <div class="invalid-feedback">
                  Valid Phone required.
                </div>
            </div>
            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" name = "bill_to_address_line1" class="form-control" id="address" placeholder="1234 Main St" value="Dhanmondi" required>
              <div class="invalid-feedback">
                  Address  required.
                </div>
            </div>

            <div class="mb-3">
              <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" name = "bill_to_address_line2" class="form-control" id="address2" value="Road No - 32" placeholder="Apartment or suite">
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Country</label>
                <input type="text" name = "bill_to_address_country" class="form-control" value="BD" id="bill_to_address_country" placeholder="Country">
                <div class="invalid-feedback">
                  Country  required.
                </div>
               </div>
              <div class="col-md-4 mb-3">
                <label for="state">City</label>
                <input type="text" name = "bill_to_address_city" class="form-control" value="Dhaka" id="bill_to_address_city" placeholder="City">
                <div class="invalid-feedback">
                  City  required.
                </div>
               </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Postal Code</label>
                <input type="text" class="form-control" name="bill_to_postal_code" id="bill_to_postal_code" value="1202" placeholder="" required>
                <div class="invalid-feedback">
                  Postal code required.
                </div>
              </div>
            </div>
            
            <hr class="mb-4">          

            <h4 class="mb-3">Payment</h4>

            <div class="col-md-4 mb-3">
                <label for="amount">Amount</label>
                <input type="text" name = "amount" class="form-control" value="45" id="amount" placeholder="Amount">
                <div class="invalid-feedback">
                  Amount  required.
                </div>
               </div>
              
               <input type="hidden" class="form-control" name = "formName" id="confirmation" value="checkout_payment" >
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
