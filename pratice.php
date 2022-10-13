
<?php
include('data-con.php');
error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title>
        Hospital Management System by Akash
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>


    <?php
    include('aside.php')
    ?>



    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Add Doctor</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0"> Add Doctor / All Doctor</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <!-- Endnav  -->


        <div class="row mt-5 m-4">
            <!-- form 1        -->
            <div class="col-md-12 mt-5">
                <form method="post" class="form-control" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4">
                             <label class="fs-5 ">Doctor Name </label>
                    <input type="text" class="form-control" name="t1">
                        </div>
                        <div class="col-sm-4">
                             <label class="fs-5 ">Select Department </label>
<select class="form-control" name="t2">
<?php

$fetch_dept=mysqli_query($cn,"select * from department");
while($fetch_rowk=mysqli_fetch_array($fetch_dept))
{
?>

<option><?php echo $fetch_rowk['dept_name'];?></option>
<?php

}

?>
        </select>            
                        </div>
                        <div class="col-sm-4">
                             <label class="fs-5 ">Select Doctor Image </label>
                    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                   
    
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary mb-3" name="SDO">Add Doctor</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- form 2  -->
           </div>
     </div>

<!-- Form 1 Query -->

        <?php
        if(isset($_POST['SDO'])) {
           $uploadOk=1;
            $target_dir="doctor_pic/";
           $target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
           $t1 = $_POST['t1'];
           $t2 = $_POST['t2'];
           $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) 
    {
       

?>
<script>
                location.href = "add_doctors.php?d=2";
            </script>

<?php

    }
else{
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
{

mysqli_query($cn, "insert into doctor(doctor_name,specialist,profile_pic) VALUES ('$t1','$t2','$target_file')");

}
?>

<script>
                location.href = "add_doctors.php?d=1";
            </script>
<?php
}
  ?>

            

        <?php
        }
        ?>

        <?php
        $dk = $_GET['d'];
        if ($dk==1) {
        ?>

            <div class="alert alert-success mt-3 col-md-3 m-5 fw-bold" style="color:#fff">Doctor Added</div>


        <?php
        }
        ?>
        <?php

         if ($dk==2) {
        ?>

            <div class="alert alert-danger mt-3 col-md-3 m-5 fw-bold" style="color:#fff">Wrong Format Image. Allowed Only('jpeg,jpg,gif,png')</div>


        <?php
        }
        ?>






        <div class="row m-2">
            <div class="col-md-6 d-flex">
                <h4 class="shadow fw-bold col-md-6 rounded p-2 px-4">All Doctors</h4>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <?php
                    $list_of_doc = mysqli_query($cn, "select * from doctor");
                    while ($rowdoc = mysqli_fetch_array($list_of_doc)) {
                    ?>

                     

<table class="table table-stripped">
    <tr>
        <td><img src="<?php echo $rowdoc['profile_pic']; ?>" style="height:50px;width:50px;border-radius:100px"></td>
        <td><?php echo $rowdoc['doctor_name']; ?></td>
        
    </tr>
                  
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>