<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reader</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        <link rel="stylesheet" href="assets/css/reader.css">
        <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
       
    
    </head>
    <style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

.dropdown {
  
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  right: 0;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

</style>
    <body style="background-image:
    url('images/pexels-photo-733745(blur).png'); height: 100%;
    background-position: center; background-repeat: no-repeat;
    background-size: cover;">
        <div class="wrapper">
            <div class="sidebar">
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop" style="color: white;">  Dashboard</i></a>
                    </li><br>
                    <li>
                        <a href="add-category.php"><i class="menu-icon fa fa-table" style="color: white;">  Add Category</i></a>
                    </li><br>
                    <li>
                        <a href="manage-category.php"><i class="fa fa-table" style="color: white;"> Manage Category </i> </a>
                    </li><br>
                    <li>
                        <a href="add-vehicle.php"> <i class="menu-icon ti-email" style="color: white; font-size:17px;"> Add Vehicle</i></a>
                    </li><br>
                    <li>
                        <a href="manage-incomingvehicle.php"><i class="menu-icon fa fa-th"style="color: white;"> Manage In Vehicle</i></a>
                    </li><br>
                    <li>
                        <a href="manage-outgoingvehicle.php"><i class="menu-icon fa fa-th" style="color: white;"> Manage Out Vehicle</i></a>
                    </li><br>
                    <li>
                        <a href="bwdates-report-ds.php"><i class="menu-icon fa fa-th"style="color: white;"> Between Dates Reports</i></a>
                    </li><br>
                    <li>
                        <a href="search-vehicle.php"> <i class="menu-icon fa fa-search" style="color: white;"> Search Vehicle</i></a>
                    </li><br>
                    <li>
                        <a href="reg-users.php"> <i class="menu-icon ti-user"style="color: white;font-size:17px;"> Reg Users</i></a>
                    </li>
                </ul>
            </div>
            <div class="content" >
                <header class="header">
                    <div class="header-1">
                        <div class="icons">
                            <a id="toggle" class="fas fa-list"></a>
                        </div>
                        <a href="dashboard.php" class="logo"> <i class="fa
                            fa-address-book"></i>Admin</a>
                            
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn" style="border-radius: 50%;">Profile</button>
                                <div id="myDropdown" class="dropdown-content">
                                  <a href="admin-profile.php"><i class="fa fa- user"></i>My Profile</a>
                                  <a href="change-password.php"><i class="fa fa -cog"></i>Change Password</a>
                                  <a href="index.php"><i class="fa fa-power -off"></i>Logout</a>
                                </div>
                              </div>
                    </div>
                </header><br><br>
                <div class="animated fadeIn"style="font-size:18px;">
                <div class="row">
                   
         

                <div class="col-lg-12">
                    <div class="card"style="font-size:18px; border-radius: 15px; background-color: rgba(0,0,0,.2);color:white;">
                        <div class="card-header">
                            <strong class="card-title">Search Vehicle</strong>
                        </div>
                        <div class="card-body">
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="search">
                                    
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Search By Parking Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="searchdata" name="searchdata" class="form-control"  required="required" autofocus="autofocus" ></div>
                                    </div>
                                 
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="search" style="font-size:18px;background-color: #04AA6D;">Search</button></p>
                                </form>

 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                 
                    <th>Parking Number</th>
                    <th>Owner Name</th>
                    <th>Vehicle Reg. Number</th>
                   
                          <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from   tblvehicle where ParkingNumber like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['ParkingNumber'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['RegistrationNumber'];?></td>
                  
                  <td><a href="view-incomingvehicle-detail.php?viewid=<?php echo $row['ID'];?>">View</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
     <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
              </table>

                    </div>
                </div>
            </div>



        </div>
    </div><!-- .animated -->
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/r_script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>
    <script>
    $('#toggle').on('click', function (e) {
        e.preventDefault();
        $('.sidebar').toggleClass('open closed');
    });
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

    </script>
</html>
<?php }  ?>