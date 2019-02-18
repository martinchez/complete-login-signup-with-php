<?php
include("config.php");
include("header.php");
include("function.php");
$msg='';$msg2='';$email='';
if (isset($_POST['SUBMIT'])) 
{
	$email=$_POST['mail'];
	$password=$_POST['pass'];
	if (empty($email))
	 {
		$msg='<div class"error">Please enter your email</div>' ; 
	 }
	else if (empty($password))
	 {
		$msg2='<div class"error">Please enter your password</div>' ; 
	
	 }
	else if(email_exist($email,$con))
	 {
	 	 $pass=mysqli_query($con,"SELECT password FROM users WHERE mail='$mail'");
	 	 $pass_w=mysqli_fetch_arry($pass);
	 	 $dpass=$pass_w['password'];
	 	  if ($password!==$dpass) {
	 	  	 $msg2='<div class"error">Incorrect pasword</div>' ;
	 	  }else{
	 	  	header("location:profile.php");
	 	  }
	 }
	else
	 {
	 		$msg='<div class"error">Emaildoese not exist</div>' ; 
	 }
}
?>

<html>
<head>
<title>Sign up Page</title>
<style type="text/css">
	.error{
		color: red;
	}
	#body-bg{
		background: url("1.jpg") centre no-repeat fixed;
	}
</style>
</head>
<body id="body-bg">
	<div class="container">
		<div class="login-form col-md-4 offset-md-4">
		<div class="jumbotron" style="margin-top: 50px;padding-top: 20px;padding-bottom: 10px">
			<h2 align="center">Login Form</h2>
			<form method="post">
				
					<label >Email :</label>
				<div class="form-group">
					<input type="email" name="mail" class="form-control">
					<?php echo $msg; ?>
				</div>

				<div class="form-group">

					<label >Password :</label>
					<input type="password" name="pass" class="form-control" value="<?php echo $email; ?>">
					<?php echo $msg2; ?>
				</div>
				<div class="form-control">
					<input type="checkbox" name="check">
					&nbsp; keep me logged in
				</div>
				<div class="form-control">
					<input type="submit" name="submit" value="Login" class="btn-submit">
				</div>
				
			</form>
			
		</div>		
		</div>
	</div>

</body>
</html>