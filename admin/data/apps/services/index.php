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
                            <li class="breadcrumb-item active"><a href="/admin/data/apps/services.index.php">Servisler</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <hr></hr>
            <h2 style="text-align:center;">Sistem Servisleri<h2>
            <hr></hr>
            <div class="row">
            <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">SSH Servisi -> <?php
                                         if (trim($sshService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">SSH: SSH, uzaktan erişim için kullanılan bir güvenli iletişim protokolüdür. SSH, güvenli bir şekilde dosya transferi yapmak, uzaktan komut çalıştırmak ve diğer ağ işlemlerini gerçekleştirmek için kullanılır.</p>
                                
                            </div>
                            <div class="card-body">

                            <button type="button" class="btn btn-success" onclick="sshStart()">Başlat</button>
                                <span></span>
                                <script>
                                function sshStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ssh/start-ssh.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-success" onclick="sshRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function sshRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ssh/restart-ssh.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="sshMask()">Maskele</button>
                                <span></span>
                                <script>
                                function sshMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ssh/mask-ssh.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="sshStop()">Durdur</button>
                                <script>
                                function sshStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ssh/stop-ssh.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">FTP Servisi [vsftpd]-> <?php
                                         if (trim($ftpService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">FTP, dosya transfer protokolüdür. FTP, bir sunucuya bağlanarak dosyaları indirme veya yükleme işlemi yapmak için kullanılır. Kullanıcı yönetimi ile dosyalara öznitelikte kullanıcı tanımlayabilirsiniz.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="ftpStart()">Başlat</button>
                                <span></span>
                                <script>
                                function ftpStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ftp/start-ftp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="ftpStop()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function ftpStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ftp/restart-ftp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="ftpMask()">Maskele</button>
                                <span></span>
                                <script>
                                function ftpMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ftp/mask-ftp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="ftpStop()">Durdur</button>
                                <script>
                                function ftpStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/ftp/stop-ftp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">HTTP Servisi-> <?php
                                         if (trim($webServer) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">HTTP, web sayfaları için kullanılan bir protokoldür. HTTPS ise, güvenli web sayfaları için kullanılan bir protokoldür. Bu protokoller, internet tarayıcıları tarafından kullanılır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="ApacheServiceStart2()">Başlat</button>
                                <span></span>
                                <script>
                                function ApacheServiceStart2() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/start-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="ApacheServiceRestart2()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function ApacheServiceRestart2() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/restart-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="ApacheServiceMask2()">Maskele</button>
                                <span></span>
                                <script>
                                function ApacheServiceMask2() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/mask-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="ApacheServiceStop2()">Durdur</button>
                                <script>
                                function ApacheServiceStop2() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/stop-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">DNS Servisi [bind9]-> <?php
                                         if (trim($dnsService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">DNS, alan adı sistemidir. DNS sunucuları, alan adlarını IP adreslerine dönüştürmek için kullanılır. Bind dns uygulaması ile kontrol sağlanmaktadır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="DNSServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function DNSServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/dns/start-dns.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="DNSServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function DNSServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/dns/restart-dns.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="DNSServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function DNSServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/dns/mask-dns.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="DNSServiceStop()">Durdur</button>
                                <script>
                                function DNSServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/dns/stop-dns.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">SMTP/POP3/IMAP Servisi [postfix]-> <?php
                                         if (trim($smtpService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">Bu protokoller, e-posta iletişimi için kullanılır. SMTP, e-posta göndermek için kullanılırken, POP3 ve IMAP ise, e-posta almak için kullanılır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="SMTPServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function SMTPServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/smtp/start-smtp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                    
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="SMTPServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function SMTPServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/smtp/restart-smtp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="SMTPServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function SMTPServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/smtp/mask-smtp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="SMTPServiceStop()">Durdur</button>
                                <script>
                                function SMTPServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/smtp/stop-smtp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">SNMP Servisi -> <?php
                                        if (trim($snmpService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?> </h4>
                                <p class="m-0 subtitle">SNMP, ağ yönetimi için kullanılan bir protokoldür. SNMP, ağ cihazlarının izlenmesi ve yönetilmesi için kullanılır. Snmpd ve snmpwalk ile kontrol sağlanmaktadır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="SNMPServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function SNMPServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/snmp/start-snmp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="SNMPServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function SNMPServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/snmp/restart-snmp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="SNMPServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function SNMPServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/snmp/mask-snmp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="SNMPServiceStop()">Durdur</button>
                                <script>
                                function SNMPServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                    console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/snmp/stop-snmp.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                <hr></hr>
            <h2 style="text-align:center;">Web Servisleri<h2>
            <hr></hr>
            <div class="row">
            <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Apache Servisi -> <?php
                                         if (trim($webServer) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">Apache web server, açık kaynak kodlu ve ücretsiz bir web sunucusu yazılımıdır. İnternet üzerindeki birçok web sitesinde kullanılmaktadır.</p>
                                
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-success" onclick="ApacheServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function ApacheServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/start-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="ApacheServiceRestart()">Yeniden Yükle</button>
                                <script>
                                function ApacheServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/restart-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <span></span>
                                <button type="button" class="btn btn-primary" onclick="ApacheServiceMask()">Maskele</button>
                                <script>
                                function ApacheServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/mask-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <span></span>
                                <button type="button" class="btn btn-danger" onclick="ApacheServiceStop()" >Durdur</button>
                                <script>
                                function ApacheServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/stop-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Nginx Servisi -> <?php
                                        if (trim($nginxService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">Nginx, hızlı, hafif ve yüksek performanslı bir web sunucusu yazılımıdır. Genellikle yüksek trafikli sitelerde tercih edilir ve açık kaynak kodlu olarak dağıtılır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="nginxServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function nginxServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/nginx/start-nginx.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="nginxServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function nginxServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/nginx/restart-nginx.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="nginxServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function nginxServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/nginx/mask-nginx.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="nginxServiceStop()">Durdur</button>
                                <script>
                                function nginxServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/nginx/stop-nginx.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                            
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Varnish Servisi -> <?php
                                         if (trim($varnishService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?> </h4>
                                <p class="m-0 subtitle">HTTP hızlandırıcısı ve ters proxy özellikleri sunan açık kaynak kodlu bir yazılımdır. Özellikle yüksek trafikli web sitelerinde performansı artırmak için kullanılır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="varnishServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function varnishServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/varnish/start-varnish.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="varnishServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function varnishServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/varnish/restart-varnish.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="varnishServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function varnishServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/varnish/mask-varnish.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger">Durdur</button>
                                <script>
                                function ApacheServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/start-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <hr></hr>
                    <h2 style="text-align:center;">Uygulama Servisleri<h2>
            <hr></hr>
            <div class="row">
            <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">MySQL Servisi -> <?php
                                         if (trim($mysqlService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">bir veritabanı yönetim sistemi (DBMS) olarak kullanılan açık kaynaklı bir yazılımdır. MySQL, dünya genelinde birçok web uygulamasında kullanılan en popüler veritabanı yönetim sistemlerinden biridir.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="mysqlServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function mysqlServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mysql/start-mysql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="mysqlServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function mysqlServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mysql/restart-mysql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="mysqlServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function mysqlServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mysql/mask-mysql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="mysqlServiceStop()">Durdur</button>
                                <script>
                                function mysqlServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mysql/stop-mysql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    var cikti = 'İşlem başarıyla gerçekleşti, yönlendiriliyorsunuz.'
                                    document.getElementById("bildirim10").innerHTML = cikti;
                                }
                                </script>
                                
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">PostgreSQL Servisi -> <?php
                                         if (trim($postgresqlService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?></h4>
                                <p class="m-0 subtitle">İlişkisel bir veritabanı yönetim sistemi (RDBMS) olarak kullanılan açık kaynaklı bir yazılımdır. PostgreSQL, yüksek performanslı ve ölçeklenebilir bir veritabanı çözümüdür ve birçok büyük ölçekli uygulama tarafından tercih edilmektedir.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="postgresqlServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function postgresqlServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/postgresql/start-postgresql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="postgresqlServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function postgresqlServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/postgresql/restart-postgresql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="postgresqlServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function postgresqlServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/postgresql/mask-postgresql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="postgresqlServiceStop()">Durdur</button>
                                <script>
                                function postgresqlServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/postgresql/stop-postgresql.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">MongoDB Servisi -> <?php
                                        if (trim($mongodbService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?> </h4>
                                <p class="m-0 subtitle">MongoDB, NoSQL tabanlı, belge odaklı bir veritabanı yönetim sistemidir. Ölçeklenebilir ve yüksek performanslı bir çözüm sunarken, JSON benzeri belgelerle çalışarak geliştiricilere daha esnek bir veri modeli sunmaktadır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="mongodbServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function mongodbServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mongodb/start-mongodb.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="mongodbServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function mongodbServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mongodb/restart-mongodb.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="mongodbServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function mongodbServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mongodb/mask-mongodb.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="mongodbServiceStop()">Durdur</button>
                                <script>
                                function mongodbServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/mongodb/stop-mongodb.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                  
                                </div>
                            </div>
                            
                        </div>

                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">phpMyAdmin w/ Apache Servisi -> <?php
                                         if (trim($webServer) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?> </h4>
                                <p class="m-0 subtitle">phpMyAdmin, web tabanlı bir MySQL veritabanı yönetim aracıdır. MySQL veritabanlarını yönetmek için grafik arayüzü sağlar ve açık kaynak kodlu olarak dağıtılır.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success">Başlat</button>
                                <span></span>
                                <script>
                                function ApacheServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/start-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function ApacheServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/start-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary">Maskele</button>
                                <span></span>
                                <script>
                                function ApacheServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/start-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger">Durdur</button>
                                <script>
                                function ApacheServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/apache/start-apache.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Docker Servisi -> <?php
                                         if (trim($dockerService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?> </h4>
                                <p class="m-0 subtitle">Docker, uygulamaları ve servisleri konteynerlara yerleştirip çalıştırmak için kullanılan açık kaynaklı bir platformdur, uygulama ve bağımlılıklarının bir arada paketlenmesini ve farklı ortamlarda sorunsuz bir şekilde çalıştırılmasını sağlar. </p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="dockerServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function dockerServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/docker/start-docker.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="dockerServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function dockerServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/docker/restart-docker.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="dockerServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function dockerServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/docker/mask-docker.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="dockerServiceStop()">Durdur</button>
                                <script>
                                function dockerServiceStop() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/docker/stop-docker.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title">Kubernetes Servisi -> <?php
                                         if (trim($kubeletService) == "active") {
                                            echo "<span style='color:green;'>Aktif</span>";
                                        } else {
                                            echo "<span style='color:red;'>İnaktif</span>";
                                        }
                                         ?> </h4>
                                <p class="m-0 subtitle">Kubernetes, konteynerleştirilmiş uygulamaların hızlı bir şekilde dağıtımını, ölçeklenmesini, yönetimini ve çalıştırılmasını sağlayan açık kaynaklı bir konteyner orkestrasyon platformudur.</p>
                                
                            </div>
                            <div class="card-body">
                            <button type="button" class="btn btn-success" onclick="kubeletServiceStart()">Başlat</button>
                                <span></span>
                                <script>
                                function kubeletServiceStart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/kubelet/start-kubelet.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-info" onclick="kubeletServiceRestart()">Yeniden Yükle</button>
                                <span></span>
                                <script>
                                function kubeletServiceRestart() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/kubelet/restart-kubelet.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-primary" onclick="kubeletServiceMask()">Maskele</button>
                                <span></span>
                                <script>
                                function kubeletServiceMask() {
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/kubelet/mask-kubelet.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                }
                                </script>
                                <button type="button" class="btn btn-danger" onclick="kubeletServiceStop()">Durdur</button>
                                <script>
                                function kubeletServiceStop() {
                                    
                                    var xhr = new XMLHttpRequest();
                                    xhr.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        console.log(this.responseText);
                                    }
                                    };
                                    xhr.open("GET", "/admin/data/apps/services/kubelet/stop-kubelet.php", true);
                                    xhr.send();
                                    setTimeout(function() {
                                    location.reload();
                                    }, 3000); // 3 saniye sonra sayfayı yenile
                                    basarili();
                                    }
                    
                                </script>
                                
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

<script> 
function basarili() {
    Swal.fire(
  'İşlem Başarılı',
  'Yönlendiriliyorsunuz.',
  'success'
)
    }

</script>
</body>
</html>