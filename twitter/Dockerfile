FROM ubuntu
RUN apt-get update;apt-get install -y nodejs npm
COPY * /scality-twitter/
WORKDIR /scality-twitter
CMD npm install;nodejs main.js
