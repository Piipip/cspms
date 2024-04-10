<style>
    /* Custom CSS to make text visible and black */
    .form-group label.control-label {
        color: black !important;
    }
</style>
<?php
session_start();
//error_reporting(0);
include('includes/config.php');
?>
<!-- ========== TOP NAVBAR ========== -->
<?php include('includes/topbar.php');?>
<!-----End Top bar-->
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
                        <h2 class="title">Login</h2>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row breadcrumb-div">
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#">Student Performance</a></li>
                            <li class="active">Academic Performance</li>
                        </ul>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <section class="section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h5>Student Details</h5>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <form action="student-performance-analysis.php" method="post" class="admin-login">
                                        <div class="form-group">
                                            <label for="rollid" class="control-label">Roll ID</label>
                                            <div>
                                                <input type="text" name="rollid" class="form-control" required="required" id="rollid">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="default" class="control-label">Class</label>
                                            <select name="class" class="form-control" id="default" required="required">
                                                <option value="">Select Class</option>
                                                <?php
                                                $sql = "SELECT * from tblclasses";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                        ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="default" class="control-label">Term</label>
                                            <select name="term" class="form-control" id="default" required="required">
                                                <option value="">Select Term</option>
                                                <?php
                                                $sql = "SELECT * from tblterms";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                        ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->term); ?>  </option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="default" class="control-label">Semester</label>
                                            <select name="semester" class="form-control" id="default" required="required">
                                                <option value="">Select Semester</option>
                                                <?php
                                                $sql = "SELECT * from tblsemesters";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                        ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->semester); ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div style="padding:2px">
                                                <button type="submit" name="submit" class="btn btn-success">Performance Analysis</button>
                                            </div>
                                           
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-8 col-md-offset-2 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.section -->
        </div>
        <!-- /.main-page -->
    </div>
    <!-- /.content-container -->
</div>
<!-- /.content-wrapper -->
<script>
    $(function(){
        $('input.flat-blue-style').iCheck({
            checkboxClass: 'icheckbox_flat-blue'
        });
    });
</script>
<?php include('includes/footer.php');?>

