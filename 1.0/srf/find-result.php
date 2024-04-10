<?php
session_start();
// Include necessary configuration file
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login</title>
    <link rel="icon" type="image/x-icon" href="assets/images/logo.jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate-css/animate.min.css" media="screen">
    <!-- iCheck CSS -->
    <link rel="stylesheet" href="assets/css/icheck/skins/flat/blue.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/main.css" media="screen">
    <!-- Modernizr JS -->
    <script src="assets/js/modernizr/modernizr.min.js"></script>
    <style>
        body {
            background-image: url(assets/images/result.jpg);
            background-color: #ffffff;
            background-size: cover;
            height: 100%;
            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <div class="login-bg-color">
            <div class="row">
                <div class="col-md-4 col-md-offset-7">
                    <div class="panel login-box" style="background: #172541;">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <a href="#">
                                    <img style="height: 70px; border-radius: 100%;" src="assets/images/logo.jpg">
                                    <h3 class="text-white">Score Record System</h3>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                            <form action="result.php" method="post" class="admin-login">
                                <div class="form-group">
                                    <label for="rollid" class="control-label">Enter your Roll Id</label>
                                    <input type="text" class="form-control" id="rollid" placeholder="Enter Your Roll Id" autocomplete="off" name="rollid">
                                </div>
                                <div class="form-group">
                                    <label for="class" class="control-label">Class</label>
                                    <select name="class" class="form-control" id="class" required="required">
                                        <option value="">Select Class</option>
                                        <?php 
                                        $sql = "SELECT * FROM tblclasses";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if($query->rowCount() > 0) {
                                            foreach($results as $result) { ?>
                                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="term" class="control-label">Term</label>
                                    <select name="term" class="form-control" id="term" required="required">
                                        <option value="">Select Term</option>
                                        <?php 
                                        $sql = "SELECT * FROM tblterms";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if($query->rowCount() > 0) {
                                            foreach($results as $result) { ?>
                                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->term); ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="semester" class="control-label">Semester</label>
                                    <select name="semester" class="form-control" id="semester" required="required">
                                        <option value="">Select Semester</option>
                                        <?php 
                                        $sql = "SELECT * FROM tblsemesters";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        if($query->rowCount() > 0) {
                                            foreach($results as $result) { ?>
                                                <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->semester); ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group mt-20">
                                    <div>
                                        <button type="submit" class="btn" style="color: #172541;">Search</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <a href="index.php" class="text-white">Back to Home</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-md-6 col-md-offset-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /. -->
    </div>
    <!-- /.main-wrapper -->

    <!-- Common JS Files -->
    <script src="assets/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/js/pace/pace.min.js"></script>
    <script src="assets/js/lobipanel/lobipanel.min.js"></script>
    <script src="assets/js/iscroll/iscroll.js"></script>

    <!-- Page JS Files -->
    <script src="assets/js/icheck/icheck.min.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/main.js"></script>
    <script>
        $(function(){
            $('input.flat-blue-style').iCheck({
                checkboxClass: 'icheckbox_flat-blue'
            });
        });
    </script>
    
</body>
</html>
