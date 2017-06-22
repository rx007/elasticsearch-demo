FROM ubuntu
RUN apt-get update;apt-get install -y nodejs npm
COPY * /delays/
ADD airline_delay_causes.csv /delays/
WORKDIR /delays
CMD sleep 120;npm install;nodejs main.js
