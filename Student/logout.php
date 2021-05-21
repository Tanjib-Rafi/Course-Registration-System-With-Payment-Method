<?php
    session_start();
    if(isset($_SESSION['roll_no']))
    {
    unset($_SESSION["roll_no"]); 
    
    }
    header("location: ../index.html");
?>
