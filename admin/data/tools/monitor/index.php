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
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/head.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/simple-gauge/dist/simple-gauge.min.js"></script>
</head>
<script> 
    let ip = location.hostname || "127.0.0.1";
    let wsUrl = 'ws://' + ip + ':8081';
    let socket = new WebSocket(wsUrl);

    socket.onmessage = function(event) {
    const data = JSON.parse(event.data);
    const cpuPercentUsage = data.cpuUsage.toFixed(2) + '%';
    const ramPercentUsage = data.ramUsage.toFixed(2) + '%';
    const diskStats = data.diskStats;
    const diskOkuma = data.diskOkuma;
    const diskYazma = data.diskYazma;
    document.getElementById("cpuPercentUsage").innerHTML = cpuPercentUsage;
    document.getElementById("ramPercentUsage").innerHTML = ramPercentUsage;
    document.getElementById("diskOkuma").innerHTML = diskOkuma;
    document.getElementById("diskYazma").innerHTML = diskYazma;
    };
    </script>
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
                            <li class="breadcrumb-item active"><a href="/admin/data/tools/monitor/index.php">Monitor</a></li>
                        </ol>
                    </div>
                </div>
                <h1 style="font-size: 40px;font-weight: bold;color: green;text-align: center;"> <?php echo $hostName;?></h1>
                <h1 style="font-size: 40px;font-weight: bold;color: red;text-align: center;"> <?php echo $ipAddress;?></h1>
                <hr> </hr>
                <h1> Sistem Bilgileri </h1>
                <hr></hr>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">CPU Adı </div>
                                    <div class="stat-digit"><?php echo $cpuName; ?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">CPU Çekirdek</div>
                                    <div class="stat-digit"><?php echo $cpuCoreCount; ?></div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">CPU Saati</div>
                                    <div class="stat-digit"><?php echo $cpuClock . "MHZ"; ?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                <div class="stat-text">Yüklü Bellek</div>
                                    <div class="stat-digit"><?php echo $alloctedMemory . "MB"; ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>
                <hr></hr>
                <h1> Kullanım İstatistikleri</h1>
                <hr></hr>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">CPU Kullanımı</div>
                                    <div class="stat-digit" id="cpuPercentUsage"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">RAM Kullanımı</div>
                                    <div class="stat-digit" id="ramPercentUsage">
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Disk Kullanımı [R/W]</div>
                                    <div class="stat-digit"><span id="diskOkuma"></span>/<span id="diskYazma"></span></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Ağ Kullanımı</div>
                                    <div class="stat-digit"><?php echo $networkUsagePercent . "%";?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Takas Alanı</div>
                                    <div class="stat-digit"><?php echo $swapMemory . "MB"; ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Çalışan Servisler</div>
                                    <div class="stat-digit"><?php echo $serviceActiveCount; ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Maskelenmiş Servisler</div>
                                    <div class="stat-digit"><?php echo $serviceMaskedCount; ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Durdurulmuş Servisler</div>
                                    <div class="stat-digit"><?php echo $serviceFailedCount; ?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>

                
                <hr></hr>
                <h1> Disk Bilgileri </h1>
                <hr></hr>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Disk Toplam Alanı </div>
                                    <div class="stat-digit"><?php echo $diskTotalSpace; ?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Disk Kullanılan Alanı</div>
                                    <div class="stat-digit"><?php echo $diskUsedSpace; ?></div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Disk Boş Alanı</div>
                                    <div class="stat-digit"><?php echo $diskFreeSpace; ?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text" id="sonuc">Disk Doluluk [%]</div>
                                    <div class="stat-digit"><?php echo $diskUsagePercent;?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                </div>

                <!-- <hr></hr>
                <h1> Genişletilmiş CPU Bilgileri</h1>
                <hr></hr>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Core </div>
                                    <div class="stat-digit"><?php echo $cpuCoreid; ?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Sistem Zamanı</div>
                                    <div class="stat-digit"><?php echo $cpuSystemtime; ?></div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Öncelikli İşlemler Zamanı</div>
                                    <div class="stat-digit"><?php echo $cpuNicetime; ?></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text" id="sonuc">Disk Okuma/Yazma</div>
                                    <div class="stat-digit"><?php echo $diskRWInfo;?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card 
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text" id="sonuc">Disk Okuma/Yazma</div>
                                    <div class="stat-digit"><?php echo $diskRWInfo;?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card 
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text" id="sonuc">Disk Okuma/Yazma</div>
                                    <div class="stat-digit"><?php echo $diskRWInfo;?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card 
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text" id="sonuc">Disk Okuma/Yazma</div>
                                    <div class="stat-digit"><?php echo $diskRWInfo;?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card 
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text" id="sonuc">Disk Okuma/Yazma</div>
                                    <div class="stat-digit"><?php echo $diskRWInfo;?></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
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
    <script src="/admin/module/command.js"></script>
<script> 
</script>
</body>

</html>