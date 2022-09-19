FROM nimmis/apache-php7
COPY . /var/www/html/
EXPOSE 80

# docker build -t reto19_img .
# docker run -tid --name reto19_cont -p 8080:80 reto19_img