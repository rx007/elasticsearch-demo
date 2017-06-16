#!/bin/bash
FILE='/configured.txt'

if [ ! -f "$FILE" ]
then
  echo 'network.host: ' `echo ${HOSTNAME}` >> /opt/elasticsearch*/config/elasticsearch.yml
  echo 'node.name: ' `echo ${HOSTNAME}` >> /opt/elasticsearch*/config/elasticsearch.yml
  echo 'discovery.zen.ping.unicast.hosts:' `echo $nodes` >> /opt/elasticsearch*/config/elasticsearch.yml
  # Format ["rpi-5", "rpi-2", "rpi-6"\]

  if [ "$mode" == "master" ]; then
  sed -i 's/2g/100m/g' /opt/elasticsearch*/config/jvm.options
  echo 'node.master: true' >> /opt/elasticsearch-5.4.1/config/elasticsearch.yml
  fi

  if [ "$mode" == "slave" ]; then
  sed -i 's/2g/200m/g' /opt/elasticsearch*/config/jvm.options
  echo 'node.data: true' >> /opt/elasticsearch-5.4.1/config/elasticsearch.yml
  echo 'node.master: false' >> /opt/elasticsearch-5.4.1/config/elasticsearch.yml
  fi
  touch /configured.txt
fi

su - elasticsearch -c "/opt/elasticsearch*/bin/elasticsearch"
