<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solid Rock Foundation School</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/logo.jpg">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="assets/css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="assets/css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="assets/css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="assets/css/main.css" media="screen">
    <link rel="stylesheet" href="assets/css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Custom styles -->
    <style>
        /* Error message styling */
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        
        /* Success message styling */
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>
<body class="top-navbar-fixed">

    <!-- Main wrapper -->
    <div class="main-wrapper">
        
        <!-- Top navigation bar -->
        <nav class="navbar top-navbar bg-white">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <!-- Small navigation handle -->
                        <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                        <!-- Navbar toggle button for collapsed state -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <!-- Mobile navbar toggle button -->
                        <button type="button" class="navbar-toggle mobile-nav-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- /.navbar-header -->

                    <!-- Navbar collapse section -->
                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <!-- Logout link -->
                            <li>
                                <a href="logout.php" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        
        <!-- Page content -->
        <div id="page"></div>
        <!-- Loading spinner -->
        <div id="loading"></div>
        
    </div>
    <!-- /.main-wrapper -->
    
</body>
</html>
