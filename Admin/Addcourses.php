<?php
session_start();
require_once "../connection.php";

if(!isset($_SESSION["email"]))
{
  header("location:index.php");
}

if(isset($_POST["submit"]))
{
    $sql = "INSERT INTO coursetable (course_id,semester,course_name,seat_limit,tuitionfee,examfee)VALUES (:course_id,:semester,:course_name,:seat_limit,:tuitionfee,:examfee)";
    $stmt = $connect->prepare($sql);
    $stmt->execute(array(
        ':course_id' => $_POST['course_id'],
        ':semester' => $_POST['semester'],
        ':course_name' => $_POST['course_name'],
        ':seat_limit' => $_POST['seat_limit'],
        ':tuitionfee' => $_POST['tuitionfee'],
        ':examfee' => $_POST['examfee'],
        //':totalfee' => $_POST['totalfee']

    ));
    header("location:Addcourses.php");
}
?>
<?php
if(isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $sql ="DELETE FROM coursetable WHERE course_id = :course_id";
    $stmt = $connect->prepare($sql);
    $stmt->execute(array(
        ':course_id' => $_GET['course_id']     
    ));
    header("location:Addcourses.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >

    <link rel="stylesheet" href="Addcourses.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <title>Add course</title>
</head>
<body>
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
    <div class="container" style="margin-left: 70px;">
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
        <div class=" container col-11 px-5 pt-2 bg">
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
<div class="container">
<div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                 Add Course 
                </div>
               
<div class="card-body" style=" background-color: rgb(0, 225, 255);">
<form action="Addcourses.php" method="post" autocomplete="off"> 
<div class="form-group">
    <label for="course_id">Course Id</label>
    <input type="text" class="form-control" id="course_id" name="course_id" placeholder="course id" required />
</div>

<div class="form-group">
  <label for="semester">Semester</label>
  <input type="text" class="form-control" id="semester" name="semester" placeholder="semester" required />
</div>

<div class="form-group">
    <label for="course_name">Course Name  </label>
    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="course name" required />
</div>

<div class="form-group">
    <label for="seat_limit">Seat limit  </label>
    <input type="text" class="form-control" id="seat_limit" name="seat_limit" placeholder="seat_limit" required />
</div>   

<div class="form-group">
    <label for="">Tuition Fee </label>
    <input type="text" class="form-control" id="tuitionfee" name="tuitionfee" placeholder="tuition fee" required />
</div>

<div class="form-group">
    <label for="examfee">Exam Fee </label>
    <input type="text" class="form-control" id="examfee" name="examfee" placeholder="exam fee" required />
</div> 



  <button type="submit" name="submit" class="btn btn-warning mt-2">Add</button>
</form>
</div>
</div>
        </div>
    </div>
</div>
</section>                 

<section>
<div class="container mt-5">
  <div class="row justify-content-center">
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
     Add Course 
    </div>
  <table id="example" class="table table-striped text-center" style=" background-color: rgb(0, 225, 255);">
    <thead> 
            <th>Course Id</th>
            <th>Semester</th>
            <th>Course Name</th>
            <th>Seat Limit</th>
            <th>Tuition Fee </th>
            <th>Exam Fee </th>
            <th>Edit</th>
            <th>Delete</th>

    </thead>
<tbody>  
<?php
$stmt = $connect->query("SELECT * FROM coursetable");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
?>
        <tr>
            <td><?php echo $row['course_id']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['course_name']; ?></td>
            <td><?php echo $row['seat_limit']; ?></td>
            <td><?php echo $row['tuitionfee'];?></td>
            <td><?php echo $row['examfee'];?></td>
            <td><a href="edit.php?course_id=<?php echo $row['course_id']?>" class='btn btn-secondary'>Edit</a></td>
            <td><a class="btn btn-danger" data-toggle="modal" href="#de<?php echo $row['course_id']?>">Delete</a>
            <div class="modal" id="de<?php echo $row['course_id']?>"> 
            <div class="modal-dialog"> 
              <div class="modal-content">
               <div class="modal-header">
                   <h4 class="modal-title">Delete Confirmation!!!</h4> 
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div> 
                    <div class="modal-body"> Are you sure to delete <b><?php echo $row['course_name'] ?></b> ? </div> 
                    <div class="modal-footer"> <a href="Addcourses.php?course_id=<?php echo $row['course_id']?>" class="btn btn-danger">Yes</a> 
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                   </div>
                   </div> 
                  </div>
                 </div>
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
</section>


<br>
<br>
<div class="col-sm-4 col-md-8 offset-md-2 ">
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
  <script src="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>