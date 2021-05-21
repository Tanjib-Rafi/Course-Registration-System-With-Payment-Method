<?php
session_start();
require_once "connection.php";
if(!isset($_SESSION["email"]))
{
  header("location:index.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.js">
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" href="Addcourses.css">
    <title>Payment Details</title>
</head>
<body >
<section>
    <div class="container">
        <div class="row mt-4 mb-3">
          <div class="col-10 offset-md-1">
          <div class="d-flex flex-row-reverse">
            <p>For Faculty of Engineering: Beta Version</p>
        </div>
        </div>
        </div>
    </div>
</section>

<section>
    <div class="container" style="margin-left: 20px;">
      <div class="row">
        <div class="col-4 offset-md-1" style="display: flex; flex-wrap: wrap;">
          <img src="../img/puclogo.jpg" style="height:40px">
          
        <h6 class="mt-4" style="margin-left: 4px;"> <b> Premier University | I Am Admin </b></h6>
      </div>
    </div>
    </div>
</section>


<section>
<nav class="navbar navbar-expand-lg navbar-dark mb-3">
        <div class="container justify-content-around">
        <div class=" container col-12 px-5 pt-2 bg">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 navhover">
            <li class="nav-item mx-2">
                <a class="nav-link text-white bordernav" aria-current="page" href="Addcourses.php">Home</a>
              </li>
            
              <li class="nav-item mx-2">
                <a class="nav-link text-white bordernav" href="Addsession.php">Session</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link text-white" href="Addcourses.php">Course</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link text-white" href="coursedetails.php">Course Details</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link text-white" href="paymentdetails.php">Payment</a>
              </li>
            </ul>
      <form class="d-flex">
        <ul class="navbar-nav  me-auto mb-2 mb-lg-0 navhover">
      <li class="nav-item me-auto">
         <a class="nav-link text-white navhover" href="logout.php">Signout</a>
       </li>
      </ul>
      </form>
      </div>
    </div>
  </div>
</nav>
</section>


<section>
  <div class="container-fluid mt-3 ">
    <div class="row">
    <div class="col-md-8"></div>
      <div class="col-md-3">
<form class="d-flex" method="post" autocomplete="off">
              <input type="text" class="form-control me-6  " id="search" type="search" placeholder="Search" aria-label="Search" style="background-color:cyan;" onkeyup="search_data()">
</form> 
</div>
</div>
</div>
</section>

<div class="result">

</div>
<section>
      <div class="container my-3">
        <div class="row">
        </div>
      </div>
    </section>
    <section>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-12" id="search_table">
        <table class="table table-hover table-bordered text-center" style="background-color: rgb(0, 225, 255);">
            <thead>
              <tr>
              <th scope="col">Roll No</th>
                <th scope="col">Token ID</th>
                <th scope="col">Balance Transaction</th>
                <th scope="col">Amount</th>
                <th scope="col">Paid At</th>
                
    <?php
$stmt = $connect->query("SELECT * FROM payment");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
?>
                <tr>
                <th><?php echo($row['roll_no'])?></th>
                <td><?php echo $row['trxid'];?></td>
                <td><?php echo $row['transaction'];?></td>
                <td><?php echo $row['amount'];?></td>
                <td><?php echo $row['monthi']?></td>
                </tr>
<?php
}
?>
 </tbody>
          </table>
          </div>
          </div>
          </div>
</section>

<br>
<br>
<br>
<br>
    <div class="col-sm-4 col-md-8 offset-md-2 mt-5">
<div style="color:skyblue; border-top: 2px solid;"></div>
</div>
<footer class="text-center">
      <pre>
        <code>
          Copyright ©2011-2021 Premier University, All Rights Reserved.
          Software Section , Department of IT,Premier University (Design & Develop)
        </code>
      </pre>
</footer>

<script>
function search_data(){
	var search=jQuery('#search').val();
  jQuery.ajax({
		method:'post',
		url:'loadData.php',
		data:'search='+search,
		success:function(data){
			jQuery('#search_table').html(data);
		}
	});	
}
</script>

</body>
</html>
