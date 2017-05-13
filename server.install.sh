#!/bin/bash
sudo apt-get update & apt-get upgrade & apt-get install apache2 php7.0 libapache2-mod-php7.0 nginx
sudo chmod -R 777 /etc/apache2/ports.conf/ &  sudo chmod -R 777 /etc/apache2/sites-available/000-default.conf/
#необходимо здесь реализовать замену конфигов серваков