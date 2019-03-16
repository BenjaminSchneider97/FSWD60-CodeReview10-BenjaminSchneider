<?php 

	require_once 'db_connection.php';

	if($_GET['id']) {
		$id = $_GET['id'];

		$sql = "SELECT * FROM `media` WHERE media_id = {$id}";
		$result = $mysqli->query($sql);

		$row = $result->fetch_array();

	}

	if(isset($_POST['update'])) {
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$price = $_POST['price'];
		$author = $_POST['author'];
		$publisher = $_POST['publisher'];

		$title = trim($_POST['title']);
		$desc = trim($_POST['desc']);
		$author = trim($_POST['author']);

		$sql = "UPDATE `media` SET mediaTitle = '$title', mediaDesc = '$desc', mediaPrice = '$price', fk_author_id = '$author', fk_publisher_id = '$publisher' WHERE media_id = {$id}";
		if($mysqli->query($sql) === TRUE) {
			header("Location: a_update.php");
		} else {
			echo "Error while updating record: ". $mysqli->error;
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<p>The big library</p>
	</div>
	<div class="container">
		<div class="heading">
			<h1>Edit "<?php echo $row["mediaTitle"] ?>"</h1>
		</div>
		<a class="mainpageback" href="index.php"><i class="fas fa-arrow-left"></i>Back to main page</a>
		<hr>
		<form method="POST" accept-charset="utf-8">
			<p>Title</p>
			<input type="text" name="title" value=" <?php echo $row["mediaTitle"] ?> ">
			<p>Author</p>
			<select name="author">
				<?php 

				$sql = mysqli_query($mysqli, "SELECT * FROM `author`");

				while($rowAuthor = mysqli_fetch_assoc($sql)){
					echo "<option id=". $rowAuthor["author_id"]. ">". $rowAuthor["author_id"]. ")  ". $rowAuthor["authorFirstName"]. " ". $rowAuthor["authorSurName"]. "</option>";
				}
				?>
			</select>
			<p>Price</p>
			<input class="price" type="text" name="price" value =" <?php echo $row["mediaPrice"] ?>"> €
			<p>Description</p>
			<textarea name="desc"> <?php echo $row["mediaDesc"] ?></textarea>
			<p>Publisher</p>
			<select name="publisher">
				<?php

				$sql = mysqli_query($mysqli, "SELECT * FROM `publisher`");

				while($rowPublisher = mysqli_fetch_assoc($sql)){
					echo "<option id=". $rowPublisher["publisher_id"]. ">". $rowPublisher["publisher_id"]. ")  ". $rowPublisher["publisherName"]. "</option>";
				}

				?>

			</select>
			<p></p>
			<input class="btn btn-success" type="submit" name="update" value="UPDATE">
		</form>
	 	</div>
 	<div class="footer">
 		<p>Benjamin Schneider - CodeFactory 2019</p>
 	</div>
</body>
</html>