        <?php 
        @session_start();
        if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
           header("Location: /login.php");
           exit();
        }
        include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
        ?>
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://github.com/eush35" target="_blank">Emre UGUR</a> 2023</p>
                <p>Distributed by <a href="https://redhopecommunity.com" target="_blank">Redhope Community</a></p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->