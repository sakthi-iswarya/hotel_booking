<?php
session_start();
error_reporting(0);
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['Submit']))
{

    $b_user=$_POST['b_user'];
    $b_email=$_POST['b_email'];
    $b_mobile_no=$_POST['b_mobile_no'];
    $b_hotel=$_POST['b_hotel'];
    $b_location=$_POST['b_location'];
    $b_rent=$_POST['b_rent'];
    $payment=$_POST['payment'];
    if($payment=="O"){
        $payment="Online";
    }
    else{
        $payment="Offline";
    }
    $b_date=$_POST['b_date'];
    $msg=mysqli_query($con,"insert into hotel_booking(b_user,b_email,b_mobile_no,b_hotel,b_location,b_rent,payment,b_date) 
          values('$b_user','$b_email','$b_mobile_no','$b_hotel','$b_location','$b_rent','$payment','$b_date')");

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Booking </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
        <header class="header black-bg"  style="background-color:black;">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="dashboard.php" class="logo"><b>Booking Hotel</b></a>
            <div class="nav notify-row" id="top_menu"> </ul></div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </header>
        <aside>
            <div id="sidebar"  class="nav-collapse " style="background-color:#212121; color:white;">
                <ul class="sidebar-menu" id="nav-accordion">       
                    <h5 class="centered"><?php echo $_SESSION['login'];?></h5>       
                    <li class="mt"><a href="dashboard.php"><span>Dashboard</span></a></li>
                    <li class="mt"><a href="add-user.php"> <span>Login User</span></a> </li>
                    <li class="mt"><a href="add-hotel.php"> <span>Add Hotel </span></a> </li>
                    <li class="mt"><a href="hotel-booking.php"><span>Book Hotel </span></a> </li>
                    <li class="mt"><a href="hotel-report.php"> <span>Hotel Report</span></a> </li> 
                    <li class="mt"><a href="change-password.php"><span>Change Password</span></a></li>
                    <li class="sub-menu"><a href="manage-users.php" ><span>Manage Users</span></a></li>
                </ul>   
            </div>
        </aside>

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Book Now </h3>
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="content-panel">
                            <form class="form-horizontal style-form" name="form1" method="post" enctype="multipart/form-data" action="" onSubmit="return valid();">
                            <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                            

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">User Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="b_user" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">User Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="b_email" value="" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Mobile Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="b_mobile_no" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Hotel Name</label>
                                <div class="col-sm-10">

                                <select name='b_hotel' style="padding:7px;">  
                                    <option value="<?php echo $row_list['h_name'];?>">Hotel name</option> 
                                    <?php  
                                        $list=mysqli_query($con,"select * from add_hotel");  
                                    while($row_list=mysqli_fetch_assoc($list)){  
                                        ?>  
                                            <option value="<?php echo $row_list['h_name']; ?>"> 
                                             <?php echo $row_list['h_name'];?>  
                                            </option>  
                                        <?php  
                                        }  
                                        ?>
                                      
                                    </select>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Location</label>
                                <div class="col-sm-10">

                                <select name='b_location' style="padding:7px;">  
                                    <option value="<?php echo $row_list['location'];?>">Location</option> 
                                    <?php  
                                        $list=mysqli_query($con,"select * from hotel_location");  
                                    while($row_list=mysqli_fetch_assoc($list)){  
                                        ?>  
                                            <option value="<?php echo $row_list['location']; ?>"> 
                                             <?php echo $row_list['location'];?>  
                                            </option>  
                                        <?php  
                                        }  
                                        ?>
                                      
                                    </select>
                                        
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Rent</label>
                                <div class="col-sm-10">

                                <select name='b_rent' style="padding:7px;">  
                                    <option value="<?php echo $row_list['rent'];?>"> Rent</option> 
                                    <?php  
                                        $list=mysqli_query($con,"select * from renting");  
                                    while($row_list=mysqli_fetch_assoc($list)){  
                                        ?>  
                                            <option value="<?php echo $row_list['rent']; ?>"> 
                                             <?php echo $row_list['rent'];?>  
                                            </option>  
                                        <?php  
                                        }  
                                        ?>
                                      
                                    </select>
                                        
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Payment</label>
                                <div class="col-sm-10">

                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" value="O" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Online
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" value="F" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Offline
                                        </label>
                                    </div>

                                    </select>
                                        
                                </div>
                            </div>

                        

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Booking Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="b_date" value="" >
                                </div>
                            </div>

                            <div style="margin-left:100px; padding-bottom:20px;" >
                                <input type="submit" name="Submit" value="Rent Book" class="btn btn-theme" style="color:white;
                                background-color:black">
                            </div>
                        
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  

  </body>
</html>
<?php } ?>
