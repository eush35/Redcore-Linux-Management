<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
@session_start();
if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
   header("Location: /login.php");
   exit();
}
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/database.php');

// Kullanıcı Ekleme Sorgusu
$usersQuery = "SELECT ID, userName, userMail, userStatus FROM users";
$userStmt = $pdo->prepare($usersQuery);
$userStmt->execute();

// Kullanıcıları listeleme sorgusu
$usersListQuery = "SELECT ID, userName FROM users ORDER BY userName";
$userListStmt = $pdo->prepare($usersListQuery);
$userListStmt->execute();
$users = $userListStmt->fetchAll(PDO::FETCH_ASSOC);

$status = @$_GET["status"];
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    
<?php include_once($_SERVER['DOCUMENT_ROOT'].'/admin/inc/head.php'); ?>
<link href="/admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
                            <li class="breadcrumb-item active"><a href="/admin/data/admins.php">Kullanıcılar</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                
                <div class="row">
                <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Kullanıcı Ekle</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form method="POST" action="adminAdd.php">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kull. Adı</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adı" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mail Adresi</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="mail" placeholder="Mail" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Şifre</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="sifre" placeholder="Şifre" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10" style="margin-left: 200px;">
                            <button type="submit" class="btn btn-success btn sweet-success" onclick="basarili()">Kaydet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

            <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kullanıcı Silme</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="POST" action="adminDelete.php">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kullanıcı Seç</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kullaniciSil" required>
                                            <?php foreach($users as $user): ?>
                                                <option value="<?php echo $user['ID']; ?>"><?php echo $user['userName']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10" style="margin-left: 200px;">
                                        <button type="submit" class="btn btn-danger btn sweet-danger" onclick="basarili()">Sil</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6">
                <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kullanıcı Düzenle</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Kull. Adı</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="kullanici" placeholder="Kullanıcı Adı" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Mail Adresi</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="mail" placeholder="Mail" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Şifre</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="sifre" placeholder="Şifre" Required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10" style="margin-left: 200px;">
                                            <button type="submit" class="btn btn-success btn sweet-success" onclick="basarili()">Kaydet</button>

                                                
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>

                    
            </div>
        </div>
    </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kullanıcılar</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php 
                                     echo "<table id='example' class='display' style='min-width: 845px'>";
                                     echo "<thead><tr><th>ID</th><th>Kullanıcı Adı</th><th>Mail Adresi</th><th>Durum</th></tr></thead><tbody>";
                                    
                                     while ($userRow = $userStmt->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<tr><td>" . $userRow["ID"] . "</td><td>" . $userRow["userName"] . "</td><td>" . $userRow["userMail"] . "</td><td>" . $userRow["userStatus"] . "</td></tr>";
                                    }
                                
                                    echo "</tbody><tfoot><tr><th>ID</th><th>Kullanıcı Adı</th><th>Mail Adresi</th><th>Durum</th></tr></tfoot></table>";
                                    $pdo = null;
                                    
                                    ?>
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
    <script src="/admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/js/plugins-init/datatables.init.js"></script>
    <script>
  function showAlert(status) {
    if (status === "success") {
      alert("Kayıt başarılıdır");
    } else {
      alert("Bilgilerinizi kontrol ediniz!");
    }
  }
</script>
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