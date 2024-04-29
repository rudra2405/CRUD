<?php
//  error_reporting(1);
include 'connection.php';
if (isset($_POST['submit'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $City = $_POST['City'];
    $MobileNo = $_POST['MobileNo'];
    $Hobbies = isset($_POST['Hobbies']) ? implode(',', $_POST['Hobbies']) : "";
    $Address = $_POST['Address'];
    $Gender = $_POST['Gender'];
    $dob = $_POST['dob'];
    // ------------------image upload -------------------------/
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
     move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);  
     
    $sql = "INSERT INTO `student`(`FirstName`, `LastName`, `Email`, `Image`, `City`, `MobileNo`, `Hobbies`, `Address`, `Gender` , `dob`) VALUES ('$FirstName','$LastName','$Email','$target_file','$City','$MobileNo','$Hobbies','$Address','$Gender','$dob')";
    $data = mysqli_query($conn, $sql);
    if ($data) {
        echo header("location:index.php?msg = data inserted");
    } else {
        echo "data not inserted";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <form action="" method="post" class="rounded shadow p-5" enctype="multipart/form-data">
            <h1 class="mb-3 text-center" style="color:red;">Student form</h1>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-2"><b>Enter First Name:</b></label>
                <input type="text" name="FirstName" class="form-control" id="" placeholder="Enter First Name">
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-2"><b>Enter Last Name:</b></label>
                <input type="text" name="LastName" class="form-control" id="" placeholder="Enter last name">
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-2"><b>Enter Email:</b></label>
                <input type="Email" name="Email" class="form-control" id="" placeholder="Enter Email">
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-4"><b>Enter Image:</b></label>
                <input type="file" name="image" id="">
            </div>

            <label for="form-label" class="form-label mt-4"><b>Select city:</b></label>
            <select id="" name="City" class="form-select">
                <option value="">------Select City---------</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Ahmedabad">Ahemdabad</option>
                <option value="Surat">Surat</option>
            </select>

            <label for="form-label" class="form-label mt-4"><b>Select Your Hobbies:</b></label><br>
            <input type="checkbox" id="" name="Hobbies[]" value="Cricket">
            <label for="">Cricket</label><br>
            <input type="checkbox" id="" name="Hobbies[]" value="Singing">
            <label for="">Singing</label><br>
            <input type="checkbox" id="" name="Hobbies[]" value="Reading">
            <label for="">Reading</label>

            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-4"><b>Enter MobileNo.</b></label>
                <input type="text" name="MobileNo" class="form-control" id="" placeholder="Enter MobileNo">
            </div>
            <div class="col-sm-12 mt-5">
                <label for="form-label" class="form-label"><b>Enter Address:</b></label>
                <textarea name="Address" rows="5" cols="50"></textarea>
            </div>
            <div class="col-sm-12">
                <label for="form-label" class="form-label mt-4 me-2"><b>Gender:</b></label>
                <input type="radio" name="Gender" class="ms-2" id="" value="male"> Male
                <input type="radio" name="Gender" class="ms-2" id="" value="female"> Female
            </div>
            <div class="col-sm-12 mt-5">
                <label for="form-label" class="form-label"><b>Date Of Birth:</b></label>
                <input type="date" name="dob" class="form-control" id="">
            </div>
            <input type="submit" name="submit" class="mt-3 btn btn-info">
            <a href="index.php" class="btn btn-danger mt-3">Cancel</a>
        </form>
    </div>
</body>
</html>