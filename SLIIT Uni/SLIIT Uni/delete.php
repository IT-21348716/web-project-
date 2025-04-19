<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `user` WHERE Id= $id";
$result = mysqli_query($con, $sql);

if ($result) {
  header("Location: home.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($con);
}