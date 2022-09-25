FROM ubuntu

RUN apt-get update && \
    apt-get install -y firefox && \
    apt-get install -y vim && \
    apt-get install apache2 && \
    apt-get install php7.2

