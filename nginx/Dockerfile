FROM ubuntu
VOLUME /var/log/nginx
RUN apt-get update;apt-get install -y nginx

#nginx config
ADD nginx.conf /etc/nginx/
RUN rm -rf /etc/nginx/conf.d/*

#ENV Variables
ENV TERM xterm

EXPOSE 443 80

CMD nginx
