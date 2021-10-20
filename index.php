<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('config.php');
    session_start();
    if (isset($_POST['submit'])) {
		if(!$result = mysqli_query($conn,"select * from user where email='$_POST[email]' and password='". md5($_POST['password'])."'"))
			echo mysqli_error();
		
		if(!mysqli_num_rows($result)>0){
			$errormsg="Incorrect Username/password.";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
		echo "<script>window.location='index.php';</script>";
       	}
		else
		{
				$_SESSION['email']=$_POST['email'];
				 header("Location: dashboard.php");
		}
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="email" placeholder="Email" autofocus="true" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have account? <a href="signup.php">Create Now</a></p>
  </form>
<?php
    }
?>
</body>
</html>