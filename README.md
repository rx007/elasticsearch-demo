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
CONTAINER ID        IMAGE                                    COMMAND                  CREATED             STATUS              PORTS                                      NAMES
672757cc2856        elasticsearchdemo_fluent                 "/bin/sh -c 'fluen..."   22 seconds ago      Up 20 seconds                                                  elasticsearchdemo_fluent_1
417e9e277d53        elasticsearchdemo_nginx                  "/bin/sh -c nginx"       29 seconds ago      Up 22 seconds       0.0.0.0:80->80/tcp, 0.0.0.0:443->443/tcp   elasticsearchdemo_nginx_1
886376d5f7b8        elasticsearchdemo_phpfpm                 "/bin/sh -c 'bash ..."   29 seconds ago      Up 22 seconds       9001/tcp                                   elasticsearchdemo_phpfpm_1
3629708ab4f9        elasticsearchdemo_kibana                 "/bin/sh -c 'cd /k..."   35 seconds ago      Up 30 seconds       0.0.0.0:5601->5601/tcp                     elasticsearchdemo_kibana_1
861381ee1fdb        elasticsearchdemo_elasticsearch-slave2   "/bin/sh -c 'bash ..."   35 seconds ago      Up 30 seconds                                                  elasticsearchdemo_elasticsearch-slave2_1
fe6e3979b61d        elasticsearchdemo_flight-delays          "/bin/sh -c 'sleep..."   35 seconds ago      Up 30 seconds                                                  elasticsearchdemo_flight-delays_1
505a1b3e3fca        elasticsearchdemo_elasticsearch-master   "/bin/sh -c 'bash ..."   35 seconds ago      Up 29 seconds       0.0.0.0:9200->9200/tcp                     elasticsearchdemo_elasticsearch-master_1
00138ebed6e7        elasticsearchdemo_mysql                  "/bin/sh -c /start.sh"   35 seconds ago      Up 30 seconds       3306/tcp                                   elasticsearchdemo_mysql_1
8fcbecc8abec        elasticsearchdemo_elasticsearch-slave1   "/bin/sh -c 'bash ..."   35 seconds ago      Up 29 seconds                                                  elasticsearchdemo_elasticsearch-slave1_1
384aa0b84866        elasticsearchdemo_minio                  "/bin/sh -c './min..."   35 seconds ago      Up 31 seconds       0.0.0.0:9000->9000/tcp                     elasticsearchdemo_minio_1
7dcd7dfe38fd        elasticsearchdemo_fileserverweb          "/bin/sh -c 'sleep..."   36 seconds ago      Up 32 seconds                                                  elasticsearchdemo_fileserverweb_1
1529e5b94043        elasticsearchdemo_twitter                "/bin/sh -c 'npm i..."   36 seconds ago      Up 1 second                                                    elasticsearchdemo_twitter_1
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
