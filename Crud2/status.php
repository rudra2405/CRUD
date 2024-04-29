<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud2";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$update = $_POST['update_id'];
$status = $_POST['status_id'];
$sql = " UPDATE `student` SET `status` = $status  WHERE ID = $update ";
$result = mysqli_query($conn, $sql);

if ($result) {
    if ($_POST['status_id'] == 1) {
        echo "Crongrats Your Status Has Been Activated";
    } elseif ($_POST['status_id'] == 0) {
        echo "Crongrats Your Status Has Been InActive";
    } else {
        echo "Somethings Went Wrong";
    }
} else {
    echo "Error";
}
?>