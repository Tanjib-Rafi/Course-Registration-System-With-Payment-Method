<?php
session_start();
require_once "../connection.php";

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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Addcourses.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <title>Course Details</title>
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
    <div class="container" style="margin-left: 50px;">
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
<div class="container mt-5">
  <div class="row justify-content-center">
<div class="col-md-10">
  <div class="card">
    <div class="card-header">
     Add Course 
    </div>
  <table id="example" class="table table-striped text-center" style=" background-color: rgb(0, 225, 255);">
    <thead> 
            <th>Course Id</th>
            <th>Course Name</th>
            <th>Seat Limit </th>
            <th>Seat Available </th>
            <th>Students </th>
          

    </thead>
<tbody>  

<?php
$stmt1 = $connect->query("SELECT coursetable.*,count(pendingcourse.course_id) as stu,pendingcourse.course_id from pendingcourse   inner join coursetable  ON coursetable.course_id = pendingcourse.course_id  Where pendingcourse.status=1 GROUP BY pendingcourse.course_id ");
$rows1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

foreach($rows1 as $row1)
//$q=$row1['seat_limit'];
{
?>
 <tr>
<td><?php echo $row1['course_id']; ?></td>
<td><?php echo $row1['course_name']; ?></td>
<td><?php echo $row1['seat_limit']; ?></td>
<td><?php echo $row1['seat_available']; ?></td>
<td><?php echo $row1['stu']; ?></td>
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

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>


<script src="../bootstrap/dist/js/bootstrap.js">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>