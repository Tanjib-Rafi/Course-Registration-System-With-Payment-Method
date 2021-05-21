<?php
session_start();
require_once "../connection.php";
if(!isset($_SESSION["email"]))
{
  header("location:AdminLogin.php");
}
?>

<?php
    if(isset($_POST['submit']))
    {
      $course_id = $_POST['course_id'];
      $semester = $_POST['semester'];
      $course_name = $_POST['course_name'];
      $seat_limit = $_POST['seat_limit'];
      $seat_available = $_POST['seat_available'];
      $tuitionfee = $_POST['tuitionfee'];
      $examfee = $_POST['examfee'];


    $stmt = $connect->prepare('UPDATE coursetable SET semester = :semester, course_name = :course_name, seat_limit = seat_limit + :seat_limit, seat_available = seat_available + :seat_limit, tuitionfee = :tuitionfee, examfee = :examfee WHERE course_id = :course_id');
         $stmt->execute(array(':semester' => $semester,':course_name' => $course_name,':seat_limit' => $seat_limit,':course_id'=>$course_id,':tuitionfee'=>$tuitionfee,':examfee'=>$examfee ));
        // $stmt->execute();
  header("location:Addcourses.php");
    }


    $course_id=$_GET['course_id'];
    $stmt = $connect->prepare('SELECT *  FROM coursetable WHERE course_id=:course_id');
    
    $stmt->execute(array(':course_id' => $course_id));
    $coursetable = $stmt->fetch(PDO::FETCH_ASSOC);

    //$row = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Addcourses.css">
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Profile</title>
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
    <div class="container" style="margin-left: 105px;">
      <div class="row">
        <div class="col-3 offset-md-1" style="display: flex; flex-wrap: wrap;">
          <img src="../img/puclogo.jpg" style="height:40px">
          
        <h6 class="mt-4" style="margin-left: 4px;"> Premier University</h6>
      </div>
    </div>
    </div>
</section>

<section>
    <nav class="navbar navbar-expand-lg navbar-dark mb-3">
        <div class="container justify-content-around">
          <div class="col-md-10 col-xs-6 px-5 pt-2 bg">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav   mb-2 mb-lg-0 navhover">
              <li class="nav-item mx-2">
                <a class="nav-link text-white bordernav" aria-current="page" href="chagepassword.html">Home</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link text-white bordernav" href="Addsession.php">Session</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link text-white" href="Addcourses.php">Course</a>
              </li>
              <li class="nav-item" style="margin-left: 400px;">
                <a class="nav-link text-white"   href="logout.php">Signout</a>
              </li>
            </ul>
          </div>
          </div>
        </div>
      </nav>
</section>

<section>
<form action="edit.php" method="post" autocomplete="off"> 
<div class="container">
<div class="row">
    <div class="col-md-3">
    </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                 Edit Course 
                </div>
           
<div class="card-body" style=" background-color: rgb(0, 225, 255);">
<input type="hidden" value="<?php echo $coursetable['course_id']; ?>" name="course_id">

<div class="form-group">
  <label for="semester">Semester</label>
  <input type="text" value="<?php echo $coursetable['semester'];?>" class="form-control" id="semester" name="semester" placeholder="Semester" required />
</div>

<div class="form-group">
    <label for="course_name">Course Name  </label>
    <input type="text" value="<?php echo $coursetable['course_name'];?>" class="form-control" id="course_name" name="course_name" placeholder="Course_name" required />
</div>

<div class="form-group">
    <label for="seat_limit">Seat limit  </label>
    <input type="text" value="<?php echo $coursetable['seat_limit'];?>" class="form-control" id="seat_limit" name="seat_limit" placeholder="seat_limit" disabled />
  </div> 

  <div class="form-group">
    <label >Add seat</label>
    <input type="text" value="<?php echo $coursetable['seat_limit'];?>" class="form-control" id="seat_limit" name="seat_limit" placeholder="add_seat" required />
  </div> 


  <div class="form-group">
    <label>Tuition Fee </label>
    <input type="text" value="<?php echo $coursetable['tuitionfee'];?>" class="form-control" id="tuitionfee" name="tuitionfee" placeholder="Tuition Fee" required />
</div>

<div class="form-group">
    <label for="examfee">Exam Fee </label>
    <input type="text" value="<?php echo $coursetable['examfee'];?>" class="form-control" id="examfee" name="examfee" placeholder="examfee" required />
</div>   



  <button type="submit" name="submit" class="btn btn-warning mt-2">Submit</button>

</div>
</div>
</div>
</div>
</form>
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

</body>
</html>                 