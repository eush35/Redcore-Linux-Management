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
    <script src="https://cdn.jsdelivr.net/npm/xterm/dist/xterm.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/xterm/dist/xterm.css" rel="stylesheet" />
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
                            <li class="breadcrumb-item active"><a href="/admin/data/tools/connections/index.php">Bağlantılar</a></li>
                        </ol>
                    </div>
                </div>
                <h1>Sunucu Terminal Ekranı</h1>
                <hr>
            <div id="terminal"></div>
            <script>
            let ip = location.hostname || "127.0.0.1";
            let wsUrl = 'ws://' + ip + ':8080';
            let socket = new WebSocket(wsUrl);

            socket.onmessage = function(event) {
                term.write(event.data);
            };

            const term = new Terminal();
            term.open(document.getElementById('terminal'));

            term.onData(function(data) {
                socket.send(data);
            });
            </script>
            <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4> ☼ Basit Komutlar</h4>
                            <p></p>
                            <ol style="font-size:16px;">
                        <li>
                            <span style="color: red; font-weight: bold;">→ ls:</span> <span style="color: black; font-weight: bold;">Mevcut dizindeki dosyaları ve klasörleri listeler.</span>
                        </li>
                        <li>
                            <span style="color: red;font-weight: bold;">→ cd:</span> <span style="color: black; font-weight: bold;">Dizin değiştirir.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ pwd:</span> <span style="color: black; font-weight: bold;">Şu anki çalışma dizinini gösterir.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ mkdir:</span> <span style="color: black; font-weight: bold;">Yeni bir klasör oluşturur.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ rm:</span> <span style="color: black; font-weight: bold;">Dosya veya klasörü siler.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ cp:</span> <span style="color: black; font-weight: bold;">Dosyaları veya klasörleri kopyalar.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ mv:</span> <span style="color: black; font-weight: bold;">Dosyaları veya klasörleri taşır veya yeniden adlandırır.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ touch:</span> <span style="color: black; font-weight: bold;">Yeni bir dosya oluşturur veya mevcut dosyanın değiştirilme zamanını günceller.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ cat:</span> <span style="color: black; font-weight: bold;">Dosyanın içeriğini terminale yazdırır.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ grep:</span> <span style="color: black; font-weight: bold;">Belirli bir deseni arar ve eşleşen satırları gösterir.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ chmod:</span> <span style="color: black; font-weight: bold;">Dosyanın veya klasörün izinlerini değiştirir.</span>
                        </li>
                        <li>
                            <span style="color: red; font-weight: bold;">→ man:</span> <span style="color: black; font-weight: bold;">Bir komutun kullanımını ve belgelendirmesini gösterir.</span>
                        </li>
                        </ol>
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
    <script src="/admin/module/websocket.js"></script>
</body>

</html>