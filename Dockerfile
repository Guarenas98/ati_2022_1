FROM php:7.2-apache
COPY / /var/www/html
EXPOSE 80

# docker build -t perfil_php .
# docker run -p 3000:80 perfil_php