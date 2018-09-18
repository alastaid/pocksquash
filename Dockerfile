FROM ubuntu:latest
RUN apt-get update && apt-get install -y tzdata && apt-get install -y apache2 php7.0 && apt-get clean && rm -rf /var/lib/apt/lists/*
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
RUN rm -rf /var/www/*
RUN echo "<!DOCTYPE html><html><body><h1>Pocksquash</h1><p>A Paragraph</p></body></html>" >> /var/www/index.html
#COPY . /var/www

EXPOSE 8080
CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]