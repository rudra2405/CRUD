<?php
include 'connection.php';

$ID = $_GET['ID'];
$sql = "DELETE FROM `student` WHERE ID = '$ID'";
$result = mysqli_query($conn, $sql);

if ($result) {
	echo header("location:index.php?msg=record deleted successfully");
} 
else {
    echo "error";
}
?>