FROM php:7.2-apache

COPY 25641163/ /var/www/html/

EXPOSE 80


#CMD [ "php", "./25641163/perfil.php" ]


#docker build -t my-first-php-app:v1.1 .
# docker run -dti -v $(pwd)/25641163:/var/www/html/ -p 8080:80 --name my-first-app-php  my-first-php-app:v1.1
