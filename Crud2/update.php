<?php
include 'connection.php';
// echo "";print_r($_FILES);
$ID = $_GET['ID'];
if (isset($_POST['submit'])){
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $City = $_POST['City'];
    $MobileNo = $_POST['MobileNo'];
    // $Hobbies = $_POST['Hobbies'];
    $Hobbies = isset($_POST['Hobbies']) ? implode(',', $_POST['Hobbies']) : "";
    $Address = $_POST['Address'];
    $Gender = $_POST['Gender'];
    $dob = $_POST['dob'];
    $status = $_POST['status'];

    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);  

    $sql = "UPDATE `student` SET `FirstName`='$FirstName',`LastName`='$LastName',`Email`='$Email',`Image`='$target_file',`City`='$City',`MobileNo`='$MobileNo',`Hobbies`= '$Hobbies',`Address`='$Address',`Gender`='$Gender',`dob`='$dob',`status`='$status' where ID = '$ID'";
    $data = mysqli_query($conn, $sql);
    if ($data) {
        echo header("location:index.php?msg = data updated");
    } else {
        echo "not updated";
    }
}
$sql = "SELECT  * FROM `student` where ID = '$ID'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$checkbox_array = explode(",", $data['Hobbies']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <form action="" method="post" class="rounded shadow p-5" enctype="multipart/form-data">
            <!-- <input type="hidden" name="update_id" value="<?php echo $data['id'] ?>"/> -->
            <h1 class="mb-3" style="color:red;">Student form</h1>
            <div class="col-sm-12"> 
                <label for="form-label" class="form-label mt-2"><b>Enter First Name:</b></label>
                <input type="text" name="FirstName" class="form-control " id="" placeholder="Enter First Name"
                    value="<?php echo $data['FirstName'] ?>">
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-2"><b>Enter Last Name</b></label>
                <input type="text" name="LastName" class="form-control" id="" placeholder="Enter last name"
                    value="<?php echo $data['LastName'] ?>">
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-2"><b>Enter Email:</b></label>
                <input type="Email" name="Email" class="form-control" id="" placeholder="Enter Email"
                    value="<?php echo $data['Email'] ?>">
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-4"><b>Enter Image</b></label>
                <input type="file" name="image" id="" class="form-control" value="">
                <img src="<?php echo $data['Image'] ?>" style="width:100px;height:100px;">
            </div>

            <label for="form-label" class="form-label mt-4"><b>Select City</b></label>
            <select id="" name="City" class="form-select">
                <option value="">-----Select City-----</option>
                <option value="Rajkot" <?php if($data['City'] == 'Rajkot') echo "Selected";?>>Rajkot</option>
                <option value="Ahmedabad" <?php if($data['City'] == 'Ahmedabad') echo "Selected";?>>Ahemdabad</option>
                <option value="Surat" <?php if($data['City'] == 'Surat') echo "Selected";?>>Surat</option>
            </select>

            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-4"><b>E3nter Mobile no:</b></label>
                <input type="text" name="MobileNo" class="form-control" id="" placeholder="Enter MobileNo."
                    value="<?php echo $data['MobileNo'] ?>">
            </div>

            <label for="form-label" class="form-label mt-4"><b>Select Your Hobbies:</b></label><br>
            <input type="checkbox" id="" name="Hobbies[]" value="Cricket"<?php if(in_array("Cricket", $checkbox_array)){ echo " checked=\"checked\""; } ?> />
            <label for="">Cricket</label><br>
            <input type="checkbox" id="" name="Hobbies[]" value="Singing"<?php if(in_array("Singing", $checkbox_array)){ echo " checked=\"checked\""; } ?> />
            <label for="">Singing</label><br>
            <input type="checkbox" id="" name="Hobbies[]" value="Reading"<?php if(in_array("Reading", $checkbox_array)){ echo " checked=\"checked\""; } ?> />
            <label for="">Reading</label>

            <div class="col-sm-12 mt-5">
                <label for="form-label" class="form-label"><b>Enter Address:</b></label>
                <textarea name="Address" rows="5" cols="50"><?php echo $data['Address'] ?></textarea>
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-4 me-2"><b>Gender:</b></label>
                <input type="radio" name="Gender" class="ms-2" id="" value="male" <?php if($data['Gender'] == 'male') echo "checked";?>> Male
                <input type="radio" name="Gender" class="ms-2" id="" value="female" <?php if($data['Gender'] == 'female') echo "checked";?>> Female
            </div>
            <div class="col-sm-12 mt-5">
                <label for="form-label" class="form-label"><b>Date Of Birth:</b></label>
                <input type="date" name="dob" value="<?php echo $data['dob'] ?>"class="form-control" id="">
            </div>
            <div class="col-sm-12 mt-5">
                <label for="form-label" class="form-label"><b>Status</b></label>
                <input type="text" name="status" value="<?php echo $data['status'] ?>"class="form-control" id="">
            </div>
            <input type="submit" name="submit" class="mt-3 btn btn-info">
            <a href="index.php" class="btn btn-danger mt-3">Cancel</a>
        </form>
    </div>
</body>
</html>