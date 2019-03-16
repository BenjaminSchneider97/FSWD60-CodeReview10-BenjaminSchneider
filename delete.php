<?php 

require_once 'db_connection.php';

if($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM `media` WHERE media_id = {$id}";
   $result = $mysqli->query($sql);

   $row = $result->fetch_array();

}

if(isset($_POST['delete'])) {

   $sql = "DELETE FROM `media` WHERE media_id = {$id}";
   if($mysqli->query($sql) === TRUE) {
      header("Location: a_delete.php");
   } else {
       echo "Error while updating record : ". $mysqli->error;
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Delete Record</title>
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
      <a class="mainpageback" href="index.php"><i class="fas fa-arrow-left"></i>Back to main page</a>
      <hr>
      <form method="POST" accept-charset="utf-8">
         <h2>Are you sure you want to delete "<?php echo $row['mediaTitle'] ?>"? </h2>
         <input class="btn btn-danger" type="submit" name="delete" value="Delete">
         <?php echo "<a href='mediainfo.php?id=". $row['media_id']. "'><button class='btn btn-primary' type='button'>No go back</button></a>" ?>
      </form>
   </div>
   <div class="footer">
      <p>Benjamin Schneider - CodeFactory 2019</p>
   </div>
</body>
</html>