FROM ubuntu
RUN apt-get update
RUN apt-get -y install mariadb-client mariadb-server

#New MySQL
RUN sed -i 's/127.0.0.1/0.0.0.0/' /etc/mysql/mariadb.conf.d/50-server.cnf

#ENV Variables
ENV TERM xterm

#DB
#ADD database.sql /

#Startup Script
RUN echo "#!/bin/bash" > /start.sh
RUN echo "/usr/bin/mysql_install_db" >> /start.sh
RUN echo "chown -R mysql:mysql /var/lib/mysql" >> /start.sh
RUN echo "mysqld_safe&" >> /start.sh
RUN echo "sleep 20" >> /start.sh
RUN echo "mysql -u root -e \"GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' IDENTIFIED BY 'sql' WITH GRANT OPTION; FLUSH PRIVILEGES;\"" >> /start.sh
RUN echo "mysqladmin -u root password \"sql\"" >> /start.sh
#RUN echo "mysql -u root -psql < /database.sql" >> /start.sh
RUN echo "mysql -u root -psql -e \"FLUSH PRIVILEGES;\"" >> /start.sh
RUN echo "sleep infinity" >> /start.sh
RUN chmod +x /start.sh
EXPOSE 3306
CMD /start.sh
