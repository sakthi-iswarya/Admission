<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['adm_id']))
{
$adminid=$_GET['adm_id'];
$msg=mysqli_query($con,"delete from admission_in where adm_id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
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
            <a href="dashboard.php" class="logo"><b>Delete report</b></a>
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
          	<h3><i class="fa fa-angle-right"></i> Deleted user</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                    <th>Sno.</th>
                                    <th class="hidden-phone">User Name</th>
                                    <th>Email</th>
                                    <th> 10Th Mark</th>
                                    <th> 12Th Mark</th>
                                    <th> Branch Name</th>
                                    <th>Hostal / Day Scholar </th>
                                    <th> college Bus / vehicle</th>                               
                                    <th> Action</th> 
                                </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from admission_in");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['name'];?></td>                                
                                    <td><?php echo $row['email'];?></td> 
                                    <td><?php echo $row['mark_10'];?></td>
                                    <td><?php echo $row['mark_12'];?></td>
                                    <td><?php echo $row['branch_name'];?></td>
                                    <td><?php echo $row['hostal_not'];?></td>
                                    <td><?php echo $row['bus_no'];?></td>

                                    <td>
                                    <a href="update-data.php?mid=<?php echo $row['adm_id'];?>"> 
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <a href="delete-data.php?adm_id=<?php echo $row['adm_id'];?>"> 
                                    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
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