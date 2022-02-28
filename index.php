<?php
require('../include/db.php');
session_start();
if(!isset($_SESSION['isUserLoggedIn'])){
  echo "<script>window.location.href='login.php';</script>";                    

}


$query = "SELECT * FROM home,section_control,social_media,about,contact,site_background,seo,admin";
$run = mysqli_query($db,$query);
$user_data = mysqli_fetch_array($run);

if(time() - $_SESSION['last_login_timestamp'] > 1800) { //subtract new timestamp from the old one
    unset($_SESSION['email'], $_SESSION['password'], $_SESSION['password']);
    $_SESSION['isUserLoggedIn'] = false;
   echo "<script>window.location.href='login.php';</script>"; //redirect to index.php
    exit;
} else {
    $_SESSION['timestamp'] = time(); //set new timestamp
}
?>
<!DOCTYPE html>
<html>
<style>
    .alert-message
{
    margin: 20px 0;
    padding: 20px;
    border-left: 3px solid #eee;
}
.alert-message h4
{
    margin-top: 0;
    margin-bottom: 5px;
}
.alert-message p:last-child
{
    margin-bottom: 0;
}

.alert-message-warning
{
    background-color: #FF8A8A;
    border-color: #f0ad4e;
}
.alert-message-warning h4
{
    color: #f0ad4e;
}

.alert-message-danger
{
    background-color: #fdf7f7;
    border-color: #FF2E2E;
}
.alert-message-danger h4
{
    color: #FF2E2E;
}

</style>
<head>



            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />





<link rel="icon" type="image/png" href="admin.png" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
        <a class="nav-link" href="../include/logout.php">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../images/<?=$user_data['admin_profile']?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$user_data['fullname']?></a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
          </div>
          </div>
      
        

      <!-- Sidebar Menu -->
      <?php
function active($currect_page){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      echo 'active'; //class name in css 
  } 
}
?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link <?php active('index.php');?>">
            <i class="fa fa-th-large" aria-hidden="true"></i>

              <p>
                Section Control  <span class="right badge badge-danger">New</span>
              </p>
            </a>
            
          </li>
          <li class="nav-item menu-open">
            <a href="index.php?homesetting=true" class="nav-link <?php active('index.php?homesetting=true');?>">
            <i class="fa fa-home" aria-hidden="true"></i>


              <p>
                Home Setting
              </p>
            </a>
            
          </li>
          <li class="nav-item menu-open">
            <a href="index.php?aboutsetting=true" class="nav-link <?php active('index.php?aboutsetting=true');?>">
            <i class="fa fa-question-circle" aria-hidden="true"></i>


              <p>
                About Setting
              </p>
            </a>
            
          </li>

           <li class="nav-item menu-open">
            <a href="index.php?countsetting=true" class="nav-link <?php active('index.php?countsetting=true');?>">
            <i class="fas fa-list-ol" aria-hidden="true"></i>


              <p>
                Count Setting
              </p>
            </a>
            
          </li>

          <li class="nav-item menu-open">
            <a href="index.php?resumesetting=true" class="nav-link <?php active('index.php?resumesetting=true');?>">
            <i class="fa fa-briefcase" aria-hidden="true"></i>


              <p>
                Resume Setting
              </p>
            </a>
            
             <li class="nav-item menu-open">
            <a href="index.php?servicessetting=true" class="nav-link <?php active('index.php?servicessetting=true');?>">
            <i class="fab fa-servicestack" aria-hidden="true"></i>


              <p>
                Services Setting
              </p>
            </a>
            
          </li>

          </li>
          <li class="nav-item menu-open">
            <a href="index.php?portfoliosetting=true" class="nav-link <?php active('index.php?portfoliosetting=true');?>">
            <i class="fas fa-briefcase"></i>


              <p>
                Portfolio Setting
              </p>
            </a>
            
          </li>


          <li class="nav-item menu-open">
            <a href="index.php?uploadCV=true" class="nav-link <?php active('index.php?uploadCV=true');?>">
            <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>


              <p>
                Upload Curriculum vitæ
              </p>
            </a>
            
          </li>


          <li class="nav-item menu-open">
            <a href="index.php?contactsetting=true" class="nav-link <?php active('index.php?contactsetting=true');?>">
            <i class="fa fa-phone" aria-hidden="true"></i>



              <p>
                Contact Setting
              </p>
            </a>
            
          </li>
          <li class="nav-item menu-open">
            <a href="index.php?changebackground=true" class="nav-link <?php active('index.php?changebackground=true');?>">
            <i class="fas fa-images" aria-hidden="true"></i>



              <p>
                Change Background
              </p>
            </a>
            
          </li>
          <li class="nav-item menu-open">
            <a href="index.php?seosetting=true" class="nav-link <?php active('index.php?seosetting=true');?>">
            <i class="fa fa-search" aria-hidden="true"></i>



              <p>
                SEO Setting
              </p>
            </a>
            
          </li>
          <li class="nav-item menu-open">
            <a href="index.php?accountsetting=true" class="nav-link <?php active('index.php?accountsetting=true');?>">
            <i class="fa fa-user" aria-hidden="true"></i>


              <p>
                Account Setting
              </p>
            </a>
            
          </li>
        
          <li class="nav-item menu-open">
            <a href="index.php?message=true" class="nav-link <?php active('index.php?message=true');?>">
            <i class="fas fa-comment-alt" aria-hidden="true"></i>


              <p>
                Message   
              </p>   
              
                &nbsp;
             <span class="badge badge-warning right"><?php $result = $db->query("SELECT COUNT(*) FROM message")->fetch_array();echo ($result[0]);?></span>
              
            </a>
            
          </li>


           <li class="nav-item menu-open">
            <a href="index.php?visitors=true" class="nav-link <?php active('index.php?visitors=true');?>">
            <i class="fas fa-network-wired" aria-hidden="true"></i>


              <p>
                Visitors info    
              </p>   
              
                &nbsp;
              <span class="badge badge-warning right"><?php $result = $db->query("SELECT COUNT(*) FROM visitors_info")->fetch_array();echo ($result[0]);?></span>
              
            </a>
            
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <?php
          if(isset($_GET['homesetting'])){ ?>
<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-home"></i> &nbsp;
 Update Home</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../include/admin.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Headline</label>
                    <input type="text" class="form-control"  name="title" value="<?=$user_data['title']?>" id="exampleInputEmail1" placeholder="Enter headline">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" value="<?=$user_data['subtitle']?>" id="exampleInputPassword1" placeholder="Enter Subtile">
                  </div>
                  
                  <div class="form-check">
                    <input type="checkbox" name="showicons" class="form-check-input" id="exampleCheck1"
                    <?php
                      if($user_data['showicons']){
                        echo "checked";
                      }

                      ?>
                    >
                    <label class="form-check-label" for="exampleCheck1">Show Social Icons</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-home" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div>
          <?php

          }else if(isset($_GET['aboutsetting'])){
            ?>
           <div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title">Update About</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <img src="../images/<?=$user_data['profile_pic']?>" class="col-2">
              <form role="form" action="../include/admin.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">About Profile Pic</label>
                    <input type="file" class="form-control"  name="profile">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">About Headline</label>
                    <input type="text" class="form-control"  name="abouttitle" value="<?=$user_data['about_title']?>" id="exampleInputEmail1" placeholder="Enter headline">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">About Subtitle</label>
                    <input type="text" class="form-control" name="aboutsubtitle" value="<?=$user_data['about_subtitle']?>" id="exampleInputPassword1" placeholder="Enter Subtitle">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">About Description</label><br>
                    <textarea cols="50" name="aboutdesc"><?=$user_data['about_desc']?></textarea>
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-about" class="btn btn-primary">Save Changes</button>
                </div>
              </form>
            </div> 

            <div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title">Manage Skills</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Skills</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="card-body p-0">
                <table class="table table-striped table-bordered" id="skilltab">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Skill Name</th>
                      <th>Skill Level</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$q = "SELECT * from skills";
$r=mysqli_query($db,$q);
$c =1;
while($skill=mysqli_fetch_array($r)){
  ?>
<tr>
                      <td><?=$c?></td>
                      <td><?=$skill['skill_name']?></td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: <?=$skill['skill_level']?>%"></div>
                        </div>
                        <span class="badge bg-danger"><?=$skill['skill_level']?>%</span>
                      </td>
                      <td>
<a style="color:#FF0000;" href="../include/deleteskill.php?id=<?=$skill['id']?>">Delete</a>

                      </td>
                    </tr>
  <?php
  $c++;
}
                    ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

              <form role="form" action="../include/admin.php" method="post">
                <div class="card-body">
                <div class="form-group col-6">
                    <label for="exampleInputEmail1">Skill Name</label>
                    <input type="text" class="form-control"  name="skillname">
                  </div>
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Skill Level</label>
                    <input type="range" min="1" max="100" class="form-control"  name="skilllevel" id="exampleInputEmail1">
                  </div>
                 
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add-skill" class="btn btn-primary">Add Skill</button>
                </div>
              </form>
            </div>

            <div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title">Manage Personal Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Personal Info</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="card-body p-0">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Label</th>

                      <th>Value</th>
                      
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$q = "SELECT * from personal_info";
$r=mysqli_query($db,$q);
$c =1;
while($pi=mysqli_fetch_array($r)){
  ?>
<tr>
                      <td><?=$c?></td>
                      <td><?=$pi['label']?></td>
                      <td><?=$pi['value']?></td>

                      
                      <td>
<a style="color:#FF0000;" href="../include/deletepi.php?id=<?=$pi['id']?>">Delete</a>

                      </td>
                    </tr>
  <?php
  $c++;
}
                    ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

              <form role="form" action="../include/admin.php" method="post">
                <div class="card-body">
                <div class="form-group col-6">
                    <label for="exampleInputEmail1">Label Name</label>
                    <input type="text" class="form-control"  name="label">
                  </div>
                  <div class="form-group col-6">
                    <label for="exampleInputEmail1">Label Value</label>
                    <input type="text" class="form-control"  name="value" id="exampleInputEmail1">
                  </div>
                 
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add-pi" class="btn btn-primary">Add Personal Info</button>
                </div>
              </form>
            </div>
            <?php
          }elseif(isset($_GET['servicessetting'])){
            ?>

<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fab fa-servicestack" aria-hidden="true"></i>&nbsp; Manage Services</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Services List</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="card-body p-0">
                <table class="table table-striped table-bordered" id="servicestab">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Title</th>
                      <th>Icon</th>
                      <th>Details</th>                    
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$q = "SELECT * from services";
$r=mysqli_query($db,$q);
$c =1;
while($pi=mysqli_fetch_array($r)){
  ?>
<tr>
                      <td><?=$c?></td>
                      <td><?=$pi['title']?></td>
                      <td> <i class="<?=$pi['icon']?>"></i> </td>
                      <td><?=$pi['details']?></td>
                      <td>
<a href="../include/deleteservice.php?id=<?=$pi['id']?>" style="color:#FF0000;"><i class="fas fa-trash-alt"></i></a>&nbsp;&nbsp;
<a href="#" style="color: #32CD32"><i class="fas fa-edit"></i></a>

                      </td>
                    </tr>
  <?php
  $c++;
}
                    ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

              <form role="form" form class="was-validated" action="../include/admin.php" method="post">
                <div class="card-body"><br/>
               
                <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-heading"></i></div>
                        </div>
                    <input type="text" placeholder="Title" class="form-control"  name="title" required>
                  </div><br/>


                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-fonticons-fi"></i></div>
                        </div>
                    <input type="text" placeholder="fab fa-iconName" id="exampleInputEmail1" class="form-control"  name="icon" required>
                  </div><br/>




                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-sticky-note"></i></div>
                        </div>
                    <textarea type="text" placeholder="Details" name="details" required class="form-control" id="textAreaExample1"  rows="4"></textarea>
                  </div><br/>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add-service" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Add Service</button>
                </div>
              </form>
            </div>
            <?php

          }
          elseif(isset($_GET['countsetting'])){
            ?>

<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-ol" aria-hidden="true"></i>&nbsp; Manage Counts</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Counts List</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="card-body p-0">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Happy Clients</th>
                      <th>Projects</th>
                      <th>Hours Of Support</th>                    
                      <th>Hard Workers</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$q = "SELECT * from counts";
$r=mysqli_query($db,$q);
$c =1;
while($pi=mysqli_fetch_array($r)){
  ?>
<tr>
                      <td><?=$c?></td>
                      <td><?=$pi['happy_clients']?></td>
                      <td><?=$pi['projects']?></td>
                      <td><?=$pi['hours_of_support']?></td>
                      <td><?=$pi['hard_workers']?></td>
                      <td>
                      </td>
                    </tr>
  <?php
  $c++;
}
                    ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

              <form role="form" action="../include/admin.php" method="post">
                <div class="card-body">
               <?php $q = "SELECT * from counts"; $r=mysqli_query($db,$q); while($pi=mysqli_fetch_array($r)){ ?>
                <div class="form-group col-6">
                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-smile-beam"></i></div>
                        </div>
                    <input type="number" min="0" name="happy_clients" required placeholder="Happy Clients" class="form-control" value="<?=$pi['happy_clients']?>">
                  </div><br/>


                  </div>
                  <div class="form-group col-6">
             
                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-project-diagram"></i></div>
                        </div>
                    <input type="number" min="0" name="projects" required placeholder="Projects" class="form-control" value="<?=$pi['projects']?>" required>
                  </div><br/>
                  </div>
                  <div class="form-group col-6">

                        <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                        </div>
                    <input type="number" min="0" name="hours_of_support" required placeholder="Hours Of Support" class="form-control" value="<?=$pi['hours_of_support']?>" required>
                  </div><br/>


                  </div>
                   <div class="form-group col-6">

                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-users"></i></div>
                        </div>
                    <input type="number" min="0" required placeholder="Hard Workers" class="form-control"  name="hard_workers"  value="<?=$pi['hard_workers']?>" required>
                  </div><br/>






                  </div>
                  <?php } ?>
                </div>
               
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-counts" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp; Update Counts</button>
                </div>
              </form>
            </div>
            <?php

          }
          elseif(isset($_GET['resumesetting'])){
            ?>

<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;
 Manage Resume</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Education & Work</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="card-body p-0">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Type</th>
                      <th>Title</th>
                      <th>Time</th>
                      <th>Institute/Company</th>
                      <th>About</th>                      
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$q = "SELECT * from resume";
$r=mysqli_query($db,$q);
$c =1;
while($pi=mysqli_fetch_array($r)){
  ?>
<tr>
                      <td><?=$c?></td>
                      <td><?=$pi['type']?></td>
                      <td><?=$pi['title']?></td>
                      <td><?=$pi['time']?></td>
                      <td><?=$pi['org']?></td>
                      <td><?=$pi['about_exp']?></td>




                      
                      <td>
<a href="../include/deleteresume.php?id=<?=$pi['id']?>" style="color:#FF0000;"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;</a>
<a href="#" style="color: #32CD32"><i class="fas fa-edit"></i></a>

                      </td>
                    </tr>
  <?php
  $c++;
}
                    ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

              <form form class="was-validated" role="form" action="../include/admin.php" method="post">
                <div class="card-body">
                
                    <div class="input-group">
                    <select class="custom-select" name="type" class="form-control" required>
                    <option style="display:none;" selected disabled value="">Select Type...</option>
                      <option value="e">Education</option>
                      <option value="p">Professional</option>
                    </select>
                    </div><br/>
                 



                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-heading"></i></div>
                        </div>
                    <input type="text" placeholder="Title" class="form-control"  name="title" required>
                  </div><br/>
               

                         <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-university"></i></div>
                        </div>
                    <input type="text" placeholder="Institute/Company" class="form-control"  name="org" required>
                  </div><br/>




                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-calendar-week"></i></div>
                        </div>
                    <input type="text" placeholder="Time" class="form-control"  name="time" required>
                  </div><br/>


               

                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-question-circle"></i></div>
                        </div>
                    <input type="text" placeholder="About" class="form-control"  name="about" >
                  </div><br/>


               
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add-resume" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Add Details</button>
                </div>
              </form>
            </div>
            <?php

          }elseif(isset($_GET['portfoliosetting'])){
            ?>
<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-briefcase"></i> &nbsp; Manage Portfolio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <h3 class="card-title">Your Projects</h3>

                
              </div>
              <!-- /.card-header -->
              <div class="table-responsive">
              <div class="card-body p-0">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Project Type</th>
                      <th>Project Image</th>
                      <th>Project Name</th>
                      <th>Project Link</th>                  
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$q = "SELECT * from portfolio";
$r=mysqli_query($db,$q);
$c =1;
while($pi=mysqli_fetch_array($r)){
  ?>
<tr>
                      <td><?=$c?></td>
                      <td><?=$pi['project_type']?></td>
                      <td><img src="../images/<?=$pi['project_pic']?>" style="width:150px"/></td>
                      <td><?=$pi['project_name']?></td>
                      <td><a href="<?=$pi['project_link']?>" target="_blank"><i class="fas fa-external-link-alt"></i>&nbsp; Open Link</a></td>
                      




                      
                      <td>
<a style="color:#FF0000;" href="../include/deleteportfolio.php?id=<?=$pi['id']?>"><i class="fas fa-trash-alt"></i></a>

                      </td>
                    </tr>
  <?php
  $c++;
}
                    ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

              <form role="form" form class="was-validated" action="../include/admin.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group col-12">
                   
                    <select name="type" class="custom-select" required>
                    <option style="display:none;" selected disabled value="">Select Type...</option>
                      <option value="software">SOFTWARE</option>
                      <option value="app">APP</option>
                      <option value="web">WEB</option>
                      <option value="idea">IDEA</option>
                      <option value="product">PRODUCT</option>
                      <option value="video">VIDEO</option>
                      <option value="animation">ANIMATION</option>
                      <option value="card">CARD</option>
                    </select><br/>
                    
                  </div>
                    <div class="form-group col-12">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="project_pic" size="50" name="project_pic">
                            <label class="custom-file-label" for="validatedCustomFile">Choose Project Image...</label>
                        <div class="invalid-feedback">invalid custom file feedback</div>
                        </div>
                    </div>
                    

                <div class="form-group col-12">
                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-project-diagram"></i></div>
                        </div>
                    <input type="text" placeholder="Enter Your Project Name" class="form-control"  name="project_name" required>
                  </div>
                  </div>
               
                  

                    <div class="form-group col-12">
                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-link"></i></div>
                        </div>
                    <input type="text" placeholder="Enter Your Project Link" class="form-control"  name="project_link" required>
                     </div>
                  </div><br/>
                 
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="add-project" class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Add Project</button>
                </div>
              </form>
            </div>
            <?php
          }
          elseif(isset($_GET['contactsetting'])){
            ?>
<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-id-card-alt"></i> &nbsp; Update Contact Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../include/admin.php" method="post">
                <div class="card-body">


                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-house-user"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Address" class="form-control"  name="address" value="<?=$user_data['address']?>">
                  </div><br/>


                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-inbox"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Email Adresse" class="form-control"  name="email" value="<?=$user_data['email']?>">
                  </div><br/>




                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Mobile Number" class="form-control"  name="mobile" value="<?=$user_data['mobile']?>"">
                  </div><br/>






                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-contact" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
                </div>
              </form>
            </div>

            <div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-share-alt-square"></i> &nbsp; Update Social Media Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../include/admin.php" method="post">
                <div class="card-body">


                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-twitter"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Username Twittter" class="form-control"  name="twitter" value="<?=$user_data['twitter']?>">
                  </div><br/>

                     <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-facebook"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Username Facebbok" class="form-control"  name="facebook" value="<?=$user_data['facebook']?>">
                  </div><br/>


                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-instagram"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Username Instagram" class="form-control"  name="instagram" value="<?=$user_data['instagram']?>">
                  </div><br/>
                 
                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-skype"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Username Skype" class="form-control"  name="skype" value="<?=$user_data['skype']?>">
                  </div><br/>

                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fab fa-linkedin"></i></div>
                        </div>
                    <input type="text" id="exampleInputEmail1" placeholder="Enter Your Username Linkedin" class="form-control"  name="linkedin" value="<?=$user_data['linkedin']?>">
                  </div><br/>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-socialmedia" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp; Save Changes</button>
                </div>
              </form>
            </div>
            <?php
          }
          
          elseif(isset($_GET['changebackground'])){
            ?>
       <div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-images"></i> &nbsp; Change Site Background</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --><br>
              <img src="../images/<?=$user_data['background_img']?>" class="col-6">
              <form role="form"  action="../include/admin.php" form class="was-validated" method="post" enctype="multipart/form-data">
                <div class="card-body">

                
                 <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="background" name="background">
                            <label class="custom-file-label" for="validatedCustomFile">Choose Image Background...</label>
                        <div class="invalid-feedback">invalid custom file feedback</div>
                    </div>
                  
                </div><br/>
                <!-- /.card-body -->
            
                <div class="card-footer">
                  <button type="submit" name="update-background" class="btn btn-primary"><i class="fas fa-edit"></i>&nbsp; Update Background</button>
                </div>
                
                
              </form>
              
            </div>

            <?php
          }
           elseif(isset($_GET['uploadCV'])){
            ?>
<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cloud-upload-alt"></i>&nbsp; Upload Curriculum vitæ</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --><br>
              
              <form role="form" class="was-validated" action="../include/admin.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                 

                  <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="background" name="CV">
                            <label class="custom-file-label" for="validatedCustomFile">Choose Curriculum vitæ...</label>
                        <div class="invalid-feedback">invalid custom file feedback</div>
                    </div>
                </div><br/>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-CV" class="btn btn-primary"><i class="fas fa-edit"></i> &nbsp; Update Curriculum vitæ</button>
                </div>
              </form>
            </div>
            <?php
          }elseif(isset($_GET['seosetting'])){
            ?>


<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-search" aria-hidden="true"></i> &nbsp; Update SEO</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <img src="../images/<?=$user_data['siteicon']?>" class="col-2">
              <form role="form" action="../include/admin.php" method="post" class="was-validated" enctype="multipart/form-data">
                <div class="card-body">


                  <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="siteicon" name="siteicon">
                            <label class="custom-file-label" for="validatedCustomFile">Choose Siteicon...</label>
                        <div class="invalid-feedback">invalid custom file feedback</div>
                    </div>
                  </div><br/>



                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-heading"></i></div>
                        </div>
                    <input type="text" placeholder="Page Title" class="form-control"  name="page_title" value="<?=$user_data['page_title']?>">
                  </div><br/>



                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-globe-asia"></i></div>
                        </div>
                    <input type="text" placeholder="Enter Keywords (separte with ,)" class="form-control"  name="keyword" value="<?=$user_data['keywords']?>">
                  </div><br/>




                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-sticky-note"></i></div>
                        </div>
                    <textarea type="text" placeholder="Description" name="description" class="form-control" id="textAreaExample1"  rows="4"><?=$user_data['description']?></textarea>
                  </div><br/>
       

                  
                  
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-seo" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                </div>
              </form>
            </div>


            <?php
          }elseif(isset($_GET['accountsetting'])){
            ?>
<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-alt"></i> Update Account Setting</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --><br/>
              
              <form role="form" action="../include/admin.php" method="post" class="was-validated" enctype="multipart/form-data">
             
              <div class="alert alert-secondary col-lg-6" role="alert">
                    <h4 class="alert-heading"> <i class="fas fa-info-circle"></i> Email Confirmation !</h4>
                    <p>Please enter your e-mail address. and You will receive an email with instructions on how to verified your adresse Mail.</p>
                        <hr>
                        <p class="mb-0">The email address must be a Real Adresse. to Recover Password if forgot</p>
                </div>
                
              &nbsp;&nbsp;&nbsp; <img src="../images/<?=$user_data['admin_profile']?>" class="col-2 img-fluid">
                <div class="card-body">
                 
                  <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profilepic" name="profilepic">
                            <label class="custom-file-label" for="validatedCustomFile">Choose Image...</label>
                        <div class="invalid-feedback">invalid custom file feedback</div>
                    </div>
                  </div><br/>

                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                        </div>
                    <input type="text" placeholder="Full Name" class="form-control"  name="fullname" value="<?=$user_data['fullname']?>">
                  </div><br/>


                 <?php if(isset($_SESSION["msg"])){
                     echo $_SESSION["msg"];
                     unset($_SESSION["msg"]);
                 } ?>

                  <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                    <input type="email" placeholder="Adresse Mail" class="form-control"  name="Email" value="<?=$user_data['email']?>">
                    <button type="submit" name="sendconfirmation" class="btn btn-outline-success">Send Confirmation Link</button>
                  </div><br/>
                  



                    <div class="input-group">
                     <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-lock"></i></div>
                        </div>
                    <input type="Password" placeholder="Password" disabled class="form-control" name="password" value="<?=$user_data['password']?>"><button type="button" onclick="window.location.href='http://zhairi-azzeddine.rf.gd/admin/changepwd.php','_blank'" id="changepwd" class="btn btn-outline-success">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Change Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                  </div><br/>
                 
                
                  
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-account" class="btn btn-primary"> <i class="fas fa-edit"></i> Update Account</button>
                </div>
              </form>
            </div>

            
            <?php
          }elseif(isset($_GET['message'])){
            ?>
<div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-comment-alt"></i>&nbsp; Messages</h3>
              </div>
              </div>
           </div>
              
    
    <a href="tables(DatatablesJQuery)/messagesTab.php" class="btn btn-outline-primary" ><i class="fas fa-search"></i>&nbsp; Search...</a>
    <button id="exportMSG" type="button" class="btn btn-outline-success"><i class="fas fa-file-export"></i>&nbsp; Export...</button> &nbsp;
    <button id="printMSG" type="button" class="btn btn-outline-info"><i class="fas fa-print"></i>&nbsp; Print</button> &nbsp;
    <button id="deleteallMSG" type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>&nbsp; Delete All</button>

              <div class="table-responsive">
              <div class="card-body p-0">
              <hr/>
                <table class="table table-striped table-bordered" id="messagesData">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Subject</th>
                      <th>Message</th>
                      <th>Date Reception</th>               
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
               <?php $q = "SELECT * from message ORDER BY date_message DESC"; $r=mysqli_query($db,$q);?>
                    
                            
                

      <?php $c =1; while($pi=mysqli_fetch_array($r)){ ?>
                    <tr>
                      <td><?=$c?></td>
                      <td><?=$pi['name']?></td>
                      <td><?=$pi['email']?></td>
                      <td><?=$pi['phone']?></td>
                      <td><?=$pi['subject']?></td>
                      <td><?=$pi['message']?></td>
                      <td><?=$pi['date_message']?></td>
                      <td> <a style="color:#FF0000;" href="../include/deletemessage.php?id=<?=$pi['id']?>"><i class="fas fa-trash-alt"></i></a> </td>
                    </tr>
     <?php $c++; } ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

            <?php
          }elseif(isset($_GET['visitors'])){
            ?>
        <div class="card card-primary col-lg-12">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-network-wired" aria-hidden="true"></i>&nbsp; Visitors information</h3> 
              </div>
           </div>
    </div>
    <button onclick="window.location.href='tables(DatatablesJQuery)/visitorsIP.php'" id="searchIP" type="button" class="btn btn-outline-primary"><i class="fas fa-search"></i>&nbsp; Search...</button> &nbsp;
    
    <a href="export/exportIP.php" class="btn btn-outline-success" target="_blank" ><i class="fas fa-file-export"></i>&nbsp; Export To Excel...</a>
    
    <button id="printIP" type="button" class="btn btn-outline-info"><i class="fas fa-print"></i>&nbsp; Print</button> &nbsp;
    <button  onclick="window.location.href='../include/deleteallvisitors.php'" id="deleteallIP" type="button" class="btn btn-outline-danger"><i class="fas fa-trash-alt"></i>&nbsp; Delete All</button>






              <div class="table-responsive">
              <div class="card-body p-0">
           
              <hr/>
                <table class="table table-striped table-bordered" id="tableIP">
                  <thead>
                    <tr>
                      <th><input type="checkbox" onclick="checkAll()" id="selectall" name="selectall"></th>
                      <th style="width: 10px">#</th>
                      <th>ISP</th>
                      <th>Country</th>
                      <th>Country Code</th>
                      <th>Region Name</th>
                      <th>City</th> 
                      <th>ZIP</th> 
                      <th>Latitude</th> 
                      <th>Longitude</th> 
                      <th>Timezone</th> 
                      <th>ORG</th> 
                      <th>AS</th> 
                      <th>IP</th>
                      <th>OS</th>
                      <th>Browser</th>
                      <th>Device</th> 
                      <th>Time</th>                   
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
$q = "SELECT * from visitors_info ORDER BY time DESC";
$r=mysqli_query($db,$q);
$c =1;
while($pi=mysqli_fetch_array($r)){
  ?>
                    <tr>
                      <td><input type="checkbox" name="case1"></td>
                      <td><?=$c?></td>
                      <td><?=$pi['isp']?></td>
                      <td><?=$pi['country']?></td>
                      <td><?=$pi['countryCode']?></td>
                      <td><?=$pi['regionName']?></td>
                      <td><?=$pi['city']?></td>
                      <td><?=$pi['zip']?></td>
                      <td><?=$pi['latitude']?></td>
                      <td><?=$pi['longitude']?></td>
                      <td><?=$pi['timezone']?></td>
                      <td><?=$pi['org']?></td>
                      <td><?=$pi['as_ip']?></td>
                      <td><?=$pi['ip']?></td>
                      <td><?=$pi['os']?></td>
                      <td><?=$pi['browser']?></td>
                      <td><?=$pi['device']?></td>
                      <td><?=$pi['time']?></td>
                      <td><a style="color:#FF0000;" href="../include/deletevisitor.php?id=<?=$pi['id']?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
  <?php
  $c++;
}
                    ?>
                    
                    
                  </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

              


            <?php
          }
          else{
            ?>
          
          <form method="post" action="../include/admin.php">
        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" name="home" class="custom-control-input" id="customSwitch1"
                      <?php
                      if($user_data['home_section']){
                        echo "checked";
                      }

                      ?>
                      >
                      <label class="custom-control-label" for="customSwitch1">Home Section</label>
                    </div>

                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" name="about" class="custom-control-input" id="customSwitch2"
                      <?php
                      if($user_data['about_section']){
                        echo "checked";
                      }

                      ?>
                      >
                      <label class="custom-control-label" for="customSwitch2">About Section</label>
                    </div>    
                    
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" name="resume" class="custom-control-input" id="customSwitch3"
                      <?php
                      if($user_data['resume_section']){
                        echo "checked";
                      }

                      ?>
                      >
                      <label class="custom-control-label" for="customSwitch3">Resume Section</label>
                    </div>  
                    
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" name="portfolio" class="custom-control-input" id="customSwitch4"
                      <?php
                      if($user_data['portfolio_section']){
                        echo "checked";
                      }

                      ?>
                      >
                      <label class="custom-control-label" for="customSwitch4">Portfolio Section</label>
                    </div>   

                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" name="services" class="custom-control-input" id="customSwitch6"
                      <?php
                      if($user_data['services_section']){
                        echo "checked";
                      }

                      ?>
                      >
                      <label class="custom-control-label" for="customSwitch6">Services Section</label>
                    </div>   



                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" name="contact" class="custom-control-input" id="customSwitch5"
                      <?php
                      if($user_data['contact_section']){
                        echo "checked";
                      }

                      ?>
                      >
                      <label class="custom-control-label" for="customSwitch5">Contact Section</label>
                    </div> <br/>
                    
                    <input type="submit" class="btn btn-sm btn-primary" name="update-section" value="Save Changes">
                   
          </form>
<?php
          }
?>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">ZHAIRI AZZEDDINE</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

</body>
</html>
<script>
     $(document).ready(function(){$('#tableIP').DataTable();});
</script>  



