FROM nimmis/apache-php7
COPY . /var/www/html/
EXPOSE 80

# docker build -t reto17_img .
# docker run -tid --name reto17_cont -p 8080:80 reto17_img