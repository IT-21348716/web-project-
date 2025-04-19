<?php
include "config.php";

if (isset($_POST["submit"])) {
    $Username= $_POST['username'];
    $Email= $_POST['email'];
    $Password = $_POST['password'];
    $Con_Password = $_POST['confirmpassword'];
    $Address = $_POST['address'];
    $NIC = $_POST['NIC'];
    $Tel_Number = $_POST['telnumber'];
    $Course = $_POST['course'];


    $sql = "INSERT INTO `user` (`Id`, `Username`,`Email`,`Password`, `Con_Password`,`Address`,`NIC`,`Tel_Number`,`Course`) VALUES (NULL, '$Username','$Email','$Password','$Con_Password','$Address','$NIC','$Tel_Number','$Course')";

   $result = mysqli_query($con, $sql);

   if ($result) {
      header("Location: home.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($con);
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <title>PHP CRUD Application</title>
</head>

<body>
  

   <div class="container">
      <div class="text-center mb-4">
      <br> <br>
         <h3>Add New User</h3>
         <p class="text-muted">Complete the form below to add a new user</p>
      </div>

      <div class="container d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="mb-3">
                  <label class="form-label">Username:</label>
                  <input type="text" class="form-control" name="username" placeholder="">
               </div>

               <div class="mb-3">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Password:</label>
               <input type="password" class="form-control" name="password" placeholder="">
            </div>


            <div class="mb-3">
               <label class="form-label">Confirm Password:</label>
               <input type="password" class="form-control" name="confirmpassword" placeholder="">
            </div>

            
            <div class="mb-3">
               <label class="form-label">Address:</label>
               <input type="text" class="form-control" name="address" placeholder="">
            </div>

            
            <div class="mb-3">
               <label class="form-label">NIC:</label>
               <input type="text" class="form-control" name="NIC" placeholder="">
            </div>

            
            <div class="mb-3">
               <label class="form-label">Tel_Number:</label>
               <input type="int" class="form-control" name="telnumber" placeholder="">
            </div>

            
            <div class="mb-3">
               <label class="form-label">Course:</label>
               <input type="text" class="form-control" name="course" placeholder="">
            </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="login.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>