<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $parkingnumber=mt_rand(100000000, 999999999);
    $catename=$_POST['catename'];
     $vehcomp=$_POST['vehcomp'];
    $vehreno=$_POST['vehreno'];
    $ownername=$_POST['ownername'];
    $ownercontno=$_POST['ownercontno'];
    $enteringtime=$_POST['enteringtime'];
    
     
    $query=mysqli_query($con, "insert into  tblvehicle(ParkingNumber,VehicleCategory,VehicleCompanyname,RegistrationNumber,OwnerName,OwnerContactNumber) value('$parkingnumber','$catename','$vehcomp','$vehreno','$ownername','$ownercontno')");
    if ($query) {
echo "<script>alert('Vehicle Entry Detail has been added');</script>";
echo "<script>window.location.href ='manage-incomingvehicle.php'</script>";
  }
  else
    {
     echo "<script>alert('Something Went Wrong. Please try again.');</script>";       
    }

  
}
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
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

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
                <div class="animated fadeIn" style="font-size: 19px;">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card"style="font-size:18px;border-radius: 15px;
    background-color: rgba(0,0,0,.2);color:white;">
                            <div class="card-header">
                                <strong>Add Vehicle </strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal"style="font-size: 18px;">
                                    

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                        <div class="col-12 col-md-9">
                                            <select name="catename" id="catename" class="form-control">
                                                <option value="0">Select Category</option>
                                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
                                                 <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vehicle Company</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="vehcomp" name="vehcomp" class="form-control" placeholder="Vehicle Company" required="true"></div>
                                    </div>
                                 
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Registration Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="vehreno" name="vehreno" class="form-control" placeholder="Registration Number" required="true"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownername" name="ownername" class="form-control" placeholder="Owner Name" required="true"></div>
                                    </div>
                                     <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Owner Contact Number</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="ownercontno" name="ownercontno" class="form-control" placeholder="Owner Contact Number" required="true" maxlength="10" pattern="[0-9]+"></div>
                                    </div>
                                   
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" style="font-size: 20px; text-align: center; background-color:#04AA6D;">Add</button></p>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-lg-6">
                        
                  
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