FROM ubuntu
RUN apt-get update;apt-get install openjdk-8-jdk tar wget -y
RUN wget -q -O eleastic-search.tar.gz https://artifacts.elastic.co/downloads/elasticsearch/elasticsearch-5.4.1.tar.gz
RUN tar xf eleastic-search.tar.gz -C /opt/
RUN useradd -s /bin/bash elasticsearch -d /home/elasticsearch -m
RUN chown -R elasticsearch:elasticsearch /opt/elasticsearch*
RUN sed -i 's/#network.host: 192.168.0.1/network.host: 0.0.0.0/i' /opt/elasticsearch*/config/elasticsearch.yml
RUN sed -i 's/2g/300m/g' /opt/elasticsearch*/config/jvm.options
CMD su - elasticsearch -c "/opt/elasticsearch*/bin/elasticsearch"
