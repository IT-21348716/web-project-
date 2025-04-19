<?php
include("database.php");
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
   exit;
}
   if(session_destroy()) {
      header("Location: login.php");
   }
?>