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

    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $mark_10=$_POST['mark_10'];
    $mark_12=$_POST['mark_12'];
    $branch_name=$_POST['branch_name'];
    $hostal_not=$_POST['hostal_not'];
    if($hostal_not=="h"){
        $hostal_not="Hostal";
    }
    else{
        $hostal_not="day scholar";
    }
    
    $bus_no=$_POST['bus_no'];
    if($bus_no=="Y"){
        $bus_no="College Bus";
    }
    else{
        $bus_no="vehicle";
    }

    $payment=$_POST['payment'];
    if($payment=="O"){
        $payment="Online";
    }
    else{
        $payment="Offline";
    }
    $date=$_POST['date'];
    $msg=mysqli_query($con,"insert into admission_in(name,email,number,mark_10,mark_12,branch_name,hostal_not,bus_no,payment,date) 
          values('$name','$email','$number','$mark_10','$mark_12','$branch_name','$hostal_not','$bus_no','$payment','$date')");

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

    <title>Open now </title>
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
            <a href="dashboard.php" class="logo"><b>Admission Open Now</b></a>
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
                    <li class="mt"><a href="add-branch.php"> <span>Add Branch </span></a> </li>
                    <li class="mt"><a href="add-teachers.php"><span>Add Teachers </span></a> </li>
                    <li class="mt"><a href="admission.php"> <span>Admission Now</span></a> </li> 
                    <li class="mt"><a href="teachers-report.php"> <span>Teachers Report</span></a> </li> 
                    <li class="mt"><a href="admission-report.php"> <span>Admission Report</span></a> </li> 
                    <li class="mt"><a href="change-password.php"><span>Change Password</span></a></li>
                    <li class="sub-menu"><a href="manage-users.php" ><span>Manage Users</span></a></li>
                </ul>   
            </div>
        </aside>

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Register now</h3>
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="content-panel">
                            <form class="form-horizontal style-form" name="form1" method="post" enctype="multipart/form-data" action="" onSubmit="return valid();">
                            <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                            

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">User Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">User Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="email" value="" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Mobile Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="number" value="" >
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">10Th Mark</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="mark_10" value="" >
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">12th Mark</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="mark_12" value="" >
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Branch Name</label>
                                <div class="col-sm-10">

                                <select name='branch_name' style="padding:7px;">  
                                    <option value="<?php echo $row_list['branch_name'];?>">Branch name</option> 
                                    <?php  
                                        $list=mysqli_query($con,"select * from add_branch");  
                                    while($row_list=mysqli_fetch_assoc($list)){  
                                        ?>  
                                            <option value="<?php echo $row_list['branch_name']; ?>"> 
                                             <?php echo $row_list['branch_name'];?>  
                                            </option>  
                                        <?php  
                                        }  
                                        ?>
                                      
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Hostel/ Day Scholar</label>
                                <div class="col-sm-10">

                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="hostal_not" value="h" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Hostel
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="hostal_not" value="d" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                        Day Scholar
                                        </label>
                                    </div>

                                    </select>
                                        
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">College bus / vehicle</label>
                                <div class="col-sm-10">

                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" value="Y" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                        Bus
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment" value="N" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                        vehicle
                                        </label>
                                    </div>

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
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;"> Date</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="date" value="" >
                                </div>
                            </div>

                            <div style="margin-left:100px; padding-bottom:20px;" >
                                <input type="submit" name="Submit" value="Admission Submit now" class="btn btn-theme" style="color:white;
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
