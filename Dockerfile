FROM ubuntu:latest
RUN apt-get update && apt-get install -y apache2 php7.0 libapache2-mod-php7.0 && apt-get clean && rm -rf /var/lib/apt/lists/*
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

EXPOSE 8080
CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]