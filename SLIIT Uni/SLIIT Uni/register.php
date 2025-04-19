<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
        <?php 
            include("config.php");
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmpassword = $_POST['confirmpassword'];
                $address = $_POST['address'];
                $NIC = $_POST['NIC'];
                $telnumber = $_POST['telnumber'];
                $course = $_POST['course'];

                // Check if email already exists
                $verify_query = mysqli_query($con, "SELECT Email FROM user WHERE Email='$email'");
                if(mysqli_num_rows($verify_query) != 0){
                    echo "<div class='message'>
                            <p>This email is already in use, please try another one!</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                } else {
                    // Insert user data into the database
                    $query = "INSERT INTO user (Username, Email, Password, Con_Password, Address, NIC, Tel_Number, Course) VALUES ('$username', '$email', '$password', '$confirmpassword', '$address', '$NIC', '$telnumber', '$course')";
                    mysqli_query($con, $query);

                    echo "<div class='message'>
                            <p>Registration successful!</p>
                          </div> <br>";
                    echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
                }
            } else {
        ?>


            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" name="confirmpassword" id="confirmpasswor" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="NIC">NIC</label>
                    <input type="text" name="NIC" id="NIC" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="telnumber">Tel_Number</label>
                    <input type="number" name="telnumber" id="telnumber" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="course">Course</label>
                    <input type="text" name="course" id="course" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">login</a>
                </div>
             </form>
          </div>
          <?php } ?>
        </div>
   </body>
 </html>