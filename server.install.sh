#!/bin/bash
sudo apt-get update 
sudo apt-get install lynx 
sudo apt-get install nginx
sudo apt-get install apache2 php7.0 libapache2-mod-php7.0 
#sudo chmod -R 777 /etc/apache2/ports.conf 
#sudo chmod -R 777 /etc/apache2/sites-available/000-default.conf 
#sudo chmod -R 777 /etc/nginx/sites-available/default
sudo cp /home/BALinux/000-default.conf /etc/apache2/sites-available/
sudo cp /home/BALinux/ports.conf /etc/apache2/
sudo cp /home/BALinux/default /etc/nginx/sites-available/
sudo cp /home/BALinux/sysinfo.php /var/www/html/
sudo rm -rf /var/www/html/index.*
service nginx reload
service apache2 reload 
