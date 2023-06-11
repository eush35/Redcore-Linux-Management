#!/bin/bash

##
sudo apt update -y 
sudo apt install software-properties-common -y 
apt-get install net-tools -y 
apt-get install sysstat dmidecode -y 
apt-get install lm-sensors -y &&

# Bulundu�umuz dizini saklayal�m
current_dir=$(pwd)

# /var/www/html/admin/module dizinine ge�elim
cd "$(dirname "$0")/admin/module"

# plugins.js dosyas�n� node ile arka planda �al��t�ral�m
node plugins.js >/dev/null 2>&1 &

# websocket.js dosyas�n� node ile arka planda �al��t�ral�m
node websocket.js >/dev/null 2>&1 &

# command.js dosyas�n� node ile arka planda �al��t�ral�m
node command.js >/dev/null 2>&1 &

# ��ler tamamland�ktan sonra ba�lang�� dizinine geri d�nelim
cd "$current_dir"

# Renkli metinleri tan�mla
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
NC='\033[0m' # Renkleri s�f�rla
clear
echo -e "${RED}PHP 8, Mysql Server ve NodeJS kurmayi unutmayiniz.${NC}"
echo -e "${GREEN}Redcore kurulumu basariyla tamamlandi.${NC}"
echo -e "${BLUE}Redcore version 1.0.0 [Closed Beta]${NC}"

# Terminale ge�i� yap
exec bash
