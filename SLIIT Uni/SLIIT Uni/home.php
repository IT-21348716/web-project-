
<?php
include "config.php";
session_start();
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

  
<br> <br>
  <div class="container">
  <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    }
    ?>

   
    <a href="addNew.php" class="btn btn-dark mb-3">Add New</a> 
    <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
    <?php echo htmlspecialchars($_SESSION["username"]); ?>
    
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Password</th>
          <th scope="col">Con_Password</th>
          <th scope="col">Address</th>
          <th scope="col">NIC</th>
          <th scope="col">Tel_Number</th>
          <th scope="col">Course</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
      <?php
        $sql = "SELECT * FROM `user`";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
                    <tr>
              <td><?php echo $row["Id"] ?></td>
              <td><?php echo $row["Username"] ?></td>
              <td><?php echo $row["Email"] ?></td>
              <td><?php echo $row["Password"] ?></td>
              <td><?php echo $row["Con_Password"] ?></td>
              <td><?php echo $row["Address"] ?></td>
              <td><?php echo $row["NIC"] ?></td>
              <td><?php echo $row["Tel_Number"] ?></td>
              <td><?php echo $row["Course"] ?></td>
          
              <td>
                <a href="edit.php?id=<?php echo $row["Id"] ?>" class="btn btn-success me-3"><i class="fa-solid fa-pen-to-square "></i></a>
                <a href="delete.php?id=<?php echo $row["Id"] ?>" class="btn btn-danger me-3"><i class="fa-solid fa-trash"></i></a>
              </td>
            </tr>
        <?php
          }
        } else {
          echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
     
       </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
