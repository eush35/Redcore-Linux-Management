#!/bin/bash

##
sudo apt update -y 
sudo apt install software-properties-common -y 
apt-get install net-tools -y 
apt-get install sysstat dmidecode -y 
apt-get install lm-sensors -y &&

# Bulunduðumuz dizini saklayalým
current_dir=$(pwd)

# /var/www/html/admin/module dizinine geçelim
cd "$(dirname "$0")/admin/module"

# plugins.js dosyasýný node ile arka planda çalýþtýralým
node plugins.js >/dev/null 2>&1 &

# websocket.js dosyasýný node ile arka planda çalýþtýralým
node websocket.js >/dev/null 2>&1 &

# command.js dosyasýný node ile arka planda çalýþtýralým
node command.js >/dev/null 2>&1 &

# Ýþler tamamlandýktan sonra baþlangýç dizinine geri dönelim
cd "$current_dir"

# Renkli metinleri tanýmla
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m' # Renkleri sýfýrla
clear
echo -e "${RED}PHP 8, Mysql Server ve NodeJS kurmayi unutmayiniz.${NC}"
echo -e "${GREEN}Redcore kurulumu basariyla tamamlandi.${NC}"
echo -e "${BLUE}Redcore version 1.0.0 [Closed Beta]${NC}"

# Terminale geçiþ yap
exec bash
