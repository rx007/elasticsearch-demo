# Mine data with Elasticsearch
<p align=center>

The purpose of this demo is to show how to feed data into Elasticsearch from Nginx logs, [Aircraft Delays](https://www.transtats.bts.gov), and a desired Twitter hashtag for data analytics and then archive them to S3. This demo will run NextCloud, Fluentd, Elastisearch, Kibana, and the Minio S3 Server in a microservices architecture.

### Prerequisites

1. Docker for [Mac](https://download.docker.com/mac/stable/Docker.dmg) or [Windows](https://download.docker.com/win/stable/InstallDocker.msi).
2. This Git [Repo](https://github.com/rusher81572/elasticsearch-demo/archive/master.zip)
3. 3GB of RAM or greater for Docker
4. (Optional) [Twitter API credentials](https://dev.twitter.com/)

### Building the images
```
unzip elastic-demo-master.zip
cd elastic-demo-master
docker-compose build
```
If you want to use the Twitter app to mine data from Twitter, modify the twitter section of docker-compose.yml with
your developer API credentials.

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
2a09e1fcc50        nextcloud_minio              "npm start"              13 minutes ago      Up 13 minutes       0.0.0.0:8000->8000/tcp                     nextcloud_minio_1
8204cb4e7342        nextcloud_fluent          "/bin/sh -c 'fluen..."   23 minutes ago      Up 13 minutes                                                  nextcloud_fluent_1
d009ffb5b8cc        nextcloud_phpfpm          "/bin/sh -c 'bash ..."   23 minutes ago      Up 13 minutes       9001/tcp                                   nextcloud_phpfpm_1
715324d7ce85        nextcloud_nginx           "/bin/sh -c nginx"       23 minutes ago      Up 13 minutes       0.0.0.0:80->80/tcp, 0.0.0.0:443->443/tcp   nextcloud_nginx_1
70bc55852392        nextcloud_fileserverweb   "/bin/sh -c 'sleep..."   23 minutes ago      Up 13 minutes                                                  nextcloud_fileserverweb_1
538780dda333        nextcloud_mysql           "/bin/sh -c /start.sh"   23 minutes ago      Up 13 minutes       3306/tcp                                   nextcloud_mysql_1
7ea58918c49e        nextcloud_elasticsearch   "/bin/sh -c 'su - ..."   23 minutes ago      Up 13 minutes                                                  nextcloud_elasticsearch_1
ee352e1cd271        nextcloud_kibana          "/bin/sh -c 'cd /k..."   23 minutes ago      Up 13 minutes       0.0.0.0:5601->5601/tcp                     nextcloud_kibana_1
```

### Login to NextCloud
1. Goto http://127.0.0.1 in your web browser
2. Login with nextcloud for the username and password
3. After a few minutes, the nginx log files and Tweets will start appearing there from Fluent and the Twitter app.

(All of the NextCloud data is stored on Minio)

### Accessing Kibana
1. Goto https://0.0.0.0:5601 in your web browser
2. Click the create button
3. Start analyzing data

The default index of "logstash" will show you the nginx logs.

To view Twitter traffic, change the index to twitter or go to Management->Index Patterns-> + and then add twitter. Uncheck 'Index contains time-based events'.

To view Flight delay data, change the index to flightdata or go to Management->Index Patterns-> + and then add flightdata. Uncheck 'Index contains time-based events'.

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
