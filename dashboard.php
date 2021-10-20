<?php
require('config.php');
session_start();
if(isset($_SESSION['email']))
{
	$result = mysqli_query($conn,"select username from user where email='$_SESSION[email]'");
	$unm= mysqli_fetch_assoc($result);
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body style="background:#E5E6E8">
    <div class="form"  style="background:#ECECEC; border: 1px solid #000000;"> 
        <p>Hey, <?php echo $unm['username']; ?>!</p>
        <p>You are in user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>

<?php
}else{
	header("Location: index.php");
    exit();
}
?>