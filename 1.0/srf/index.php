<?php
error_reporting(0);
include('includes/config.php'); 
?>


<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>SRS Portal |   SRFS</title>
      <link rel="icon" type="image/x-icon" href="assets/images/logo1.jpg">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">
     
   </head>
   <body>
      <header>
         <div class="topbar d-none d-md-block">
            <div class="container">
               <div class="top-sec d-grid">
                     <ul  class="d-flex list-unstyled m-0 left-info">
                        <li>
                           <span class="fa fa-phone text-white me-2"></span><a href="tel:+233 0302 522 370">+233 0302 522 370</a>
                        </li>
                        <li class="">
                           <a href="#help" class="d-md-block d-none">Help Center</a>
                        </li>
                        <li class="">
                           <a href="mailto:info@solidrockfoundationschools.com" class="d-md-block d-none">info@solidrockfoundationschools.com</a>
                        </li>
                     </ul>
                  <div>
                     <ul class="d-flex  list-unstyled align-items-center m-0 right-info">
                     <li>
                           <a href="https://web.facebook.com/solidrockfoundationschools/"><span class="fab fa-facebook-f"></span></a>
                        </li>
                        <li>
                           <a href="https://twitter.com/solidrockfs"><span class="fab fa-twitter"></span></a>
                        </li>
                        <li>
                           <a href="https://www.instagram.com/solidrockfoundationsschools/"><span class="fab fa-instagram"></span></a>
                        </li>
                        <li class="mr-0">
                           <a href="https://www.youtube.com/channel/UC-cJXR4LKzXbGLiu7YAxLnw"><span class="fab fa-youtube"></span></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

         <nav class="navbar navbar-expand-lg bg-white">
          <div class="container">
          <a class="navbar-brand" href="#">
             <img src="assets/images/logo.jpg" style="height: 70px; border-radius: 100%;">
              </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" title="click here to check your results" href="find-result.php">Students</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" title="non-staff member should login"  href="teacher-login.php">Teachers</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" title="only meant for the administrator"  href="admin-login.php">Admin</a>
                </li>
              </ul>
              <form class="d-flex" role="search">
                <button class="btn btn-danger" type="submit" href="https://solidrockfoundationschools.com">Search</button>
              </form>
            </div>
          </div>
        </nav>
      </header>
      <section style="max-width: 5000px;" class="main-slider">
    <div class="owl-carousel owl-theme" id="slider">
        <div class="item">
            <div class="banner-view banner-top1" style="background-image: url('assets/images/slide_2.png'); background-size: cover; background-position: center; height: 500px; display: flex; align-items: center; justify-content: center; text-align: center;">
            </div>
        </div>
    </div>
</section>

     
      <section class="py-5 about"> 
        <div class="container">
          <div class="row ">
           <div class="col-md-6 ">
            <h3 class="title-big mx-0">Notice Board</h3>
                 <marquee direction="up"  onmouseover="this.stop();" onmouseout="this.start();" class="mt-5">
                   <ul class="">
 <?php $sql = "SELECT * from tblnotice";
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                      
<li><a href="notice-details.php?nid=<?php echo htmlentities($result->id);?>" target="_blank" class="text-dark"><?php echo htmlentities($result->noticeTitle);?></li>
<?php }} ?>

                   </ul>
               </marquee>
                </div>
            <div class="col-md-6">
            <img src="assets/images/notice-board.jpg" class="img-fluid" style="border-radius: 100px;">
            </div>
          </div>
        </div>
      </section>
   
<footer class="footer pt-5">
          <div class="container py-5">  
              <div class="col-lg-4 col-md-6 col-sm-7 footer-list-29 footer-4 mt-lg-0 mt-5">
                <h6 class="footer-title-29">Contact Info </h6>
                <p>Address : P.O. Box 16198 K.I.A. Accra,Ghana</p>
                <p class="mt-2">Phone : <a href="tel:+233 0302 522 370">+233 0302 522 370</a></p>
                <p class="mt-2">Email : <a href="mailto: info@solidrockfoundationschools.com"> info@solidrockfoundationschools.com</a></p>
                <p class="mt-2">Support : <a href="mailto: info@solidrockfoundationschools.com"> info@solidrockfoundationschools.com</a></p>
              </div>
            </div>
          </div>
        <!-- copyright -->
        <section class="w3l-copyright text-center">
          <div class="container">
            <p class="copy-footer-29">Copyright &copy; Score Record System <?php echo date('Y');?></p>
          </div>
      </section>
      </footer>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

      <script src="assets/js/main.js"></script>
   </body>
</html>