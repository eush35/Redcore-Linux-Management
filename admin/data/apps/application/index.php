<?php
@session_start();
if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
   header("Location: /login.php");
   exit();
}
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/head.php'); ?>
</head>
<body>
     <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Navbar start
        ***********************************-->
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/navbar.php'); ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->        
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/header.php'); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************--> 
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/sidebar.php'); ?> 
        <!--**********************************
            Sidebar end
        ***********************************--> 
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Redcore Yönetim Arayüzü</h4>
                            <p></p>
                            <span class="ml-1">Tercih ettiğiniz için teşekkür ederiz.</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/index.php">Redcore</a></li>
                            <li class="breadcrumb-item active"><a href="/admin/data/apps/application/index.php">Uygulamalar</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            </div>
        
        <!--**********************************
            Content body end
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/footer.php'); ?> 
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/scripts.php'); ?>

</body>

</html>