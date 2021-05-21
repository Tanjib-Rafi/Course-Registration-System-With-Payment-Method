<?php
session_start();
require_once "connection.php";
if(!isset($_SESSION["roll_no"]))
{
  header("location:StudentLogin.php");
}
if(!isset($_SERVER['HTTP_REFERER']))
{
  header('location:session.php');
  exit;
}
?>

<?php
if (isset($_POST['enroll']))
{
if (!empty($_POST['chk1'])) 
{
  if (!empty($_POST['et'])) 
{

   
    $roll_no = $_SESSION['roll_no'];

    $selectbox1 = $_POST['et'];
    $selectbox11=implode(',',array_filter($selectbox1));
    
    
 
    
    $i=0; 
foreach($_POST['chk1'] as $checkbox1)
{

  $selectbox111 = array_diff(explode(",", $selectbox11),array(""));
  $selectbox1111  = $selectbox111[$i];

$values = explode("|" , $checkbox1);
$course_id= $values[0];
$semester= $values[1];
$course_name= $values[2];


$sql="INSERT INTO pendingcourse(roll_no,course_id,semester,course_name,exam_type,status) VALUES('$roll_no','$course_id','$semester','$course_name','$selectbox1111',0)";
$stmt = $connect->prepare($sql);
$stmt->execute();
$checkbox1='';
$i++;
}
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@1,100&family=Lobster&family=Stalinist+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="coursetable.css">
    <title>Enrollment</title>
</head>
<body>
  <div class="container">
    <div class="row mt-4 mb-3">
      <div class="col-10 offset-md-2">
      <div class="d-flex flex-row-reverse">
        <p>For Faculty of Engineering: Beta Version</p>
    </div>
    </div>
    </div>
</div>

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
                <div class="col-md-9 col-xs-3">
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
                          <li class="nav-item text-center">
                              <a class="nav-link active" id="home-tab"  href="Session.php" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:9rem">Select Session</a>
                          </li>
                          <li class="nav-item text-center">
                            <a class="nav-link active" id="home-tab"  href="coursetable.php" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:11rem">Select Courses & Enroll</a>
                        </li>
                        <li class="nav-item text-center">
                          <a class="nav-link active" id="home-tab"  href="Pending.php" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:10rem">Pending Requests</a>
                      </li>
                      <li class="nav-item text-center">
                        <a class="nav-link active" id="home-tab"  href="Approved.php" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:10rem">Approved Requests</a>
                    </li>       
                      </ul>
                    </div>
                </div>
                <div class="col-md-1 offset-md-2 mt-5">
                <?php
$stmt = $connect->query("SELECT roll_no FROM studentsignup WHERE roll_no='". $_SESSION["roll_no"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
                    <p>Roll : <th><b><?php echo($row['roll_no'])?> </b> </th> </p>
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
        <?php
$stmt = $connect->query("SELECT * FROM session");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>
          <b>Session: </b> <?php echo $row['session_id']; ?><br><b>ExamTypes: </b> Regular, Recourse, Retake</span>
      </div>
      <div class="col-md-12  my-3" style="color:skyblue; border-top: 2px solid;"></div>
    </div>
  </div>
</section>

<form id="form1" action="coursetable.php" method="post"> 
<div class="container mt-3" >
    <div class="accordion mb-4" id="accordionExample" >
        <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
          <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed fw" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="background: #AAFFA9;">
              1st Semester
            </button>
          </h2>
          <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" >
            <div class="accordion-body">
                <table class="table table-bordered border-primary text-center">
                <!-- <p> <input type="checkbox" id="selectAll"/>Select All</p> -->
                    <thead>
                      <tr>
                        <th scope="col-1">Course Id</th>
                        <th scope="col-1">Semester</th>
                        <th scope="col-7">Course</th>
                        <th scope="col-1">Exam Type</th>
                        <th scope="col-1">Select</th>
                          
                      </tr>
                    </thead>
                    <tbody>                              
<?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '1st' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row)
{

  $course_id = $row['course_id'];
  $semester = $row['semester'];
  $course_name = $row['course_name'];
?>
                    <tr>
                        <td scope="row"> <?php echo $course_id?></td>
                        <td > <?php echo $semester ?></td>
                        <td ><?php echo $course_name ?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                        </select>
                        </td>
                        </td>
                        <td> 
                        <?php if($row['seat_available'] > 0){?>
                     <input type="checkbox" class="ch" id="checked" onclick="check();" name="chk1[]" value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?>  
                        </td>
                      </tr> 
                       
 <?php
}
?>
                    </tbody> 
              </table>
          </div>
        </div>
      </div>
    </div>


<div class="accordion" id="accordionExample">
        <div class="accordion-item mb-4">
        <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
          <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background: #AAFFA9;">
              2nd Semester
            </button>
          </h2>
          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table table-bordered border-primary text-center">
                <!-- <p> <input type="checkbox" id="selectAll1"/>Select All</p> -->
                    <thead>
                      <tr>
                        <th scope="col-1">Course Id</th>
                        <th scope="col-1">Semester</th>
                        <th scope="col-7">Course</th>
                        <th scope="col-1">Exam Type</th>
                        <th scope="col-1">Select</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '2nd' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
  
?>
                        <tr>
                        <th scope="row"> <?php echo($row['course_id'])?> </th>
                        <td> <?php echo($row['semester'])?></td>
                        <td><?php echo($row['course_name'])?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                         <?php 
                            
                          ?>
                        </select>
                            <td> 
                            <?php if($row['seat_available'] > 0){?> 
                        <input type="checkbox" class="ch1" id="checked" onclick="check();" name="chk1[] " value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>  
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?>
                        </td>
                          </tr>
<?php
}
?>
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
    </div>


    <div class="accordion" id="accordionExample">
        <div class="accordion-item mb-4">
        <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
          <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background: #AAFFA9;">
              3rd Semester
            </button>
          </h2>
          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <table class="table table-bordered border-primary text-center">
                <!-- <p> <input type="checkbox" id="selectAll2"/>Select All</p> -->
                    <thead>
                      <tr>
                        <th scope="col-1">Course Id</th>
                        <th scope="col-1">Semester</th>
                        <th scope="col-7">Course</th>
                        <th scope="col-1">Exam Type</th>
                        <th scope="col-1">Select</th>
                      </tr>
                    </thead>
                    <tbody>
 <?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '3rd' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
  
?>
                        <tr>
                        <th scope="row"> <?php echo($row['course_id'])?> </th>
                        <td> <?php echo($row['semester'])?></td>
                        <td><?php echo($row['course_name'])?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                         <?php 
                            
                          ?>
                        </select>
                            <td>
                            <?php if($row['seat_available'] > 0){?>
                        <input type="checkbox" class="ch2" id="checked" onclick="check();" name="chk1[] " value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label> 
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?> 
                        </td>
                          </tr>
  <?php
}
?>    
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
      <div class="accordion-item mb-4">
      <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="background: #AAFFA9;">
            4th Semester
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <table class="table table-bordered border-primary text-center">
            <!-- <p> <input type="checkbox" id="selectAll3"/>Select All</p> -->
                <thead>
                  <tr>
                    <th scope="col-1">Course Id</th>
                    <th scope="col-1">Semester</th>
                    <th scope="col-7">Course</th>
                    <th scope="col-1">Exam Type</th>
                    <th scope="col-1">Select</th>
                  </tr>
                </thead>
                <tbody>

                <?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '4th' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{

?>
                    <tr>
                    <th scope="row"> <?php echo($row['course_id'])?> </th>
                        <td> <?php echo($row['semester'])?></td>
                        <td><?php echo($row['course_name'])?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                         <?php 
                            
                          ?>
                        </select>
                        <td>  
                        <?php if($row['seat_available'] > 0){?>
                        <input type="checkbox" class="ch3" id="checked" onclick="check();" name="chk1[] " value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label> 
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?> 
                        </td>
                      </tr>
  <?php
}
?>    
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

    <div class="accordion" id="accordionExample">
      <div class="accordion-item mb-4">
      <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="background: #AAFFA9;">
            5th Semester
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <table class="table table-bordered border-primary text-center">
            <!-- <p> <input type="checkbox" id="selectAll4"/>Select All</p> -->
                <thead>
                  <tr>
                    <th scope="col-1">Course Id</th>
                    <th scope="col-1">Semester</th>
                    <th scope="col-7">Course</th>
                    <th scope="col-1">Exam Type</th>
                    <th scope="col-1">Select</th>
                  </tr>
                </thead>
                <tbody>

                <?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '5th' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{

?>
                    <tr>
                    <th scope="row"> <?php echo($row['course_id'])?> </th>
                        <td> <?php echo($row['semester'])?></td>
                        <td><?php echo($row['course_name'])?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                         <?php 
                            
                          ?>
                        </select>
                        <td>  
                        <?php if($row['seat_available'] > 0){?>
                        <input type="checkbox" class="ch4" id="checked" onclick="check();" name="chk1[] " value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>|<?php echo $row['exam_type']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label> 
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?> 
                        </td>
                      </tr>
  <?php
}
?>    
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
 

    <div class="accordion" id="accordionExample">
      <div class="accordion-item mb-4">
      <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
        <h2 class="accordion-header" id="headingSix">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="background: #AAFFA9;">
             6th Semester
          </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <table class="table table-bordered border-primary text-center">
            <!-- <p> <input type="checkbox" id="selectAll5"/>Select All</p> -->
                <thead>
                  <tr>
                    <th scope="col-1">Course Id</th>
                    <th scope="col-1">Semester</th>
                    <th scope="col-7">Course</th>
                    <th scope="col-1">Exam Type</th>
                    <th scope="col-1">Select</th>
                  </tr>
                </thead>
                <tbody>

                <?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '6th' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{

?>
                    <tr>
                    <th scope="row"> <?php echo($row['course_id'])?> </th>
                        <td> <?php echo($row['semester'])?></td>
                        <td><?php echo($row['course_name'])?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                         <?php 
                            
                          ?>
                        </select>
                        <td> 
                        <?php if($row['seat_available'] > 0){?> 
                        <input type="checkbox" class="ch5" id="checked" onclick="check();" name="chk1[] " value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label> 
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?> 
                        </td>
                      </tr>
  <?php
}
?>     
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item mb-4">
      <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
        <h2 class="accordion-header" id="headingSeven">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="background: #AAFFA9;">
            7th Semester
          </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <table class="table table-bordered border-primary text-center">
            <!-- <p> <input type="checkbox" id="selectAll6"/>Select All</p> -->
                <thead>
                  <tr>
                    <th scope="col-1">Course Id</th>
                    <th scope="col-1">Semester</th>
                    <th scope="col-7">Course</th>
                    <th scope="col-1">Exam Type</th>
                    <th scope="col-1">Select</th>
                  </tr>
                </thead>
                <tbody>

                <?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '7th' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{

?>
                    <tr>
                    <th scope="row"> <?php echo($row['course_id'])?> </th>
                        <td> <?php echo($row['semester'])?></td>
                        <td><?php echo($row['course_name'])?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                         <?php 
                            
                          ?>
                        </select>
                        <td>  
                        <?php if($row['seat_available'] > 0){?>
                        <input type="checkbox" class="ch6" id="checked" onclick="check();" name="chk1[] " value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label>  
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?>
                        </td>
                      </tr>
  <?php
}
?>   
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <div class="accordion" id="accordionExample">
      <div class="accordion-item mb-4">
      <div class="accordion-item" style="background-color: rgb(0, 225, 255);">
        <h2 class="accordion-header" id="headingEight">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" style="background: #AAFFA9;">
            8th Semester
          </button>
        </h2>
        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <table class="table table-bordered border-primary text-center">
            <!-- <p> <input type="checkbox" id="selectAll7"/>Select All</p> -->
                <thead>
                  <tr>
                    <th scope="col-1">Course Id</th>
                    <th scope="col-1">Semester</th>
                    <th scope="col-7">Course</th>
                    <th scope="col-1">Exam Type</th>
                    <th scope="col-1">Select</th>
                  </tr>
                </thead>
                <tbody>

<?php
$stmt = $connect->query("SELECT * FROM coursetable Where semester = '8th' ");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
?>
                    <tr>
                    <th scope="row"> <?php echo($row['course_id'])?> </th>
                        <td> <?php echo($row['semester'])?></td>
                        <td><?php echo($row['course_name'])?></td>
                        <td >
                        <select name="et[]" id="selectBox" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option value="" selected="selected">Select Option</option>
                              <option value="Regular" >Regular</option>
                              <option value="Retake">Retake</option>
                              <option value="Recourse">Recourse</option>
                         <?php 
                            
                          ?>
                        </select>
                        <td> 
                        <?php if($row['seat_available'] > 0){?> 
                        <input type="checkbox" class="ch7" id="checked" onclick="check();" name="chk1[] " value="<?php echo $row['course_id']?>|<?php echo $row['semester']?>|<?php echo $row['course_name']?>">
                            <label class="form-check-label" for="flexCheckDefault">
                            </label> 
                            <?php } else {?>  
                              <input type="checkbox" disabled>
                              <?php }?> 
                        </td>
                      </tr>
<?php
}
?>  
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>





<div class="container">
  <div class="row">
    <div class="col-md-2 col-xs-6 offset-md-5 mb-3">
    <button type="submit" name="enroll" class="btn btn-warning mt-2">Enroll</button>
    </div>
  </div>
</div>
</form>


<br>
<br>
<div class="col-sm-2 col-md-8 offset-md-2 ">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  $(".selectBox").change(function() {
    $(this).parent().siblings().children('input').attr('value',$(this).val());
});
</script>
<script>
$(document).ready(function() {
   $("#form1 #selectAll").click(function()
   {
     $(".ch").prop('checked',this.checked);
   })
});
</script>
<script>
$(document).ready(function() {
   $("#form1 #selectAll1").click(function()
   {
     $(".ch1").prop('checked',this.checked);
   })
});
</script>
<script>
$(document).ready(function() {
   $("#form1 #selectAll2").click(function()
   {
     $(".ch2").prop('checked',this.checked);
   })
});
</script>
<script>
$(document).ready(function() {
   $("#form1 #selectAll3").click(function()
   {
     $(".ch3").prop('checked',this.checked);
   })
});
</script>
<script>
$(document).ready(function() {
   $("#form1 #selectAll4").click(function()
   {
     $(".ch4").prop('checked',this.checked);
   })
});
</script>
<script>
$(document).ready(function() {
   $("#form1 #selectAll5").click(function()
   {
     $(".ch5").prop('checked',this.checked);
   })
});
</script>
<script>
$(document).ready(function() {
   $("#form1 #selectAll6").click(function()
   {
     $(".ch6").prop('checked',this.checked);
   })
});
</script>

<script>
$(document).ready(function() {
   $("#form1 #selectAll7").click(function()
   {
     $(".ch7").prop('checked',this.checked);
   })
});
</script>

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