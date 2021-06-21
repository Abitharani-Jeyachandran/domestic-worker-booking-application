<?php
session_start();
//Database Configuration File
include('includes/config.php');
error_reporting(0);

$sql = "DELETE FROM `tblapplyjob` WHERE `ID`=:id";
$query = $dbh -> prepare($sql);
$query -> bindParam(':id', $id, PDO::PARAM_INT);
$id = 7;

$query -> execute();
if($query -> rowCount() > 0)
{
$count = $query -> rowCount();
echo $count . "Cancelled";
}
else
{
echo "Try again";
}
?>
