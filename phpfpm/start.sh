#!/bin/bash
php-fpm7.0 -R -c /etc/php/7.0/fpm/pool.d/www.conf -F&
chmod -R 777 /tmp
mkdir -p /var/www/html/tinyrss/cache/{upload,export,images,lock}
mkdir /var/www/html/tinyrss/lock
chmod -R 777 /var/www/html/tinyrss
sleep infinity
