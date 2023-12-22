<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

// for updating user info    
if(isset($_POST['Submit']))
{
	$name=$_POST['name'];
    $email=$_POST['email'];
    $mark_10=$_POST['mark_10'];
    $mark_12=$_POST['mark_12'];
    $branch_name=$_POST['branch_name'];
    $hostal_not=$_POST['hostal_not'];
    $bus_no=$_POST['bus_no'];
    
  $mid=intval($_GET['mid']);
$query=mysqli_query($con,"update admission_in set name='$name',email='$email',
mark_10='$mark_10', mark_12='$mark_12' ,  branch_name= '$branch_name', hostal_not='$hostal_not', bus_no='$bus_no' where adm_id='$mid'");
$_SESSION['msg']="Profile Updated successfully";
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

    <title>Books</title>
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
            <a href="dashboard.php" class="logo"><b>Update report</b></a>
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
        
      <?php $ret=mysqli_query($con,"select * from admission_in where adm_id='".$_GET['mid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>'s Information</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" >
                              </div>
                          </div>

                         
                          
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="mark_10" value="<?php echo $row['mark_10'];?>" readonly >
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="mark_12" value="<?php echo $row['mark_12'];?>" readonly >
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="branch_name" value="<?php echo $row['branch_name'];?>" readonly >
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">mobile no </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="hostal_not" value="<?php echo $row['hostal_not'];?>" >
                              </div>
                          </div>
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">mobile no </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="bus_no" value="<?php echo $row['bus_no'];?>" >
                              </div>
                          </div>
                              >
                            
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme" style=" background-color:black;"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>