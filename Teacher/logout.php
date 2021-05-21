<?php
    session_start();
    unset($_SESSION["emai"]); 
    header("location: ../index.html");
?>