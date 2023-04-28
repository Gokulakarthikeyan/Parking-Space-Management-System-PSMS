<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsuid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    $uid=$_SESSION['vpmsuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $query=mysqli_query($con, "update tblregusers set FirstName='$fname', LastName='$lname' where ID='$uid'");
    if ($query) {
 echo '<script>alert("Profile updated successully.")</script>';
echo '<script>window.location.href=profile.php</script>';
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
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
        <link rel="stylesheet" href="../admin/assets/css/reader.css">
        <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../admin/assets/css/style.css">

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
    url('pexels-photo-733745(blur).png'); height: 100%;
    background-position: center; background-repeat: no-repeat;
    background-size: cover;">
        <div class="wrapper">
            <div class="sidebar">
              <ul class="nav navbar-nav" >
                    <p style="text-align:center; color: white; font-size:18px;">User Dashboard</p>
                    <br>
                    <li>
                        <a href="dashboard.php"><i class="menu-icon fa fa-laptop" style="color: white; font-size:18px;">  Dashboard</i></a>
                    </li><br>
                    <li>
                        <a href="view-vehicle.php"><i class="menu-icon ti-truck" style="color: white; font-size:18px;"> View Vehicle </i></a>
                    </li><br>
                </ul>
            </div>
            <div class="content" >
                <header class="header">
                    <div class="header-1">
                        <div class="icons">
                            <a id="toggle" class="fas fa-list"></a>
                        </div>
                        <a href="dashboard.php" class="logo"> <i class="fa
                            fa-address-book"></i> User</a>
                            
                            <div class="dropdown">
                                <button onclick="myFunction()" class="dropbtn" style="border-radius: 50%;">Profile</button>
                                <div id="myDropdown" class="dropdown-content">
                                  <a href="profile.php"><i class="fa fa- user"></i>My Profile</a>
                                  <a href="change-password.php"><i class="fa fa -cog"></i>Change Password</a>
                                  <a href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                                </div>
                              </div>
                    </div>
                </header><br><br>
                <div class="animated fadeIn" style="font-size:19px;">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>User Profile</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                   
                                   <?php
$uid=$_SESSION['vpmsuid'];
$ret=mysqli_query($con,"select * from tblregusers where ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?> 
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">First Name</label></div>
                                        <div class="col-12 col-md-9"> <input type="text" name="firstname" required="true" class="form-control" value="<?php  echo $row['FirstName'];?>">
                                    </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Last Name</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="lastname" required="true" class="form-control" value="<?php  echo $row['LastName'];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Contact Number</label></div>
                                        <div class="col-12 col-md-9"> <input type="text" name="mobilenumber" maxlength="10" pattern="[0-9]{10}" readonly="true" class="form-control" value="<?php  echo $row['MobileNumber'];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Email address</label></div>
                                        <div class="col-12 col-md-9"><input type="email" name="email" required="true" class="form-control" value="<?php  echo $row['Email'];?>"  readonly="true"></div>
                                    </div>
                                  
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Registration</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="regdate" value="<?php  echo $row['RegDate'];?>"  readonly="true" class="form-control"></div>
                                    </div>
                                    <?php } ?>
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" style="font-size:18px; background-color:#04AA6D;">Update</button></p>
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
    <script src="../admin/assets/js/r_script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="../admin/assets/js/main.js"></script>
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