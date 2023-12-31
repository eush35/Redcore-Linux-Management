<?php
@session_start();
if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
   header("Location: /login.php");
   exit();
}
include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
    include($_SERVER['DOCUMENT_ROOT'].'/admin/config/settings.php');
    require_once(dirname(__FILE__) . "/application/api/constants.php");
    includeMonstaConfig();
    require_once(dirname(__FILE__) . '/application/api/lib/helpers.php');
    require_once(dirname(__FILE__) . '/application/api/lib/entry_handlers.php');
    if (file_exists(dirname(__FILE__) . '/mftp_extensions.php'))
        include_once(dirname(__FILE__) . '/mftp_extensions.php');

    require_once(dirname(__FILE__) . '/application/api/lib/access_check.php');

    require_once(dirname(__FILE__) . '/application/api/system/ApplicationSettings.php');

    $applicationSettings = new ApplicationSettings(APPLICATION_SETTINGS_PATH);

    $languageDir = dirname(__FILE__) . "/application/languages/";

    $languages = readLanguagesFromDirectory($languageDir);

    $license = readDefaultMonstaLicense();
    $isLicensed = !is_null($license) && $license->isLicensed();
    $isHostEdition = $isLicensed && $license->getLicenseVersion() >= 3 && $license->isMonstaHostEdition();
    $isPostEntry = $isHostEdition && isMonstaPostEntry($_SERVER['REQUEST_METHOD'], $_POST);

    $versionQS = generateVersionQueryString($isLicensed, $isHostEdition);

    $resetPasswordAvailable = false;
    $forgotPasswordAvailable = false;

    if ($isHostEdition) {
        if (function_exists("mftpInitialLoadValidation")) {
            if (!mftpInitialLoadValidation($isPostEntry))
                exit();
        }

        $resetPasswordAvailable = function_exists("mftpResetPasswordHandler");
        $forgotPasswordAvailable = function_exists("mftpForgotPasswordHandler");
    }
?>
<!DOCTYPE html>
<html ng-app="MonstaFTP">
<head>
    <title><?php print getMonstaPageTitle($isHostEdition); ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" type="image/x-icon" href="application/frontend/images/logo-favicon.png">
    <link rel="apple-touch-icon" href="application/frontend/images/logo-webclip.png">

    <input type="hidden" id="g_defaultLanguage" value="<?php print htmlspecialchars( $applicationSettings->getLanguage() ); ?>"/>
    <input type="hidden" id="g_xhrTimeoutSeconds" value="<?php print htmlspecialchars( $applicationSettings->getXhrTimeoutSeconds() ); ?>"/>
    <input type="hidden" id="g_isNewWindowsInstall" value="<?php print htmlspecialchars( booleanToJsValue(getNormalizedOSName() == "Windows" && !$isLicensed) ); ?>"/>
    <input type="hidden" id="g_ftpConnectionAvailable" value="<?php print htmlspecialchars( booleanToJsValue(ftpConnectionAvailable()) ); ?>"/>
    <input type="hidden" id="g_openSslAvailable" value="<?php print htmlspecialchars( booleanToJsValue(function_exists("openssl_get_publickey")) ); ?>"/>
    <input type="hidden" id="g_resetPasswordAvailable" value="<?php print htmlspecialchars( booleanToJsValue($resetPasswordAvailable) ); ?>"/>
    <input type="hidden" id="g_forgotPasswordAvailable" value="<?php print htmlspecialchars( booleanToJsValue($forgotPasswordAvailable) ); ?>"/>
    
    <script>
        var g_defaultLanguage = document.getElementById('g_defaultLanguage').value;
        var g_upgradeURL = "http://www.monstaftp.com/upgrade";
        var g_loadComplete = false;
        var g_xhrTimeoutSeconds = +document.getElementById('g_xhrTimeoutSeconds').value;
        var g_isMonstaPostEntry = false;
        var g_isNewWindowsInstall = document.getElementById('g_isNewWindowsInstall').value == 'true';
        var g_ftpConnectionAvailable = document.getElementById('g_ftpConnectionAvailable').value == 'true';
        var g_openSslAvailable = document.getElementById('g_openSslAvailable').value == 'true';
        var g_resetPasswordAvailable = document.getElementById('g_resetPasswordAvailable').value == 'true';
        var g_forgotPasswordAvailable = document.getElementById('g_forgotPasswordAvailable').value == 'true';

        <?php
        if ($isLicensed && $isPostEntry) {
        ?>
            g_isMonstaPostEntry = true;
            var g_monstaPostEntryVars = <?php print json_encode(extractMonstaPostEntryVars($_POST)); ?>;
        <?php
        }
        ?>
    </script>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,600,300">
    <script src="application/frontend/assets-<?php print MONSTA_VERSION; ?>/vendor.js"></script>

    <link rel="stylesheet" href="application/frontend/css/monsta.css">
    <link rel="stylesheet" href="settings/theme.css">
    
    <script src="application/frontend/js/monsta-min-<?php print MONSTA_VERSION; ?>.js"></script>
    <script src="application/frontend/js/templates-<?php print MONSTA_VERSION; ?>.js"></script>

    <?php
        if($isLicensed) {
            ?>
            <script src="application/frontend/vs/loader.js"></script>
            <?php
        }

        if ($applicationSettings->isSettingsReadFailed()) {
            ?>
            <script>
                var g_settingsReadFailureMesage = "Reading settings.json failed. <?php echo htmlspecialchars($applicationSettings->getSettingsReadError())?>.\n\nCheck the file is readable and " +
                    "has no syntax errors (http://jsonlint.com might help). You are using the default settings.";

                alert(g_settingsReadFailureMesage);
            </script>
            <?php
        }
    ?>
    <script>
        var g_languageFiles = <?php print json_encode($languages); ?>;
    </script>
</head>
<body>

    <div id="spinner" ng-controller="SpinnerController" ng-show="spinnerVisible">
        <div>
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
        </div>
    </div>
    <div id="file-xfer-drop" ng-controller="DragDropController">
        <div translate>DROP_FILES_INSTRUCTION</div>
    </div>
    <ng-include src="'application/frontend/templates/modal-chmod.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-login.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-password-management.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-editor.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-transfers.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-prompt.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-confirm.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-error.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-addons.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-settings.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-properties.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-login-link.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-choice.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-update.html'"></ng-include>
    <ng-include src="'application/frontend/templates/modal-upgrade-required.html'"></ng-include>

    <div id="sb-site" canvas="container">
        <ng-include src="'application/frontend/templates/body-header.html'"></ng-include>
        <ng-include src="'application/frontend/templates/body-history.html'"></ng-include>
        <ng-include src="'application/frontend/templates/body-files.html'"></ng-include>
        <ng-include src="'application/frontend/templates/body-footer.html'"></ng-include>
    </div>

    <ng-include src="'application/frontend/templates/body-slidebar.html'"></ng-include>
    <iframe src="about:blank" id="download-iframe"></iframe>
<?php
    if (!(defined("MFTP_DISABLE_LATEST_VERSION_CHECK") && MFTP_DISABLE_LATEST_VERSION_CHECK)) {
?>
    <script>
        var versionQS = <?php print json_encode($versionQS); ?> +getFpQs();
        document.write('<scri' + 'pt async src="//monstaftp.com/_callbacks/latest-version.php?' + versionQS + '"></scr' + 'ipt>')
    </script>
<?php
    }
?>
</body>
</html>
