<?php 
        @session_start();
        if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
           header("Location: /login.php");
           exit();
        }
        include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
        ?>
<!-- Required vendors -->
<script src="/admin/assets/vendor/global/global.min.js"></script>
    <script src="/admin/assets/js/quixnav-init.js"></script>
    <script src="/admin/assets/js/custom.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>


    <!-- Vectormap -->
    <script src="/admin/assets/vendor/raphael/raphael.min.js"></script>
    <script src="/admin/assets/vendor/morris/morris.min.js"></script>


    <script src="/admin/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/admin/assets/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="/admin/assets/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="/admin/assets/vendor/flot/jquery.flot.js"></script>
    <script src="/admin/assets/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="/admin/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="/admin/assets/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="/admin/assets/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="/admin/assets/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="/admin/assets/js/dashboard/dashboard-1.js"></script>
    <script src="/admin/assets/js/plugins-init/sweetalert.init.js"></script>

    <!-- Websocket -->
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/admin/assets/vendor/global/global.min.js"></script>
    <script src="/admin/assets/js/quixnav-init.js"></script>
    <script src="/admin/assets/js/custom.min.js"></script>
    

    <script src="/admin/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="/admin/assets/js/plugins-init/sweetalert.init.js"></script>
    <script src="/admin/assets/js/simpleGauge.js"></script>
    
