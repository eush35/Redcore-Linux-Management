#!/bin/bash

# plugins.js dosyasının çalışan işlemi öldürelim
pkill -f plugins.js

# websocket.js dosyasının çalışan işlemi öldürelim
pkill -f websocket.js

# command.js dosyasının çalışan işlemi öldürelim
pkill -f command.js

# terminale geri dön 

exec bash