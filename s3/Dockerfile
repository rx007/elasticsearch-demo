FROM ubuntu
USER root
VOLUME /data
VOLUME /metadata
ENV S3DATAPATH "/data"
ENV S3METADATAPATH "/metadata"
RUN apt-get update;apt-get install -y git curl build-essential python
RUN curl -sL https://deb.nodesource.com/setup_7.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt-get install -y nodejs
RUN git clone https://github.com/scality/S3.git /usr/src/app
WORKDIR /usr/src/app
RUN npm install
CMD [ "npm", "start" ]
