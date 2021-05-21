<?php
session_start();
require "connection.php";
if(!isset($_SESSION["emai"]))
{
  header("location:TeacherLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Exo:ital@1&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="../Student/StudentProfile.css">
    <title>Profile</title>
    <style>
      body{
      background-image: url(../img/blueedition.jpg);
      background-repeat: no-repeat;
      }
    </style>
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
$stmt = $connect->query("SELECT * FROM teachersignup WHERE email='".$_SESSION["emai"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
        <h6 class="mt-4" style="margin-left: 4px;"> Premier University | I Am <b> <?php echo $row['teacher_name'];?></b></h6>
<?php
}
?>
      </div>
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
            <a class="nav-link text-white" aria-current="page" href="teacherProfile.php">Home</a>
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
    <div class="container mb-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="offset-md-5">
 <?php
$stmt = $connect->query("SELECT img FROM teachersignup WHERE email='". $_SESSION["emai"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
                   <td>
                     <img src="<?php echo "../Teacher/upload/".$row['img'];?>" height="150" width="160">
                    </td>
<?php
}
?>
                          
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                                <h5>
<?php
$stmt = $connect->query("SELECT teacher_name FROM teachersignup WHERE email='". $_SESSION["emai"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
<th><?php echo($row['teacher_name'])?></th>
<?php
}
?>
                                </h5>
                                <p>Department of Computer Science & Engineering</p>
                             
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item text-center mt-5">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:7rem">Wall</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-1 offset-md-2 mt-5">
 <?php
$stmt = $connect->query("SELECT id_no FROM teachersignup WHERE email='". $_SESSION["emai"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
                    <p>ID NO : <th> <b> <?php echo($row['id_no'])?> </b> </th> </p>
<?php
}
?>
                </div>
                <div class="col-md-8 offset-md-3" style="color:skyblue; border-top: 2px solid;"></div>
            </div>
            
            <div class="row">
                <div class="col-md-4 text-center  offset-md-1">
                <!-- <div class="exclusive">
                      <strong>E X C L U S I V E &nbsp; P O W E R S</strong>
                    </div> -->
                    
                        <div class="list-group list-group-flush listhover fw-bold">
                            <a href="teacherApproval.php" class="list-group-item list-group-item-action licolor mt-1" style="height:30px;">Pending</a>
                          </div>                                                   
                    </div>                            
                </div>
            </div>           
  </section>
  <br>
  <br>

<div class="col-sm-4 col-md-8 offset-md-2 mt-5">
<div style="color:skyblue; border-top: 2px solid;"></div>
</div>
<footer class="text-center col-xs-4">
        <pre>
        
            Copyright ©2011-2021 Premier University, All Rights Reserved.
            Software Section , Department of IT,Premier University (Design & Develop)
         
        </pre>
</footer>
<script src="../bootstrap/dist/js/bootstrap.js">
</script>
</body>
</html>