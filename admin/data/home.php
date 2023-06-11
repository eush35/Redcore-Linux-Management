<?php 
        @session_start();
        if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
           header("Location: /login.php");
           exit();
        }
          
        
?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"></div>
                                    <div class="stat-digit"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"></div>
                                    <div class="stat-digit"></div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text"></div>
                                    <div class="stat-digit"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Ağ Kullanımı</div>
                                    <div class="stat-digit"></div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-8">
                                        <div id="morris-bar-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="m-t-10">
                                    <h4 class="card-title"></h4>
                                    <h2 class="mt-3"></h2>
                                </div>
                                <div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
                                    <i class="ti-control-shuffle pa"></i>
                                </div>
                                <ul class="widget-line-list m-b-15">
                                    <li class="border-right"> <br><span class="text-success"><i
                                                class="ti-hand-point-up"></i> </span></li>
                                    <li><br><span class="text-danger"><i
                                                class="ti-hand-point-down"></i></span></li>
                                                <li><br><span class=""><i
                                                class="ti-hand-point-down"></i></span></li>

                                                
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        