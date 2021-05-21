<?php
session_start();
require_once "../connection.php";
if(!isset($_SESSION["roll_no"]))
{
  header("location:StudentLogin.php");
}
?>

<?php
if(isset($_POST['session']))
{
  if(strcmp($_POST['session'],"1")== 0)
  {
    header("location:coursetable.php");
  }
  else{
    header("location:Session.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="StudentProfile.css">
    <title>Session</title>
</head>
<body>

    <div class="container">
        <div class="row mt-4 mb-3">
          <div class="col-10 offset-md-1">
          <div class="d-flex flex-row-reverse">
            <p>For Faculty of Engineering: Beta Version</p>
        </div>
        </div>
        </div>
    </div>

<section>
    <div class="container" style="margin-left: 105px;">
      <div class="row">
        <div class="col-5 offset-md-1" style="display: flex; flex-wrap: wrap;">
        <img src="../img/puclogo.jpg" style="height:40px">
          <?php
$stmt = $connect->query("SELECT * FROM studentsignup WHERE roll_no='".$_SESSION["roll_no"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
        <h6 class="mt-4" style="margin-left: 4px;"> Premier University | I Am <b> <?php echo $row['student_name'];?></b></h6>
<?php
}
?>
      </div>
          <div class="col-5 justify-content-end" style="display: flex; flex-wrap: wrap;">
      <img src="../img/moon.png" style="height:30px" onclick="myFunction()"  id="icon">
      <div>
    </div>
    </div>
</section>

<nav class="navbar navbar-expand-lg navbar-dark mb-3">
        <div class="container justify-content-around">
          <div class="col-md-10  col-sm-6 col-xs-6 px-5 pt-2 bg1">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 navhover">
            <li class="nav-item mx-2">
            <a class="nav-link text-white" aria-current="page" href="StudentProfile.php">Home</a>
             </li>
            <li class="nav-item mx-2">
            <a class="nav-link text-white" href="payment.php">payment</a>
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
                <div class="col-md-4 offset-md-1">
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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:8rem">Enrollment</a>
                            </li>
                          <li class="nav-item text-center">
                              <a class="nav-link active" id="home-tab" data-toggle="tab" href="Session.php" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:8rem">Select Session</a>
                          </li>
                          
                      </ul>
                    </div>
                </div>
                <div class="col-md-1 offset-md-4 mt-5">
                <?php
$stmt = $connect->query("SELECT roll_no FROM studentsignup WHERE roll_no='". $_SESSION["roll_no"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
                    <p>Roll : <th><b> <?php echo($row['roll_no'])?> </b> </th> </p>
<?php
}
?>
                </div>
                <div class="col-md-10 offset-md-1" style="color:skyblue; border-top: 2px solid;"></div>   
            </div> 
    </div> 
</section>

<section>
  <div class="container" style="margin-bottom: 100px;"> 
    <div class="row">  
      <div class="col-md-2 col-sm-2 offset-md-3 d-flex " style="margin-top: 52px;" >
        <td style=" height: 22px;">
          Select Available Session : </td>
      </div>
    <div class="col-md-2 mt-5 d-flex justify-content-center">
    <form action="" method="post" id="form">
<select name="session" class="form-select form-select-sm btn btn-warning"   aria-label=".form-select-sm example" onChange="this.form.submit()">
<option selected>Select</option>
<?php 
$stmt1 = $connect->query("SELECT * from session WHERE status=1");
$rows = $stmt1->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
?>
  
  <option value="1"><?php echo($row['session_id'])?></option>
<?php 
}
?>
</select>
</form>
</div>
</div>
</div>
</section>

<br>
<br>

<div class="col-sm-2 col-md-8 offset-md-2">
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
  </script>
  
  <!-- <script>
  function disable(val)
  {
      if(val=="V")
           document.getElementById("text-one").disabled=true;
      else
          document.getElementById("text-one").disabled=false;
  }
</script> -->
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