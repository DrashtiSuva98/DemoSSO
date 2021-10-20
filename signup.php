<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('config.php');
	session_start();
    if (isset($_REQUEST['submit'])) {
     
		$username=$_POST["username"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$qry="insert into user(username,email,password) values('$username','$email','" . md5($password) . "')";
		$res=mysqli_query($conn,$qry);
		//echo $res;
		if($res)
		{
			$msg="You are registered successfully.";
			echo "<script type='text/javascript'>alert('$msg');</script>";
			$_SESSION['email']= $email;
			echo "<script>window.location='dashboard.php';</script>";
		}
		else
		{
			$errormsg="Something went wrong,Try Agian";
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
			echo "<script>window.location='signup.php';</script>";
			
		}
    } else {
?>
    <form class="form" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="index.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>