FROM ubuntu
RUN apt-get update;apt-get install -y nodejs npm
COPY * /twitter/
WORKDIR /twitter
CMD npm install;nodejs main.js
