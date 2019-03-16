<?php 

  require_once 'db_connection.php';

  $emailError="";
  $userFirstName = "";
  $userLastName = "";
  $userEmail = "";

  if(isset($_POST["register"])){
  	$userFirstName = trim($_POST['userFirstName']);
    $userLastName = trim($_POST['userLastName']);
  	$userEmail = trim($_POST["userEmail"]);
  	$userPassword = trim($_POST["userPassword"]);
  	$error = false;
  	$userPass = hash('sha256', $userPassword);

  	$query = "SELECT userEmail FROM `users` WHERE userEmail='$email'";
  	$result = mysqli_query($mysqli, $query);
  	$count = mysqli_num_rows($result);

  	if($count!=0){
  	  $error = true;
  	  $emailError = "Provided Email is already in use.";
  	}

  	if(!$error){
  	$sql = "INSERT INTO `users` (userFirstName, userLastName, userEmail, userPassword) VALUES ('$userFirstName', '$userLastName', '$userEmail', '$userPass')";
  	header("Location: a_register.php");

  	if($mysqli->query($sql) === FALSE){
  		echo "Error signing up". $mysqli->connect_error;
  		}
  	}
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<style>
		form{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			display: flex;
			flex-direction: column;
			width: 25%;
		}
		input{
			margin: 15px 0;
			height: 50px;
		}
	</style>
</head>
<body>
	<a href="login_screen.php">Back to the login</a>
	<form action="register.php" method="post" accept-charset="utf-8">
		<input type="text" name="userFirstName" maxlength="55" placeholder="Enter First Name" value="<?= $userFirstName ?>" required>
		<input type="text" name="userLastName" maxlength="55" placeholder="Enter last Name" value="<?= $userLastName ?>" required>
		<input type="text" name="userEmail" maxlength="100" placeholder="Enter Email" value="<?= $userEmail ?>" required>
		<span><?php echo $emailError; ?></span>
		<input type="password" name="userPassword" maxlength="25" placeholder="Enter Password" required>
		<a href="a_register.php"><input type="submit" name="register" value="Sign Up"></a>
	</form>
</body>
</html>