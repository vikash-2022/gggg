<?php
   include('data-con.php');
   error_reporting(1);
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="./assets/img/favicon.png">
      <title>
         Add Department | HMS
      </title>
      <!--     Fonts and icons     -->
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
      <!-- Nucleo Icons -->
      <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <!-- Material Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
      <!-- CSS Files -->
      <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
   </head>
   <body class="g-sidenav-show  bg-gray-200">
      <?php include('aside.php');?>
      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
         <!-- Navbar -->
         <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                     <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Home</a></li>
                     <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Department</li>
                  </ol>
                  <h6 class="font-weight-bolder mb-0">Department</h6>
               </nav>
            </div>
         </nav>
         <!-- End Navbar -->
         <div class="container-fluid py-4">
            <div class="row mb-4">
               <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                  <div class="card">
                     <div class="card-header pb-0">
                        <div class="row">
                           <div class="col-lg-6 col-7">
                              <h6>Add Department Form</h6>
                           </div>
                           <div class="col-lg-6 col-5 my-auto text-end">
                           </div>
                        </div>
                     </div>
                     <div class="card-body">
                        <form method="post">
                           <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label">Department Name</label>
                              <input type="text" name="t1" class="form-control" id="exampleFormControlInput1" placeholder="XXXXXX" style="border:1px solid;text-align: center;">
                           </div>
                           <div class="mb-3">
                              <button class="btn btn-warning" name="submit">Add</button>
                           </div>
                        </form>
                        <?php
                           if(isset($_POST['submit'])){
                             $t1=$_POST['t1'];
                             mysqli_query($cn,"insert into department(dept_name)values('$t1')");
                           ?>
                        <script>
                           location.href="add-department.php?y=1";
                        </script>
                        <?php
                           }
                           ?>
                        <?php
                           $yk=$_GET['y'];
                           if($yk==1)
                           {
                           ?>
                        <div class="alert alert-success" style="color:#fff">Department Added Done!</div>
                        <?php
                           }
                           ?>
                     </div>
                  </div>
                  <br>
                  <div class="row mb-4">
                     <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                        <div class="card">
                           <div class="card-header pb-0">
                              <div class="row">
                                 <div class="col-lg-6 col-7">
                                    <h6>Available Departments</h6>
                                 </div>
                                 <div class="col-lg-6 col-5 my-auto text-end">
                                 </div>
                              </div>
                           </div>
                           <div class="card-body px-0 pb-2">
                              <div class="table-responsive">
                                 <table class="table align-items-center mb-0">
                                    <thead>
                                       <tr>
                                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department Name</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                          $get_dept_query=mysqli_query($cn,"select * from department");
                                          while($kk=mysqli_fetch_array($get_dept_query))
                                          {
                                          ?>
                                       <tr>
                                          <td>
                                             <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                   <h6 class="mb-0 text-sm"><?php echo $kk['dept_name'];?></h6>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       <?php
                                          }
                                          ?>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="footer py-4">
               <div class="container-fluid">
                  <div class="row align-items-center justify-content-lg-between">
                     <div class="col-lg-12 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                           © <script>
                              document.write(new Date().getFullYear())
                           </script>,
                           made with <i class="fa fa-heart"></i> by
                           <a href="#" class="font-weight-bold" target="_blank">Riddhika Developers</a>.
                        </div>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </main>
      <!--   Core JS Files   -->
      <script src="./assets/js/core/popper.min.js"></script>
      <script src="./assets/js/core/bootstrap.min.js"></script>
      <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
      <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
      <script src="./assets/js/plugins/chartjs.min.js"></script>
      <script>
         var win = navigator.platform.indexOf('Win') > -1;
         if (win && document.querySelector('#sidenav-scrollbar')) {
           var options = {
             damping: '0.5'
           }
           Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
         }
      </script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="./assets/js/material-dashboard.min.js?v=3.0.2"></script>
   </body>
</html>