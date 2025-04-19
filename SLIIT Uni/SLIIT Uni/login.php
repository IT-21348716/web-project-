<?php 
   include("config.php");
   session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username=$_POST['username'];
	$password=$_POST['password'];
		$username = stripslashes($username);
		$password = stripslashes($password);
	function isLoggedIn()
    {
        if($_SESSION['loggedin'])
        {
            return true;
        }
        else return false;
    }
	$sql="SELECT * FROM user WHERE Email  ='$username' AND Password='$password'";

	$result=mysqli_query($con,$sql);

	if (!mysqli_fetch_assoc($result))
		{

			$error ='Invalid Username or Password';
		
		}


else { 
session_regenerate_id();
$_SESSION['loggedin'] = true;
$_SESSION['username']=$username;
header("location: home.php");
}
function logout()
    {
        unset($_SESSION['loggedin']);
        unset($_SESSION['Username']);
        session_destroy();
        header('location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
   <div class="container">
     <div class="box form-box">

   
    <header>Welcome to SLIIT university!</header>
       <form  method="POST">
          <div class="field input">
            <label for="email">Email</label>
            <input type="username" name="username"  autocomplete="off" required>
          </div>

          <div class="field input">
            <label for="password">Password</label>
            <input type="password" name="password"  autocomplete="off" required>
          </div>

          <div class="field">
            
            <input type="submit" class="btn" name="submit" value="Login"  id="submit" required>
          </div>

           <div class="links">
            Don't have account? <a href="register.php"> Register Now </a>
          </div>
       
        </form>
     </div>
    </div>
</body>
</html>    