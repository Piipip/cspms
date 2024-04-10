
<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['alogin']) == "") {   
    header("Location: index.php"); 
} else {
    if (isset($_POST['submit'])) {
        $marks = array();
        $class = $_POST['class'];
        $studentid = $_POST['studentid']; 
        $termid = $_POST['termid'];
        $semester = $_POST['semesterid'];
        $year = $_POST['yearid'];
        $mark = $_POST['marks'];

        // Check if result already exists for the selected student, in the chosen semester, term, and year
        $sql = "SELECT * FROM tblresult WHERE StudentId = :studentid AND ClassId = :class AND TermId = :termid AND SemesterId = :semester AND YearId = :year";
        $query = $dbh->prepare($sql);
        $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
        $query->bindParam(':class', $class, PDO::PARAM_STR);
        $query->bindParam(':termid', $termid, PDO::PARAM_STR);
        $query->bindParam(':semester', $semester, PDO::PARAM_STR);
        $query->bindParam(':year', $year, PDO::PARAM_STR);
        $query->execute();
        $count = $query->rowCount();

        if ($count > 0) {
            // If result already exists for the selected student, display an error message
            $error = "Result for this student in the selected semester, term, and year already exists.";
        } else {
            // Otherwise, proceed with inserting the result
            $stmt = $dbh->prepare("SELECT tblsubjects.SubjectName, tblsubjects.id FROM tblsubjectcombination JOIN tblsubjects ON tblsubjects.id = tblsubjectcombination.SubjectId WHERE tblsubjectcombination.ClassId = :cid ORDER BY tblsubjects.SubjectName");
            $stmt->execute(array(':cid' => $class));
            $sid1 = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($sid1, $row['id']);
            } 

            for ($i = 0; $i < count($mark); $i++) {
                $mar = $mark[$i];
                $sid = $sid1[$i];

                // Insert the result
                $sql = "INSERT INTO tblresult(StudentId, ClassId, TermId, SemesterId, YearId, SubjectId, marks) VALUES(:studentid, :class, :termid, :semester, :year, :sid, :marks)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':studentid', $studentid, PDO::PARAM_STR);
                $query->bindParam(':class', $class, PDO::PARAM_STR);
                $query->bindParam(':termid', $termid, PDO::PARAM_STR);
                $query->bindParam(':semester', $semester, PDO::PARAM_STR);
                $query->bindParam(':year', $year, PDO::PARAM_STR);
                $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                $query->bindParam(':marks', $mar, PDO::PARAM_STR);
                $query->execute();
                $lastInsertId = $dbh->lastInsertId();
                if ($lastInsertId) {
                    $msg = "Result info added successfully";
                } else {
                    $error = "Something went wrong. Please try again";
                }
            }
        }
    }
}
?>



        <script>
function getStudent(val) {
    $.ajax({
    type: "POST",
    url: "get_student.php",
    data:'classid='+val,
    success: function(data){
        $("#studentid").html(data);
        
    }
    });
$.ajax({
        type: "POST",
        url: "get_student.php",
        data:'classid1='+val,
        success: function(data){
            $("#subject").html(data);
            
        }
        });
}
    </script>
<script>

function getresult(val,clid) 
{   
    
var clid=$(".clid").val();
var val=$(".stid").val();;
var abh=clid+'$'+val;
//alert(abh);
    $.ajax({
        type: "POST",
        url: "get_student.php",
        data:'studclass='+abh,
        success: function(data){
            $("#reslt").html(data);
            
        }
        });
}
</script>


   
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
                                    <h2 class="title">Declare Result</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Result</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <section class="section">
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                           
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                                <form class="" method="post">

 <div class="form-group">
<label for="default" class="control-label">Class</label>
 <select name="class" class="form-control clid" id="classid" onChange="getStudent(this.value);" required="required">
<option value="">Select Class</option>
<?php $sql = "SELECT * from tblclasses";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->ClassName); ?>&nbsp; Section-<?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
 </select>
                                                    </div>
<div class="form-group">
                                                        <label for="date" class=" control-label ">Student Name</label>
                                                    <select name="studentid" class="form-control stid" id="studentid" required="required" onChange="getresult(this.value);">
                                                    </select>
                                                    </div>

                                                    <div class="form-group">
                                                      
                                                    <div  id="reslt">
                                                    </div>
                                                    </div>
                                                   
                                                    <div class="form-group">
    <label for="termid" class="control-label">Term</label>
    <select name="termid" class="form-control" id="termid" required="required">
        <option value="">Select Term</option>
       <?php $sql = "SELECT * from tblterms";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->term); ?>&nbsp; <?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
    </select>
</div>


 <div class="form-group">
    <label for="semesterid" class="control-label">Semester</label>
    <select name="semesterid" class="form-control" id="semesterid" required="required">
        <option value="">Select Semester</option>
        <?php $sql = "SELECT * from tblsemesters";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->semester); ?>&nbsp; <?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
    </select>
</div>
<div class="form-group">
    <label for="yearid" class="control-label">Year</label>
    <select name="yearid" class="form-control" id="yearid" required="required">
        <option value="">Select Year</option>
        <?php $sql = "SELECT * from tblyear";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>
<option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->year); ?>&nbsp; <?php echo htmlentities($result->Section); ?></option>
<?php }} ?>
    </select>
</div>
                                                    
<div class="form-group">
                                                        <label for="date" class="control-label">Subjects</label>
                                                    <div  id="subject">
                                                    </div>
                                                    </div>


                                                    
                                                    <div class="form-group">
                                                            <button type="submit" name="submit" id="submit" class="btn btn-success">Declare Result</button>
                                                
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




