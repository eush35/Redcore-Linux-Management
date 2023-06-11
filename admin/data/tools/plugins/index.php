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
<style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;

    }

    th {
      background-color: #f4f4f4;
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
</style>
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
                            <li class="breadcrumb-item active"><a href="/admin/data/tools/plugins/index.php">Eklentiler</a></li>
                        </ol>
                    </div>
                </div>
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Görev Yöneticisi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                    <table id="processList">
                                    <thead>
                                    <tr style="color:red">
                                    <th>PID</th>
                                    <th>USER</th>
                                    <th>%CPU</th>
                                    <th>%MEM</th>
                                    <th>COMMAND</th>
                                </tr>
                                </thead>
                                <tbody style="color:black;font-weight:bold;"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
</div>

                <script>
                    const processListElement = document.getElementById('processList');
                    let ip = location.hostname || "127.0.0.1";
                    let wsUrl = 'ws://' + ip + ':8083';
                    let ws = new WebSocket(wsUrl);

                    ws.onmessage = event => {
                    const processes = JSON.parse(event.data);
                    renderProcessList(processes);
                    };

                    // Function to render the process list in the HTML table
                    function renderProcessList(processes) {
                    const processListElement = document.querySelector('#processList tbody');
                    processListElement.innerHTML = '';

                    processes.forEach(process => {
                        const row = document.createElement('tr');

                        const pidCell = document.createElement('td');
                        pidCell.textContent = process.PID || '';
                        row.appendChild(pidCell);

                        const userCell = document.createElement('td');
                        userCell.textContent = process.USER || '';
                        row.appendChild(userCell);

                        const cpuCell = document.createElement('td');
                        cpuCell.textContent = process['%CPU'] >= 0.1 ? process['%CPU'].toFixed(1) : '0.0';
                        row.appendChild(cpuCell);

                        const memoryCell = document.createElement('td');
                        memoryCell.textContent = process['%MEM'] || '';
                        row.appendChild(memoryCell);

                        const commandCell = document.createElement('td');
                        commandCell.textContent = process.COMMAND || '';
                        row.appendChild(commandCell);

                        processListElement.appendChild(row);
                    });
                    }
                </script>
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
