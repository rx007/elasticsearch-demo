# Elasticsearch and NextCloud Demo
<p align=center>

This demo will run NextCloud, Fluentd, Elastisearch, Kibana, and the Scality S3 Server in a microservices architecture. The nginx logs will be sent to Elasticsearch via Fluent and then can be analyzed with Kibana. The logs will also be archived to the S3 server.

### Prerequisites

1. Docker for [Mac](https://download.docker.com/mac/stable/Docker.dmg) or [Windows](https://download.docker.com/win/stable/InstallDocker.msi).
2. This Git [Repo](https://github.com/rusher81572/elasticsearch-demo/archive/master.zip)
3. 3GB of RAM or greater for Docker

### Building the images
```
unzip elastic-demo-master.zip
cd elastic-demo-master/NextCloud
docker-compose build
```

### Starting the containers

```
docker-compose up -d
```

Please wait about 2 minutes for the S3 Server and MySQL to start properly.

### Check the status of the containers
```
docker ps
```

You should see the following containers running:

```
CONTAINER ID        IMAGE                     COMMAND                  CREATED             STATUS              PORTS                                      NAMES
2a09e1fcc50        nextcloud_s3              "npm start"              13 minutes ago      Up 13 minutes       0.0.0.0:8000->8000/tcp                     nextcloud_s3_1
8204cb4e7342        nextcloud_fluent          "/bin/sh -c 'fluen..."   23 minutes ago      Up 13 minutes                                                  nextcloud_fluent_1
d009ffb5b8cc        nextcloud_phpfpm          "/bin/sh -c 'bash ..."   23 minutes ago      Up 13 minutes       9001/tcp                                   nextcloud_phpfpm_1
715324d7ce85        nextcloud_nginx           "/bin/sh -c nginx"       23 minutes ago      Up 13 minutes       0.0.0.0:80->80/tcp, 0.0.0.0:443->443/tcp   nextcloud_nginx_1
70bc55852392        nextcloud_fileserverweb   "/bin/sh -c 'sleep..."   23 minutes ago      Up 13 minutes                                                  nextcloud_fileserverweb_1
538780dda333        nextcloud_mysql           "/bin/sh -c /start.sh"   23 minutes ago      Up 13 minutes       3306/tcp                                   nextcloud_mysql_1
7ea58918c49e        nextcloud_elasticsearch   "/bin/sh -c 'su - ..."   23 minutes ago      Up 13 minutes                                                  nextcloud_elasticsearch_1
ee352e1cd271        nextcloud_kibana          "/bin/sh -c 'cd /k..."   23 minutes ago      Up 13 minutes       0.0.0.0:5601->5601/tcp                     nextcloud_kibana_1
```

### Login to NextCloud and browse the S3 Bucket
1. Goto http://127.0.0.1 in your web browser
2. Login with nextcloud for the username and password
3. Click on the folder "s3"
4. After a few minutes, the nginx log files will start appearing there from Fluent.

### Accessing Kibana
1. Goto https://0.0.0.0:5601 in your web browser

### Stopping and Erasing the demo

The following commands will stop and delete all running containers.

```
docker-compose kill
docker-compose rm -f
```

To start the demo again, simply run:
```
docker-compose up -d
```
