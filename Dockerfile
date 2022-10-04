FROM php:7.4-apache
COPY 27223295/ /var/www/html/27223295/
COPY css/ /var/www/html/css/

ENV PORT=80
EXPOSE 80