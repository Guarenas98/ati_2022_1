FROM php:7.4-apache
WORKDIR /var/www/html
# COPY . .

ENV PORT=80
EXPOSE 80

# sudo docker exec -ti reto17 /bin/bash