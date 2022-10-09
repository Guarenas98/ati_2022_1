FROM php:7.2-apache
COPY 27223295/ /var/www/html/27223295/
COPY css/ /var/www/html/css/

ENV PORT=80
EXPOSE 80

# docker build -t reto17 ./

# docker run -tid -p 8080:80 --name container_reto17 reto17

# http://localhost:8080/27223295/perfil.php