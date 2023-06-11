<?php 
        @session_start();
        if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
           header("Location: /login.php");
           exit();
        }
        include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
        ?>
<div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Ana Menü</li>
                    <li><a class="" href="/admin/index.php" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Arayüz</span></a>

                    </li>
                    <li class="nav-label">Sistem</li>
                    <!-- <li><a class="" href="/admin/data/apps/application/index.php" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Uygulamalar</span></a> -->
                        <!-- <ul aria-expanded="false"> -->
                            <!-- <li><a href="./app-profile.html">#</a></li>
                            <li><a class="" href="javascript:void()" aria-expanded="false">#</a> -->
                                <!-- <ul aria-expanded="false">
                                    <li><a href="./email-compose.html">#</a></li>
                                    <li><a href="./email-inbox.html">#</a></li>
                                    <li><a href="./email-read.html">#</a></li>
                                </ul> -->
                            <!-- </li>
                            <li><a href="./app-calender.html">#</a></li>
                        </ul> -->
                    </li>
                    <li><a class="" href="/admin/data/apps/services/index.php" aria-expanded="false"><i
                                class="icon icon-chart-bar-33"></i><span class="nav-text">Servisler</span></a>
                        <!-- <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">#</a></li>
                            <li><a href="./chart-morris.html">#</a></li>
                            <li><a href="./chart-chartjs.html">#</a></li>
                            <li><a href="./chart-chartist.html">#</a></li>
                            <li><a href="./chart-sparkline.html">#</a></li>
                            <li><a href="./chart-peity.html">#</a></li>
                        </ul> -->
                    </li>
                    <li class="nav-label">Araçlar</li>
                    <li><a class="" href="/admin/data/tools/connections/index.php" aria-expanded="false"><i
                                class="icon icon-world-2"></i><span class="nav-text">Bağlantılar</span></a>
                        <!-- <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">#</a></li>
                            <li><a href="./ui-alert.html">#</a></li>
                            <li><a href="./ui-badge.html">#</a></li>

                        </ul> -->
                    </li>

                    <li><a class="" href="/admin/data/tools/plugins/index.php" aria-expanded="false"><i
                                class="fa fa-bars"></i><span class="nav-text">Görev Yöneticisi</span></a>
                        <!-- <ul aria-expanded="false">
                            <li><a href="./uc-select2.html">#</a></li>
                            <li><a href="./uc-nestable.html">#</a></li>
                        </ul> -->
                    </li>
                    <li><a href="/admin/data/tools/monitor/index.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span
                                class="nav-text">Monitör</span></a></li>
                    <li class="nav-label">Dosya Yöneticisi</li>
                    <li><a class="" href="/admin/data/fm/redfilemanager/index.php" target="new-blank" aria-expanded="false"><i
                                class="icon icon-form"></i><span class="nav-text">RedFile Manager</span></a>
                        <!-- <ul aria-expanded="false">
                            <li><a href="./form-element.html">#</a></li>
                            <li><a href="./form-wizard.html">#</a></li>
                        </ul> -->
                    </li>
                    <!-- <li class="nav-label">Yönlendirmeler</li>
                    <li><a class="" href="/admin/data/directions/dns/index.php" aria-expanded="false"><i
                                class="icon icon-layout-25"></i><span class="nav-text">DNS</span></a>
                         <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">#</a></li>
                            <li><a href="table-datatable-basic.html">#</a></li>
                        </ul> 
                    </li> -->

                    <li class="nav-label">Redcore</li>
                                <li><a class="" href="/admin/data/rcsettings.php" aria-expanded="false"><i
                                class="fa fa-cog"></i><span class="nav-text">Ayarlar</span></a>
                                <li><a class="" href="/admin/logout.php" aria-expanded="false"><i
                                class="fa fa-lock"></i><span class="nav-text">Çıkış Yap</span></a>
                        <!-- <ul aria-expanded="false">
                            <li><a href="./page-register.html">#</a></li>
                            <li><a href="./page-login.html">#</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-400.html">#</a></li>
                                    <li><a href="./page-error-403.html">#</a></li>
                                </ul> -->
                            <!-- </li>
                            <li><a href="./page-lock-screen.html">Lock Screen</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>


        </div>