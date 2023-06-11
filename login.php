<?php
include __DIR__ . ("/admin/config/database.php");
session_start();
ob_start();

if (isset($_SESSION["giris"]) && $_SESSION["giris"] == sha1(md5("var"))) { 
	header("Location: /admin/index.php");
	exit;
}

if ($_POST) {
    $kullanici = $_POST["kullanici"];
    $parola = $_POST["sifre"];
	$remember = $_POST["remember"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE userName = :kullanici");
    $stmt->execute(array(':kullanici' => $kullanici));
    $user = $stmt->fetch();

	if ($user && password_verify($parola, $user["userPassword"])) {
        if ($remember == "on") {
            setcookie("kullanici", $kullanici, time()+ 60*60*24);
        }
		else {
			setcookie("kullanici", $kullanici, time()+ 60*10);
		}
        $_SESSION["giris"] = sha1(md5("var"));
        header("Location: /admin/index.php");
        exit;
    } else {
        echo "<script>
        alert('Kullanıcı adı veya şifre yanlış!'); window.location.href='login.php'; </script>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<title>Yönetim Arayüzü Girişi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="/assets/images/redhope.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="login.php" method="post" onsubmit="showLoader()">
					<span class="login100-form-title">
						Yönetici Girişi
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Kullanıcı adı zorunludur.">
						<input class="input100" type="text" name="kullanici" placeholder="Kullanıcı Adı">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user-circle" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Şifre boş olamaz.">
						<input class="input100" type="password" name="sifre" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<input type="checkbox" id="remember" name="remember">
  					<label for="remember">Beni Hatırla</label>
					  <div class="container-login100-form-btn">
        			<button onclick="ButonTikla()" class="login100-form-btn" type="submit">Giriş Yap</button>
						</div>

					<div id="error-message" style="display: none;">Kullanıcı adı veya şifre yanlış!</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							
						</span>
						<a class="txt2" href="#">
							
						</a>
					</div>

					<div class="text-center p-t-120">
						<a class="txt2" href="https://github.com/eush35">
							Github
							<i class="fa fa-github" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<!--===============================================================================================-->	
	<script src="/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/assets/js/main.js"></script>
 </script>

</body>
</html>