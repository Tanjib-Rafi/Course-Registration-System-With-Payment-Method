<?php
session_start();
require_once "../connection.php";

if(!isset($_SESSION["email"]))
{
  header("location:index.php");
}

if(isset($_POST["add"]))
{
    $sql = "INSERT INTO session (session_id)  VALUES (:session_id)";
    $stmt = $connect->prepare($sql);
    $stmt->execute(array(
        ':session_id' => $_POST['session_id']
    ));

    header("location:Addsession.php");
}
?>
<?php
require_once "../connection.php";
if(isset($_GET['session_id']) )
{
  
    $sql = "DELETE FROM session WHERE session_id = :session_id";
    $stmt = $connect->prepare($sql);
    // $stmt->execute(array(
    //     ':session_id' => $_POST['session_id']
    $stmt->execute(array(    
       ':session_id' => $_GET['session_id'] 
    ));
   
     header("location:Addsession.php");
  
}
?>

<?php
if(isset($_POST["status"]))
{ 
  $status = $_POST['status'];
	$sqlp="UPDATE session SET status = $status ";
  $stmt=$connect->prepare($sqlp);
  $stmt->execute();
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
    <link rel="stylesheet" href="Addcourses.css">
    <title>Add Session</title>
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
          <div class="col-md-10 col-xs-6 px-5 pt-2 bg">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  me-auto mb-2 mb-lg-0 navhover">
            <li class="nav-item mx-2">
            <a class="nav-link text-white" aria-current="page" href="Addcourses.php">Home</a>
             </li>
            <li class="nav-item mx-2">
            <a class="nav-link text-white" href="Addsession.php">Session</a>
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
          <div class="row" >
            <div class="col-md-3"></div>
              <div class="col-md-6">
                  <div class="card">
                  <div class="card-header">
                     Add Session
                  </div>

<div class="card-body"  style="background-color: rgb(0, 225, 255);">
<form  action="addsession.php" method="post" autocomplete="off">
<div class="form-group">
<label for="session_id">Create Session </label>
<input type="text" class="form-control" id="session_id" name="session_id" placeholder="Session" />
</div>
<button type="submit" name="add" class="btn btn-warning mt-2">Add</button>
</form>
</section>

<!-- extra -->


<section>
<div class="card-body">
<form  action="addsession.php" method="post" autocomplete="off">
<div class="container mt-5">
  <div class="row justify-content-center">
<div class="col-md-5">
  <div class="card">
    
  <table id="example" class="table table-bordered text-center" style=" background-color: rgb(0, 225, 255);">
    <thead> 
           <th>Session</th>
           <th>SELECT</th>
           <th>Action</th>
           
    </thead>
  
</form>
</section> 
<tbody>  

<?php
$stmt = $connect->query("SELECT * FROM session");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row)
{
?>
        <tr>
            <td><?php echo $row['session_id']; ?></td>


<td>
<select name="status" class="btn btn-success" id="type">
  <option  value="1" <?php if($row['status']=="1"){?> selected="selected" <?php } ?> >Enable</option>
  <option  value="0" <?php if($row['status']=="0"){?> selected="selected" <?php }?>> Disable </option>
  <input type="submit" class="btn btn-warning mx-2">
  
</select>
</td>


            <td><a class="btn btn-danger" data-toggle="modal" href="#de<?php echo $row['session_id']?>">Delete</a>
            <div class="modal" id="de<?php echo $row['session_id']?>"> 
            <div class="modal-dialog"> 
              <div class="modal-content"> 
               <div class="modal-header">
                   <h4 class="modal-title">Delete Confirmation!!!</h4> 
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div> 
                    <div class="modal-body"> Are you sure to delete <b><?php echo $row['session_id'] ?></b> ? </div> 
                    <div class="modal-footer"> <a href="addsession.php?session_id=<?php echo $row['session_id']?>" class="btn btn-success">Yes</a> 
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

<script src="../bootstrap/dist/js/bootstrap.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>

</script>
</body>
</html>