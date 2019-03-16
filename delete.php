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
   <title>Delte Record</title>
</head>
<body>

   <form method="POST" accept-charset="utf-8">
      <p>Are you sure you want to delete "<?php echo $row['mediaTitle'] ?>"? </p>
      <input type="submit" name="delete" value="Delete">
      <a href='index.php' title='Main Page'><button>Main Page</button></a>
   </form>
   
</body>
</html>