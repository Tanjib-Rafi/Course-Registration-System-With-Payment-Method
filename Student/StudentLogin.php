<?php
 session_start();
 require_once "connection.php";
 if(isset($_SESSION["roll_no"]))
 {
  header("location:StudentProfile.php");
 }
 try
 {  
  $connect = new PDO('mysql:host=localhost;dbname=enroll','root','');  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["submit"]))
      {  
           if(empty($_POST["roll_no"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM studentsignup WHERE roll_no = :roll_no AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'roll_no'=>$_POST["roll_no"],  
                          'password'=>$_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();
                if($count > 0)  
                {  
                     $_SESSION["roll_no"] = $_POST["roll_no"];  
                     header("location:StudentProfile.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>
 <?php
require_once "connection.php";
 if (isset($_POST['register']) && isset($_FILES['img']))
          {     
        $student_name = $_POST['student_name'];
        $roll_no = $_POST['roll_no'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $father_name= $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $address = $_POST['address'];
        $mobile_no = $_POST['mobile_no'];
        $guardian_name= $_POST['guardian_name'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        $image_file =$_FILES['img']['name'];
        $type = $_FILES['img']['type'];
        $size=$_FILES['img']['size'];
        $temp =$_FILES['img']['tmp_name'];
   
        $path="upload/";
         
        move_uploaded_file($temp, $path.$image_file);

         $sql = "INSERT INTO studentsignup(student_name,roll_no,email,department,father_name,mother_name,address,mobile_no,guardian_name,password,confirm_password,img) VALUES (:student_name,:roll_no,:email,:department,:father_name,:mother_name,:address,:mobile_no,:guardian_name,:password,:confirm_password,:img)";

            $stmt = $connect->prepare($sql);
            $stmt->execute(array(
                ':student_name' => $_POST['student_name'],
                ':roll_no' => $_POST['roll_no'],
                ':email' => $_POST['email'],
                ':department' => $_POST['department'],
                ':father_name' => $_POST['father_name'],
                ':mother_name' => $_POST['mother_name'],
                ':address' => $_POST['address'],
                ':mobile_no' => $_POST['mobile_no'],
                ':guardian_name' => $_POST['guardian_name'],
                ':password' => $_POST['password'],
                ':confirm_password' => $_POST['confirm_password'],
                ':img' => $image_file
            ));
            $count = $stmt->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION['roll_no'] = $_POST['roll_no'];  
                     header("location:StudentProfile.php");    
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }
        }     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="StudentLogin.css">
    <title>Login</title>

</head>
<body>
<section>
    <nav class="navbar navbar-expand-lg navbar-light gradient1">
        <div class="container">
          <a href="../index.html" style="font-weight: bold;font-size: 20px; list-style: none; color: black; text-decoration: none;">Home</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <p class="mt-2">For Faculty of Engineering: Beta Version
            </p>
            </div>
          </div>
        </div>
      </nav>
</section>


<section>
        <div class="container gradient1 container1">
          <div class="background-img">
            <div class="box">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <div class="content">
                <h1 class="mt-4">PUAIS</h1>
                <form action="StudentLogin.php" method="post" autocomplete="off"> 
                        <div class="login-form">
                         <?php
                        if(isset($message))
                        {
                          echo '<label class="text-danger">'.$message.'<label>';
                        }
                        ?>
                                <div class="form-group row mb-2"  style="text-align: left;">
                                    <label class="col-md-4 col-form-label text-md-right h4 ">Student Roll</label>
                                    <input type="text" name="roll_no" class="form-control1" placeholder="Student Roll" required="required">
                                </div>
                                <div class="form-group row mb-2 " style="text-align: left;">
                                    <label class="col-md-4  col-form-label text-md-right h3">Password</label>
                                    <input type="password" name="password" class="form-control1" placeholder="Password" required="required">
                                </div>
                                <div class="mb-2">
                                  <input type="submit" name="submit" value="Sign In" style="height:30px;width:70px">
                                </div>
                                <div class="clearfix">
                                    <label class="float-left form-check-label mb-2"><input type="checkbox"> Remember me</label>
                                </div>        
                          
                            <div class="text-dark">
                            <a href="#"  class="text-center text-white ">Forgot Password?</a>
                            <p>
                              <a class="text-white" data-toggle="modal" href="#exampleModalCenter">Create an Account</a>
                            </p>
                            </div>
                        </div>
                     </div>
                    </form>
              </div>
            </div>
          </div>
        </div>
</section>


<section>
      <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Student Registration Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <form class="inbox" action="StudentLogin.php" method="post" enctype="multipart/form-data" >
                <div class="modal-body modal-xl">
                  <div class="container inbox">
                    <div class="row justify-content-center">       
                        <div class="col-md-7">
                        
                                <div class="form-group row ">
                                <div class="form-group col-6">
                                    <label for="exampleInput">Full Name : </label>
                                    <input type="name" name="student_name" class="form-control" id="exampleInputname" placeholder="Full Name">
                                  </div>
            
                                  <div class="form-group col-6">
                                    <label for="exampleInput">Roll No. : </label>
                                    <input type="roll no." name="roll_no" class="form-control"  placeholder="Registration No.">
                                  </div>
                                </div>
        
                      <div class="form-group row">
                          <div class="form-group col-6">
                              <label for="exampleInput">Email : </label>
                              <input type="email" name="email" class="form-control" id="exampleInputemail" placeholder="Email">
                            </div>

                            <div class="form-group col-6">
                              <label for="inputdepartment6">Department:</label>
                              <select class="form-select" name="department" aria-label=".form-select-sm example">
                                <option>Choose Department</option>
                                <option value="CSE">Computer Science and Engineering</option>
                                <option value="EEE">Electrical and Electronics Engineering</option>
                                <option value="AE">Architecture Engineering</option>
                                </select>
                              </div>
                        </div>
                          

                        <div class="form-group row">
                              <div class="form-group col-6">
                                  <label for="exampleInput">Father's Name : </label>
                                  <input type="text" name="father_name" class="form-control" placeholder="Father's Name">
                                </div>
          
                                <div class="form-group col-6">
                                  <label for="exampleInput">Mother's Name : </label>
                                  <input type="text" name="mother_name" class="form-control"  placeholder="Mother's Name">
                                </div>
                        </div>

                          <div class="form-group col-md-12 ">
                              <label for="specify">Address</label>
                              <textarea class="form-control" name="address" id="specify" name="" placeholder="Address"></textarea>
                          </div>

                          <div class="form-group row">
                              <div class="form-group col-6">
                                  <label for="exampleInput">Mobile No :</label>
                                  <input type="number" name="mobile_no" class="form-control" id="exampleInputmobile" placeholder="Mobile No.">
                                </div>
          
                          <div class="form-group col-6">
                                  <label for="exampleInput">Guardian's Name</label>
                                  <input type="text" name="guardian_name" class="form-control" id="exampleInputguardian" placeholder="Guardian's Name">
                                </div>
                          </div>

                          <div class="form-group row">
                                  <div class="form-group col-6">
                                      <label for="exampleInput">Password : </label>
                                      <input type="text" name="password" class="form-control" id="exampleInputpassword" placeholder="Password">
                                  </div>
                                  <div class="form-group col-6">
                                  <label for="exampleInput">Confirm Password : </label>
                                  <input type="password" name="confirm_password" class="form-control" id="exampleInputconfirmpassword" placeholder="Condfirm Password">
                                  </div>
                            </div>
                              <label for="exampleFormControlFile1">Choose Photo : </label>
                                  <div class="form-group">
                                    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                                  </div>
                            </div> 
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <div class="form-group mt-2">
                          <div class="col-md-12">
                              <button type="submit" name="register" class="btn btn-primary" onclick="return validateForm();">
                                  Register
                              </button>
                          </div>
                      </div>
                  </div>
      </form>
              </div>
            </div>
            </div>
</section>   
<script>
function validateForm() {
try
{
  eml = document.getElementById('exampleInputemail').value;
  
  password = document.getElementById('exampleInputpassword').value;

  if(eml==null || eml=="" || password== null || password=="")
  {
    alert("All fields must be filled out");
    return false;
  }

  if(eml.indexOf('@')== -1)
  {
    alert("Invalid Email address");
    return false;
  }
  return true;
}
catch(e)
{
  return false;
}
return false;
}
</script>

    <script src="../bootstrap/dist/js/bootstrap.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>