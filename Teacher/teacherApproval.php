<?php
session_start();
require_once "connection.php";
if(!isset($_SESSION["emai"]))
{
  header("location:TeacherLogin.php");
}
?>
<?php
if(isset($_POST["submit"]))
{ 
	$course=$_POST['course'];
  $roll = $_POST['roll'];
	$sqlp="UPDATE pendingcourse SET status = 1 WHERE course_id = $course AND roll_no = $roll ";
  $stmt=$connect->prepare($sqlp);
  $stmt->execute();
}
?>

<?php
if(isset($_POST["submit"]))
{
	$course=$_POST['course'];
  $seat_limit=$_POST['seat_limit'];
	$sqlp="UPDATE coursetable SET seat_available=seat_limit-1 WHERE course_id = $course";
  $stmt=$connect->prepare($sqlp);
  $stmt->execute();
}
?>

<?php
if(isset($_POST["delete"]))
{ 
	$course=$_POST['course'];
  $roll = $_POST['roll'];
    $sql ="DELETE FROM pendingcourse WHERE course_id = $course AND roll_no = $roll";
    $stmt=$connect->prepare($sql);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="Teacheraccept.css">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet" >
    <title>Pending</title>
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
    <div class="col-3" style="display: flex; flex-wrap: wrap;">
    <img src="../img/puclogo.jpg" style="height:40px">
<?php
$stmt = $connect->query("SELECT * FROM teachersignup WHERE email='".$_SESSION["emai"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
        <h6 class="mt-4" style="margin-left: 4px;"> Premier University | I Am <?php echo $row['teacher_name'];?></h6>
<?php
}
?>
  </div>
</div>
</div>
</section>


<nav class="navbar navbar-expand-lg navbar-dark mb-3">
        <div class="container justify-content-around">
          <div class="col-md-12  col-sm-6 col-xs-6 px-5 pt-2 bg1">
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
        <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div>
                                    <h5>
<?php
$stmt = $connect->query("SELECT * FROM teachersignup WHERE email='". $_SESSION["emai"]."'");
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
                            <li class="nav-item text-center">
                              <a class="nav-link active" id="home-tab"  href="teacherApproval.php" role="tab" aria-controls="home" aria-selected="true" style=" background-color: #00c0c0; width:10rem">Pending Requests</a>
                          </li>   
                          </ul>
                        </div>
                    </div>
                    <div class="col-md-1 offset-md-1 mt-5">
                    <?php
$stmt = $connect->query("SELECT * FROM teachersignup WHERE email='". $_SESSION["emai"]."'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
{
?>
                    <p>ID NO : <th><b> <?php echo($row['id_no'])?> </b> </th> </p>
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
  <div class="container-fluid mt-3 mb-3 ">
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
      
<section>
    <?php if(isset($_GET['action']) && $_GET['action']=='order' && '". $_GET["roll_no"]."'){?>
    <form action="" method="post">
        <div class="container">    
        <div class="row justify-content-center">
            <div class="col-xs-4 col-md-12">
            <table>
        <table class="table table-hover table-bordered text-center" style=" background-color: rgb(0, 225, 255);">
            <thead>
              <tr>
              <th scope="col">Student Roll</th>
              <th scope="col">Course Id</th>
                <th scope="col">Semester</th>
                <th scope="col">Course</th>
                <th scope="col">ExamType</th>
                <th scope="col">Approve</th>
                <th scope="col">Reject</th>
              </tr>
            </thead>
            <tbody>
       
<?php
$stmt = $connect->query("SELECT a.*, b.seat_limit FROM pendingcourse a left join coursetable b on a.course_id=b.course_id WHERE status=0 and roll_no='". $_GET["roll_no"]."'");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
?>
              <tr>
              <td><?php echo $row['roll_no'];?></td>
                <th><?php echo $row['course_id'];?></th>
                <td><?php echo $row['semester'];?></td>
                <td><?php echo $row['course_name'];?></td>
                <td><?php echo $row['exam_type']; ?></td>
               
                <form action="" method='POST'>
                <td>
                
                <input type="hidden"  value="<?php echo $row['course_id'];?>" name="course" />
                <input type="hidden"  value="<?php echo $row['roll_no'];?>" name="roll" />
                <input type="hidden"  value="<?php echo $row['seat_limit'];?>" name="seat_limit" />
                <input type="hidden"  value="<?php echo $row['seat_available'];?>" name="seat_available" />
                <button type="submit" name="submit"  class="btn btn-warning mt-2">
                Approve
                </button>
                
                </td>
                </form>
                <form action="" method='POST'>
                <td>
                
                <input type="hidden"  value="<?php echo $row['course_id'];?>" name="course" />
                <input type="hidden"  value="<?php echo $row['roll_no'];?>" name="roll" />
                <button type="submit" name="delete"  class="btn btn-warning mt-2">
               DELETE
                </button>
                
                </td>
                </form>   
              </tr>
              </form>
 <?php
} 
?>
            </tbody>
          </table>
          </div>
          </div>
          </div>
</section>

<section>
    <?php } else { ?>
        <div class="container">    
        <div class="row justify-content-center" id="search_table">
            <div class="col-sm-8 col-md-12">
            <table class="">
        <table class="table table-hover table-bordered text-center" style=" background-color: rgb(0, 225, 255);">
            <thead>
              <tr>
              <th scope="col">Student Roll</th>
              <th scope="col">Student Name</th>
                <th scope="col">Action</th>
               
              </tr>
            </thead>
            <tbody>
<?php
$stmt = $connect->query("SELECT * FROM studentsignup");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
?>
              <tr>
              <td><?php echo $row['roll_no'];?></td>
                <td><?php echo $row['student_name'];?></td>
                <td><a href="?action=order&roll_no=<?php echo $row['roll_no'];?>" class="btn btn-sm btn btn-warning" style="width: 120px;"> View</a></td>
                </tr>
<?php
}
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

<script src="../bootstrap/dist/js/bootstrap.js">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>