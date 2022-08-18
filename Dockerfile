# Image #
FROM ubuntu

# apt-get stuff #

RUN apt-get update && \
apt-get -y upgrade && \
apt-get install nano && \
apt install net-tools

# Apache2 #

RUN apt-get -y install apache2
RUN a2enmod proxy && \
a2enmod proxy_http && \
a2enmod rewrite && \
a2enmod deflate && \
a2enmod headers && \
a2enmod proxy_balancer && \
a2enmod proxy_connect && \
a2enmod proxy_html && \
a2enmod xml2enc


# PHP7.2 #
RUN apt install -y software-properties-common && \
add-apt-repository ppa:ondrej/php && \
DEBIAN_FRONTEND=noninteractive apt install -y php7.2 && \
apt-get -y install php-pear php7.2-dev php7.2-zip php7.2-curl && \
apt-get install php7.2-gd php7.2-mysql php7.2-xml

#DOCKER LISTENER ON PORT 90
EXPOSE 90 

