FROM ubuntu:24.10
RUN apt-get update;apt-get install -y nodejs npm
COPY * /delays/
WORKDIR /delays
RUN npm install
CMD sleep 120;nodejs main.js
