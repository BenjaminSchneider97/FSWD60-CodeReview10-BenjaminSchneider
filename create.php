<?php

	ob_start();
	session_start();

	require_once 'db_connection.php';

	if (isset($_SESSION['user'])){
	$res=mysqli_query($mysqli, "SELECT * FROM `users` WHERE user_id=". $_SESSION['user']. "");
	$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
	}	

	if(isset($_POST['create'])){
		$title = $_POST['title'];
		$img = $_POST['img'];
		$type = $_POST['type'];
		$publisher = $_POST['publisher'];
		$author = $_POST['author'];
		$isbn = $_POST['isbn'];
		$desc = $_POST['desc'];
		$price = $_POST['price'];
		$status = $_POST['status'];
		$library = $_POST['library'];

		$sql = "INSERT INTO `media`(`mediaTitle`, `mediaImage`, `mediaISBN`, `mediaDesc`, `mediaPrice`, `mediaStatus`, `fk_library_id`, `fk_type_id`, `fk_author_id`, `fk_publisher_id`) VALUES ('$title', '$img', '$isbn', '$desc', '$price', $status, '$library', '$type', '$author', '$publisher');";

		if($mysqli->query($sql) === TRUE) {
		   header("Location: a_create.php");
		} else {
		    echo "Error while updating record : ". $mysqli->error;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create new Entry</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		textarea{
			width: 500px;
			height: 200px;
		}
	</style>
</head>
<body>
	<div class="navbar">
		<p>The big library</p>
		<span class="navbar-login">
			<a href="login.php" title="Zum Login">
			<?php
				if (isset($_SESSION['user'])) {
					$displayName = $userRow['userFirstName']. " ". $userRow['userLastName'];
					echo '<i class="fas fa-sign-out-alt"></i> '.$displayName;
				}
				else {
					echo '<i class="fas fa-sign-in-alt"></i> Login';
				}
			?>
			</a>
		</span>
	</div>
	<div class="container">
		<div class="heading">
			<h1>Create a new record</h1>
		</div>
		<a class="mainpageback" href="index.php"><i class="fas fa-arrow-left"></i>Back to main page</a>
		<hr>
		<form method="POST" accept-charset="utf-8">
			<p>Title</p>
			<input type="text" name="title" maxlength="150" required>
			<p>Media Image (url)</p>
			<input type="text" name="img" maxlength="500" required>
			<p>Type</p>
			<select name="type">
				<?php
				$sql = mysqli_query($mysqli, "SELECT * FROM `type`");

				while($rowType = mysqli_fetch_assoc($sql)){
					echo "<option id=". $rowType["type_id"]. ">". $rowType["type_id"]. ")  ". $rowType["typeName"]. "</option>";
				}
				?>
			</select>
			<p>Publisher</p>
			<select name="publisher">
				<?php

				$sql = mysqli_query($mysqli, "SELECT * FROM `publisher`");

				while($rowPublisher = mysqli_fetch_assoc($sql)){
					echo "<option id=". $rowPublisher["publisher_id"]. ">". $rowPublisher["publisher_id"]. ")  ". $rowPublisher["publisherName"]. "</option>";
				}

				?>

			</select>
			<p>Author</p>
			<select name="author">
				<?php 
				$sql = mysqli_query($mysqli, "SELECT * FROM `author`");
				while($rowAuthor = mysqli_fetch_assoc($sql)){
					echo "<option id=". $rowAuthor["author_id"]. ">". $rowAuthor["author_id"]. ")  ". $rowAuthor["authorFirstName"]. " ". $rowAuthor["authorSurName"]. "</option>";
				}
				?>
			</select>
			<p>ISBN (If not a book insert 0)</p>
			<input type="text" name="isbn" maxlength="25" required>
			<p>Description</p>
			<textarea name="desc" maxlength="500" required></textarea>
			<p>Price</p>
			<input class="price" type="text" name="price" required>€
			<p>Status</p>
			<select name="status">
				<option value="0">0) Not available</option>
				<option value="1">1) Available</option>
			</select>
			<p>Library</p>
			<select name="library">
				<?php 
				$sql = mysqli_query($mysqli, "SELECT * FROM `library`");
				while($rowLibrary = mysqli_fetch_assoc($sql)){
					echo "<option id=". $rowLibrary["library_id"]. ">". $rowLibrary["library_id"]. ")  ". $rowLibrary["libraryName"]. "</option>";
				}
				?>
			</select>
			<p></p>
			<input class="btn btn-success" type="submit" name="create" value="CREATE">
		</form>
	</div>
	 <div class="footer">
		<p>Benjamin Schneider - CodeFactory 2019</p>
	</div>
</body>
</html>