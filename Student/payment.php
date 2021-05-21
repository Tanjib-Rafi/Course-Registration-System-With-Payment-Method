<?php require("./config.php");
session_start();
require_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../Admin/Addcourses.css"> -->
    <link rel="stylesheet" href="coursetable.css">
    <title>Payment</title>
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
<div class="container" style="margin-left: 105px;">
  <div class="row">
    <div class="col-4" style="display: flex; flex-wrap: wrap;">
    <img src="../img/puclogo.jpg" style="height:40px">
          <?php
$stmt = $connect->query("SELECT * FROM studentsignup WHERE roll_no='".$_SESSION["roll_no"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
        <h6 class="mt-4" style="margin-left: 4px;"> Premier University | I Am <b> <?php echo $row['student_name'];?> </b> </h6>
<?php
}
?>
  </div>
  <div class="col-6 offset-md-2 justify-content-end" style="display: flex; flex-wrap: wrap;">
      <img src="../img/moon.png" style="height:30px" onclick="myFunction()"  id="icon">
      <div>
</div>
</div>
</section>

<nav class="navbar navbar-expand-lg navbar-dark mb-3">
        <div class="container justify-content-around">
        <div class=" container col-12 px-5 pt-2 bg">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 navhover">
            <li class="nav-item mx-2">
            <a class="nav-link text-white" aria-current="page" href="studentProfile.php">Home</a>
             </li>
             <li class="nav-item mx-4">
            <a class="nav-link text-white bordernav" href="payment.php">Payment</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link text-white bordernav" href="success.php">Receipt</a>
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

  <section>
    <div class="container">
            <div class="row">
                <div class="col-md-10 col-xs-3">
                    <div>
                    <h5>
<?php
$stmt = $connect->query("SELECT student_name FROM studentsignup WHERE roll_no='". $_SESSION["roll_no"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
<th><?php echo($row['student_name'])?></th>
<?php
}
?>
                                </h5>
                                <p>Department of Computer Science & Engineering</p>
                             
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item text-center">
                                <a class="nav-link active" id="home-tab"  href="#" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:9rem">Enrollment</a>
                            </li>      
                      </ul>
                    </div>
                </div>
                <div class="col-md-1 offset-md-1 mt-5">
                <?php
$stmt = $connect->query("SELECT roll_no FROM studentsignup WHERE roll_no='". $_SESSION["roll_no"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
                    <p>Roll : <th> <b> <?php echo($row['roll_no'])?> </b> </th> </p>
<?php
}
?>
                </div>
                <div class="col-md-12" style="color:skyblue; border-top: 2px solid;"></div>
               
            </div>
            
    </div>
    
</section>


<section>
      <div class="container my-3">
        <div class="row">
          <div class="col-md-12">
            <span style="float: right; font-family: Palatino Linotype, Verdana; font-size: 11pt">
              <b>Session: </b> Fall 2020 (B. Sc.)<br><b>ExamTypes: </b> Regular, Recourse, Retake</span>
          </div>
          <div class="col-md-12  my-3" style="color:skyblue; border-top: 2px solid;"></div>
        </div>
      </div>
    </section>

    
    <section>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-12">
        <table class="table table-hover table-bordered text-center" style="background-color: rgb(0, 225, 255);">
            <thead>
              <tr>
              <th scope="col">Course Id</th>
                <th scope="col">Semester</th>
                <th scope="col">Course</th>
                <th scope="col">ExamType</th>
                <th scope="col">Fee</th>
                <th scope="col">Total Fee</th>
               

              </tr>
            </thead>
            <tbody>
<?php
$stmt = $connect->query("SELECT a.*, b.totalfee,b.tuitionfee,b.examfee
from pendingcourse  a
left join coursetable b on a.course_id=b.course_id WHERE a.status= 1 and a.roll_no ='". $_SESSION["roll_no"]."'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total=0;
foreach($rows as $row)
{
?>
              <tr>
                <th><?php echo($row['course_id'])?></th>
                <td><?php echo $row['semester'];?></td>
                <td><?php echo $row['course_name'];?></td>
                <td><?php echo $row['exam_type']; ?></td>
                <td><?php echo "Tuition Fee:"."$row[tuitionfee]" .'+' . "Exam Fee:". "$row[examfee]" ; ?></td>
                <td><?php echo $row['tuitionfee'] + $row['examfee'] ; ?></td>
                
              </tr>
              <thead>
              <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
<?php	
		 $total=$total+($row['tuitionfee'] + $row['examfee'] );
}
?>
<th>Total</th>
<th><?php echo number_format($total,2)?></th>         
            </thead>
            </tbody>
          </table>
          </div>
          </div>
          </div>
    </section>



<form action="./charge.php" method="post">
<div class="container col-1">
        <div class="row justify-content-center">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-name="PUAIS"
          data-description="Online Payment"
          data-amount="<?php echo ($total)?>>"
          data-email="<?php echo $row['email']; ?>"
          data-label="Pay Now"
          data-allow-remember-me=false
          data-image=" https://www.university-directory.eu/instlogos/BD-Premier-University-PU.jpg"
          data-locale="auto"></script>
          </div>
          </div>
</form>


<br>
<br>

<div class="col-sm-4 col-md-8 offset-md-2">
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
<script src="../bootstrap/dist/js/bootstrap.js">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
if(localStorage.getItem("theme") == null)
{
  localStorage.setItem("theme","light");
}

let localdata= localStorage.getItem("theme");

if(localdata == "light")
{
  icon.src="../img/moon.png";
  document.body.classList.remove("dark-mode");
}
else if(localdata =="dark")
{
  icon.src="../img/sun.png";
  document.body.classList.add("dark-mode");
}

function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
   if(element.classList.contains("dark-mode"))
   {
    localStorage.setItem("theme","dark");
   icon.src="../img/sun.png";
}
else{
  icon.src="../img/moon.png";
  localStorage.setItem("theme","light");
}
}
</script>

</body>
</html>