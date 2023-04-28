<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$userid=$_SESSION['vpmsuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query1=mysqli_query($con,"select ID from tblregusers where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query1);
if($row>0){
$ret=mysqli_query($con,"update tblregusers set Password='$newpassword' where ID='$userid'");

echo '<script>alert("Your password successully changed.")</script>';
} else {
echo '<script>alert("Your current password is wrong.")</script>';

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
                        <a href="view-vehicle.php"><i class="menu-icon ti-truck" style="color: white;  font-size:18px;"> View Vehicle </i></a>
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
                <strong>Change </strong> Password
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="form-horizontal" name="changepassword" onsubmit="return checkpass();">
                   
                   
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Current Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" name="currentpassword" class=" form-control" required= "true" value=""></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">New Password</label></div>
                        <div class="col-12 col-md-9"><input type="password" name="newpassword" class="form-control" value="" required="true"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="password-input" class=" form-control-label">Confirm Password</label></div>
                        <div class="col-12 col-md-9"> <input type="password" name="confirmpassword" class="form-control" value="" required="true"></div>
                    </div>
                   
                  
                    
                    
                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" style="font-size:19px; background-color:#04AA6D;">Change</button></p>
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