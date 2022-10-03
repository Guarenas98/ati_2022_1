FROM php:8.0-apache
COPY 27223295/ /var/www/html
COPY css/ /var/www/html
EXPOSE 80