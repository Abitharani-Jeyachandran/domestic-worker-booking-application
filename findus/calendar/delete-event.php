<?php
require_once "db.php";
if(strlen($_SESSION['emplogin'])==0)
  {
header('location:../emp-login.php');
}
else{
$id = $_POST['id'];
$sqlDelete = "DELETE from tbl_events WHERE id=".$id;

mysqli_query($conn, $sqlDelete);
echo mysqli_affected_rows($conn);

mysqli_close($conn);
}
?>
