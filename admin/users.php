<?php
$status=0;
require_once("../connection.php");
if(isset($_GET['status'])) {
	$status = $_GET['status'];
	// do something with the number here
}
session_start();
$id=$_SESSION['id'];
$fname=$_SESSION['fname'];
$admin=$_SESSION['admin'];
if(!$id || $admin == 0)
{
  header("Location: ../index.php");
}

    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/favicon.png" />
    <style>
      td
        {
            white-space:break-spaces !important;
        }
        input:hover
        {
          color: #fff !important;
        }
        textarea:hover
        {
          color: #fff !important;
        }
        @media (max-width: 1100px) 
        {
          .tableDev
          {
            overflow-x: scroll;
          }
        }
    </style>
    <?php
      require_once("../Connection.php");
    ?>
  </head>
  <body>
    
    <div class="container-scroller">
      <!-- partial:./partials/_sidebar.php -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="./index.php"><img src="./assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="./index.php"><img src="./assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="./assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal"><?=$fname?></h5>
                  <span>Admin</span>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="./index.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#cars" aria-expanded="false" aria-controls="cars">
              <span class="menu-icon">
                <i class="mdi mdi-car"></i>
              </span>
              <span class="menu-title">Cars</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="cars">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="all_cars.php">All cars</a></li>
                <li class="nav-item "> <a class="nav-link" href="add_car.php">Add car</a></li>
              </ul>
            </div>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="users.php">
                <span class="menu-icon">
                  <i class="mdi mdi mdi-account-multiple"></i>
                </span>
                <span class="menu-title">Users</span>
              </a>
            </li>
         <li class="nav-item menu-items">
            <a class="nav-link" href="all_trips.php">
              <span class="menu-icon">
                <i class="mdi mdi-car-connected"></i>
              </span>
              <span class="menu-title">All trips</span>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:./partials/_navbar.php -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="./assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            
            <ul class="navbar-nav navbar-nav-right">
              
              
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="./assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name"><?=$fname?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="../Logout.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Log out</p>
                    </div>
                  </a>
                  
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="tableDev">

              <table class="table table-dark table-columns" >
            </div>
                <thead>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th colspan="3" style="text-align: center">Actions</th>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM `users`";
              
                  $result = mysqli_query($conn, $query);
                  while ($row = mysqli_fetch_array($result)) 
                  {
                  ?>
                    <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['fname']?></td>
                        <td><?=$row['lname']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['address']?></td>
                        <td><?=$row['phone']?></td>
                        <?php
                        if($row['admin']==1)
                        {
                          if($row['id']==$id)
                          {
                            ?>
                            <td><a class="btn btn-dark disabled" href="make_user.php?id=<?=$row['id']?>">Admin</a></td>
                            <?php
                          }
                          else
                          {
                            ?>
                            <td><a class="btn btn-success"  href="make_user.php?id=<?=$row['id']?>">Admin</a></td>
                            <?php
                          }
                          
                        }
                        else
                        {
                          ?>
                            <td><a class="btn btn-warning" style="width: 70px;"  href="make_admin.php?id=<?=$row['id']?>">User</a></td>
                          <?php
                        }
                        ?>
                        <?php
                        if($row['id']==$id)
                        {
                          ?>
                          <td><a onclick="return confirm('Are you sure you want to delete <?=$row['fname']?>')" href="delete_user.php?id=<?=$row['id']?>" class="btn btn-danger disabled">Delete</a></td>
                          <?php
                        }
                        else
                        {
                          ?>
                          <td><a onclick="return confirm('Are you sure you want to delete <?=$row['fname']?>')" href="delete_user.php?id=<?=$row['id']?>" class="btn btn-danger">Delete</a></td>
                          <?php
                        }
                        ?>
                        <td><a  href="user_log.php?id=<?=$row['id']?>" class="btn btn-light">Trips Log</a></td>
                    </tr>
                    <?php
                  }
                    ?>
                </tbody>
              </table>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    
</div>
    <!-- plugins:js -->
    <script src="./assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./assets/js/off-canvas.js"></script>
    <script src="./assets/js/hoverable-collapse.js"></script>
    <script src="./assets/js/misc.js"></script>
    <script src="./assets/js/settings.js"></script>
    <script src="./assets/js/todolist.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <!-- endinject -->
    <?php
    if ($status =='deleted')
    {
      ?>
      <script>
        swal("Done!", "Deleted Successfully!", "success");
      </script>
      <?php
    }
    if ($status =='userDone')
    {
      ?>
      <script>
        swal("Done!", "Become User Succesfully!", "success");
      </script>
      <?php
    }
    if ($status =='adminDone')
    {
      ?>
      <script>
        swal("Done!", "Become Admin Succesfully!", "success");
      </script>
      <?php
    }
    ?>
  </body>
</html>
