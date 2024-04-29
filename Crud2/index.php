<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <style>
        .rudra {
            margin: 0 auto;
            text-align: center;
        }
        .Rudra{
            overflow-x:scroll;
        }
    </style>
</head>
<body>
    <h2 class="bg-warning" style="text-align:center;">Student Details</h2>
    <br><br>
    <div class="rudra">
        <a href="insert.php" class="btn btn-primary">Add_Students</a>
    </div>
    <div class="Rudra d-flex justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped table-bordered table-hover">
                <tr class="text-center">
                    <th class="bg-black text-white">ID</th>
                    <th class="bg-black text-white">FirstName</th>
                    <th class="bg-black text-white">LastName</th>
                    <th class="bg-black text-white">Email</th>
                    <th class="bg-black text-white">Image</th>
                    <th class="bg-black text-white">City</th>
                    <th class="bg-black text-white">MobileNo</th>
                    <th class="bg-black text-white">Hobbies</th>
                    <th class="bg-black text-white">Address</th>
                    <th class="bg-black text-white">Gender</th>
                    <th class="bg-black text-white">Dob</th>
                    <th class="bg-black text-white">status</th>
                    <th colspan="2" class="bg-black text-white">Action</th>
                </tr>
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM `student` order by `ID`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    // print_r($row);die;
                    ?>
                    <tr>
                        <td>
                            <?php echo $row['ID'] ?>
                        </td>
                        <td>
                            <?php echo $row['FirstName'] ?>
                        </td>
                        <td>
                            <?php echo $row['LastName'] ?>
                        </td>
                        <td>
                            <?php echo $row['Email'] ?>
                        </td>
                        <td>
                            <img src="<?php echo $row['Image'] ?>" style="width:100px;height:100px;">
                        </td>
                        <td>
                            <?php echo $row['City'] ?>
                        </td>
                        <td>
                            <?php echo $row['MobileNo'] ?>
                        </td>
                        <td>
                            <?php echo $row['Hobbies'] ?>
                        </td>
                        <td>
                            <?php echo $row['Address'] ?>
                        </td>
                        <td>
                            <?php echo $row['Gender'] ?>
                        </td>
                        <td>
                            <?php echo $row['dob'] ?>
                        </td>
                        <td>
                        <?php if($row['status'] == '1'){?>
                               <a href="#" class="btn btn-primary status_update" status-id="' <?php echo $row['ID'] ?>'" status="0">Active</a>
                         <?php  } else if($row['status'] == '0'){?>
                               <a href="#" class="btn btn-warning status_update" status-id="' <?php echo $row['ID'] ?>'" status="1">InActive</a>
                           <?php }
                            else{
                                echo "no status";
                            }?>
                        </td>
                        <td>
                            <a href="update.php?ID=<?php echo $row['ID'] ?>" class="btn btn-success">Update</a>
                        </td>
                        <td>
                            <a href="delete.php?ID=<?php echo $row['ID'] ?>" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $('.status_update').click(function(){
console.log('btn clicked');
var status = $(this).attr('status');
var update_status = $(this).attr('status-id');
console.log("status : "+ status);
$.ajax({
        url:"status.php",
        type:"POST",
        data:{status_id:status,
            update_id:update_status},
        success:function(result){
            console.log("result : "+ result);
            alert(result);
            window.location.reload();
        }
});
    });
</script>