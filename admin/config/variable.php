<?php
        @session_start();
        if(!isset($_SESSION["giris"]) || $_SESSION["giris"] != sha1(md5("var"))) {
           header("Location: /login.php");
           exit();
        }

                //Host Bilgileri
                  $hostName = shell_exec("hostname");
                  $operatingSystem = shell_exec(("uname"));
                  $systemVersionUbuntu = shell_exec("lsb_release -a");
                  $linuxVersion = shell_exec("uname -r");
                  $distributeOS = shell_exec("lsb_release -d | awk '{print $2,$3}'");
                  $networkCard = shell_exec("lshw -class network | grep product | awk '{print $2,$3,$4}'");
                  $systemDate = shell_exec('date +%Y-%m-%d');
                  $systemDay = shell_exec('date +%A');
                  $webServer = shell_exec("systemctl is-active apache2");
                  $fileServer = shell_exec("systemctl is-active vsftpd");
                  $sshServer = shell_exec("systemctl is-active ssh");
                  $smtpServer = shell_exec("systemctl is-active ftp");
                  $nfsServer = shell_exec("systemctl is-active nfs-server");

                  //
               

                 //CPU
                 $outputcpuname = shell_exec('cat /proc/cpuinfo | grep "model name" | head -n1');
                 $cpuName = trim(substr($outputcpuname, strpos($outputcpuname, ":") + 1));
                 $cpuUsagePercent = shell_exec("top -b -n 1 | awk '/^%Cpu/{print $2+$4}'");
                 $cpuCoreCount = shell_exec('cat /proc/cpuinfo | grep processor | wc -l');
                 $cpuClock = shell_exec("grep 'cpu MHz' /proc/cpuinfo | awk '{print $4}' | awk 'NR==1{print $1}'");



                 //CPU Geniş Bilgi
                 

        
                  $outputFan = shell_exec('sensors | grep "CPU FAN" | awk \'{print $3}\'');
                  $cpuFanSpeed = (int)trim($outputFan);
                  // echo "CPU Fan Dönüş Hızı: " . $fanSpeed . " RPM";
        
        
                  // RAM
                  $ramUsagePercent = shell_exec("free -m | awk '/^Mem:/{print $3/$2 * 100.0}'");
                  $outputMem = shell_exec('free -m | grep Mem | awk \'{print $2}\'');
                  $alloctedMemory = (int)trim($outputMem);
                  $swapMemory = shell_exec('free -m | awk \'/Swap/{print $2}\'');
                  // echo "Yüklü RAM: " . $alloctedMemory . " MB";

                  //Disk
                  $diskUsagePercent = shell_exec("df -h | awk '/^\/dev/{print $5}' | head -1 | cut -d'%' -f1");
                  $diskOutput = shell_exec('df -h | awk \'$NF=="/"{printf "%s,%s,%s",$2,$3,$4}\'');
                  $diskInfo = explode(",", $diskOutput);
                  $diskTotalSpace = $diskInfo[0];
                  $diskUsedSpace = $diskInfo[1];
                  $diskFreeSpace = $diskInfo[2];
                  $diskRWInfo = shell_exec('iostat -d -k /dev/sda | grep sda | awk \'{print "Okuma: " $3 "kB/s\nYazma: " $4 "kB/s"}\'');


                  //Ağ
                  
                  $ifconfigOutput = shell_exec('ifconfig');
                  // Ağ adaptör ismi alınıyor
                  preg_match('/^([a-z0-9]+)(:\d+)?/i', $ifconfigOutput, $matches);
                  $interfaceName = $matches[1];
                  // Önceki ağ kullanım bilgisi alınıyor
                  $prevBytes = file_get_contents('/sys/class/net/'.$interfaceName.'/statistics/rx_bytes');
                  // 1 saniye bekleme
                  sleep(1);
                  // Mevcut ağ kullanım bilgisi alınıyor
                  $currentBytes = file_get_contents('/sys/class/net/'.$interfaceName.'/statistics/rx_bytes');
                  // Ağ kullanım yüzdesi hesaplanıyor
                  $diffBytes = $currentBytes - $prevBytes;
                  $totalBytes = $currentBytes;
                  $networkUsagePercent = round($diffBytes / $totalBytes * 100, 2);
                  $ipAddress =  shell_exec('ifconfig ' . trim($interfaceName) . ' | grep "inet " | awk \'{print $2}\'');

                  // Servisler
                  $serviceTotalCount = shell_exec("systemctl list-units | wc -l");
                  $serviceLoadedCount = shell_exec("systemctl list-units --state=loaded | wc -l");
                  $serviceActiveCount = shell_exec("systemctl list-units --state=running | wc -l");
                  $serviceInactiveCount = shell_exec("systemctl list-units --state=inactive | wc -l");
                  $serviceFailedCount = shell_exec("systemctl list-units --state=failed | wc -l");
                  $serviceMaskedCount = shell_exec("systemctl list-units --state=masked| wc -l");

                  // Servisler Ana sayfası
                  $nginxService = shell_exec("systemctl is-active nginx");
                  $dockerService = shell_exec("systemctl is-active docker");
                  $dnsService = shell_exec("systemctl is-active bind9");
                  $ftpService = shell_exec("systemctl is-active vsftpd");
                  $httpService = shell_exec("systemctl is-active apache2");
                  $kubeletService = shell_exec("systemctl is-active kubelet");
                  $mongodbService = shell_exec("systemctl is-active mongodb");
                  $mysqlService = shell_exec("systemctl is-active mysql");
                  $phpmyadminService = shell_exec("systemctl is-active phpmyadmin");
                  $postgresqlService = shell_exec("systemctl is-active postgresql");
                  $smtpService = shell_exec("systemctl is-active postfix");
                  $snmpService = shell_exec("systemctl is-active snmpd");
                  $sshService = shell_exec("systemctl is-active ssh");
                  $varnishService = shell_exec("systemctl is-active varnish");
                  


 ?>
 