FROM ubuntu
RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt install -y net-tools
RUN apt-get install -y apache2 
RUN apt-get install -y vim-tiny
RUN a2enmod proxy
RUN a2enmod proxy_http
RUN a2enmod rewrite
RUN a2enmod deflate
RUN a2enmod headers
RUN a2enmod proxy_balancer
RUN a2enmod proxy_connect
RUN a2enmod proxy_html
RUN a2enmod xml2enc

# php7.2 https://askubuntu.com/questions/1230869/cant-install-php-7-2-on-ubuntu-20-04
RUN apt install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt install -y php7.2
RUN update-alternatives --set php /usr/bin/php7.2
RUN a2enmod php7.2
RUN apt-get install -y php-pear php7.2-dev php7.2-zip php7.2-curl
RUN apt-get install -y php7.2-gd php7.2-mysql php7.2-xml