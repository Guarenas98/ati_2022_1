FROM nimmis/apache-php7
COPY . /var/www/html/
WORKDIR /var/www/html/
EXPOSE 80

# docker build -t reto18_img .
# docker run -tid --name reto18_cont -p 8080:80 reto18_img