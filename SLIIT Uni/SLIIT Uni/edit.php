<?php
include "config.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $Username= $_POST['username'];
  $Email= $_POST['email'];
  $Password = $_POST['password'];
  $Con_Password = $_POST['confirmpassword'];
  $Address = $_POST['address'];
  $NIC = $_POST['NIC'];
  $Tel_Number = $_POST['telnumber'];
  $Course = $_POST['course'];
  
  $stmt = $con->prepare("UPDATE `user` SET `Username`=?, `Email`=?, `Password`=?, `Con_Password`=?, `Address`=?, `NIC`=?, `Tel_Number`=?, `Course`=? WHERE `Id`=?");
  $stmt->bind_param("ssssssssi", $Username, $Email, $Password, $Con_Password, $Address, $NIC, $Tel_Number, $Course, $id);

  if ($stmt->execute()) {
    header("Location: home.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . $stmt->error;
  }
  $stmt->close();
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

  
</head>

<body>


  <div class="container">
    <div class="text-center mb-4">
      <br> <br>
      <h3>Edit User Information</h3>
      <p class="text-muted">Click update after changing any information</p>
    </div>
    <?php
  
      $sql = "SELECT `Username`, `Email`, `Password`, `Con_Password`, `Address`, `NIC`, `Tel_Number`, `Course` FROM `user` WHERE `Id` = ?";
      $stmt = $con->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      $stmt->close();
    ?>

   

    <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width:50vw; min-width:300px;">
        <div class="row mb-3">
        <div class="mb-3">
                  <label class="form-label">Username:</label>
                  <input type="text" class="form-control" name="username" placeholder=""  value="<?php echo $row['Username']; ?>">
               </div>

               <div class="mb-3">
                  <label class="form-label">Email:</label>
                  <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $row['Email']; ?>">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">Password:</label>
               <input type="password" class="form-control" name="password" placeholder="" value="<?php echo $row['Password']; ?>" >
            </div>


            <div class="mb-3">
               <label class="form-label">Confirm Password:</label>
               <input type="password" class="form-control" name="confirmpassword" placeholder=""value="<?php echo $row['Con_Password']; ?>">
                </div>

            
            <div class="mb-3">
               <label class="form-label">Address:</label>
               <input type="text" class="form-control" name="address" placeholder="" value="<?php echo $row['Address']; ?>">
            </div>

              
            <div class="mb-3">
               <label class="form-label">NIC:</label>
               <input type="text" class="form-control" name="NIC" placeholder="" value="<?php echo $row['NIC']; ?>">
            </div>

            
            <div class="mb-3">
               <label class="form-label">Tel_Number:</label>
               <input type="number" class="form-control" name="telnumber" placeholder="" value="<?php echo $row['Tel_Number']; ?>">
            </div>

            <div class="mb-3">
               <label class="form-label">Course:</label>
               <input type="text" class="form-control" name="course" placeholder=""  value="<?php echo $row['Course']; ?>">
            </div>

        <div>
          <button type="submit" class="btn btn-success" name="submit">Update</button>
          <a href="home.php" class="btn btn-danger">Cancel</a>
        </div>

      </form>
    </div>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>