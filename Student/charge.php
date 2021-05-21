<?php
session_start();
  require_once('./config.php');
  require("totalfee.php");
   $roll_no = $_SESSION['roll_no'];
echo '<pre>';
print_r($_POST); 
  $token  = $_POST['stripeToken'];

//   $email  = $_POST['stripeEmail'];

//   $customer = \Stripe\Customer::create([
//       'email' => $email,
//       'source'  => $token,
//   ]);

 $charge = \Stripe\Charge::create([ 

    //   
    'source' => $token,
      'amount'   => ($total),
     'currency' => 'usd',
       

 ]);



  echo '<h1>Payment Succesful</h1>';
  echo'<pre>';
  print_r($charge);

  $amount = ($total);
  $id = $charge['id'];
  $transaction =$charge['balance_transaction'];
 

  //insert query execute
  $str = "INSERT INTO payment (roll_no,amount,trxid,transaction) VALUES ('$roll_no','$amount', '$id','$transaction')";
  $stmt = $connect->prepare($str);
$stmt->execute();
  echo 'Id is: '.$id.' and amount is: '.($total);

?>