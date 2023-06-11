<?php
@session_start();
if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
   header("Location: /login.php");
   exit();
}
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/variable.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<?php include("inc/head.php"); ?>
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
        <?php include("inc/navbar.php"); ?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->        
        <?php include("inc/header.php"); ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************--> 
        <?php include("inc/sidebar.php"); ?>  
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
                            <li class="breadcrumb-item active"><a href="/admin/index.php">Arayüz</a></li>
                        </ol>
                    </div>
                </div>
             <div class="row">   
            <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="fa fa-server" aria-hidden="true"></i>
                                Sunucu Bilgileri</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="font-weight: bold;color: red">Sunucu Adı: <span style="color: black; text-align: right"><?php echo $hostName;?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">IP Adresi: <span style="color: black; text-align: right"><?php echo $ipAddress;?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">İşletim Sistemi: <span style="color: black; text-align: right"><?php echo $operatingSystem;?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">Versiyon: <span style="color: black; text-align: right"><?php echo $linuxVersion;?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">Dağıtım: <span style="color: black; text-align: right"><?php echo $distributeOS;?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="fa fa-outdent" aria-hidden="true"></i>
                                Donanım Bilgileri</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="font-weight: bold;color: red">CPU: <span style="color:black"> <?php echo $cpuName;?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">Çekirdek: <span style="color:black"><?php echo $cpuCoreCount;?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">Bellek Miktarı: <span style="color:black"><?php echo $alloctedMemory . "MB";?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">Disk Alanı: <span style="color:black"><?php echo $diskTotalSpace;?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: red">Ağ Kartı: <span style="color:black"><?php echo $networkCard;?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><i class="fa fa-empire" aria-hidden="true"></i>
                                Protokoller</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-list-group">
                                    <ul class="list-group">
                                        <li class="list-group-item" style="font-weight: bold;color: grey">HTTP (Web Sunucu): <?php
                                         if (trim($webServer) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?>
                                         </li>
                                        <li class="list-group-item" style="font-weight: bold;color: grey">FTP (Dosya Erişimi): <span style="color:black"><?php 
                                        if (trim($ftpService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                        ?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: grey">SSH (Uzak Bağlantı): <span style="color:black"><?php 
                                        if (trim($sshService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                        ?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: grey">SMTP (Mail Sunucu): <span style="color:black"><?php 
                                        if (trim($smtpService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                        ?></span></li>
                                        <li class="list-group-item" style="font-weight: bold;color: grey">NFS Sunucu (Dosya Ağı): <span style="color:black"><?php 
                                        if (trim($nfsServer) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                        
                                        ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
        <?php include("inc/footer.php"); ?>
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
    <?php include("inc/scripts.php"); ?>
    

</body>

</html>