<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == "") {   
    header("Location: index.php"); 
} else {
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);  

        $sql = "INSERT INTO  tblteachers(Teacher,Password) VALUES(:username,:password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        if($query->execute()) {
            $msg = "Teacher account added successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }
?>

<!-- ========== TOP NAVBAR ========== -->
<?php include('includes/topbar.php');?> 

<!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
<div class="content-wrapper">
    <div class="content-container">
        <!-- ========== LEFT SIDEBAR ========== -->
        <?php include('includes/leftbar.php');?>  
        <!-- /.left-sidebar -->

        <div class="main-page">
            <div class="container-fluid">
                <div class="row page-title-div">
                    <div class="col-md-6">
                        <h2 class="title">Create Account For Teachers</h2>
                    </div>
                    <!-- /.col-md-6 text-right -->
                </div>
                <!-- /.row -->
                <div class="row breadcrumb-div">
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="active">Create Teacher Account</li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <section class="section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h5>Fill the Teacher Info</h5>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <?php if($msg){?>
                                    <div class="alert alert-success left-icon-alert" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                    <?php } else if($error){?>
                                    <div class="alert alert-danger left-icon-alert" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                    <?php } ?>
                                    <form class="row" method="post">
                                        <div class="form-group col-md-6">
                                            <label for="username" class="control-label">Teacher Email</label>
                                            <input type="text" name="username" class="form-control" id="username" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password" class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" required="required" autocomplete="off">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" name="submit" class="btn btn-success">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->
<?php include('includes/footer.php');?>
<?php } ?>
