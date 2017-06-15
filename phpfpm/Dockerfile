FROM ubuntu
USER root
ENV TERM xterm
RUN apt-get update;apt-get -y install php-pear php-fpm php7.0-mysql php-xml php-gd php-zip php-sqlite3 php-pgsql php-curl php-intl php-memcache php-mbstring php-mcrypt


RUN usermod -s /bin/bash www-data

#php config
RUN mkdir -p /var/lib/php/sesion
RUN sed -i 's/9000/9001/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 10G/' /etc/php/7.0/fpm/php.ini
RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 10G/' /etc/php/7.0/cli/php.ini
RUN echo "php_admin_value[post_max_size] = 10G" >> /etc/php/7.0/fpm/pool.d/www.conf
RUN echo "php_admin_value[upload_max_filesize] = 10G" >> /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/8M/10G/' /etc/php/7.0/cli/php.ini
RUN sed -i 's/;session.save_path/session.save_path/' /etc/php/7.0/fpm/php.ini
RUN sed -i 's/;default_charset/default_charset/' /etc/php/7.0/fpm/php.ini
RUN sed -i 's/max_execution_time = 30/max_execution_time = 300/'  /etc/php/7.0/fpm/php.ini
RUN sed -i 's/;listen.allowed_clients/listen.allowed_clients/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/pm.max_children = 5/pm.max_children = 10/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/pm.start_servers = 2/;pm.start_servers = 2/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/pm.max_spare_servers = 3/pm.max_spare_servers = 10/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/pm.min_spare_servers = 1/pm.min_spare_servers = 5/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/;listen.mode/listen.mode/' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/listen /;listen /' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i '/;listen = /a listen = 0.0.0.0:9001' /etc/php/7.0/fpm/pool.d/www.conf
RUN sed -i 's/listen.allowed_clients = 127.0.0.1/;listen.allowed_clients = 127.0.0.1/' /etc/php/7.0/fpm/pool.d/www.conf
RUN mkdir -p /run/php

#Startup Script
ADD start.sh /
RUN chmod +x /start.sh

EXPOSE 9001

CMD bash /start.sh
