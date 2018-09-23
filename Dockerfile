FROM php:7.2.10-apache
#RUN apt-get update && apt-get install -y tzdata && apt-get install -y apache2 php libapache2-mod-php curl net-tools iputils-ping && apt-get clean && rm -rf /var/lib/apt/lists/*
#ENV APACHE_RUN_USER www-data
#ENV APACHE_RUN_GROUP www-data
#ENV APACHE_LOG_DIR /var/log/apache2
#ENV APACHE_RUN_DIR /var/run/apache2

ENV APACHE_DOCUMENT_ROOT /var/www/html

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN rm -rf /var/www/html/*
#RUN mkdir /var/run/apache2

#RUN echo "<!DOCTYPE html><html><body><h1>Pocksquash</h1><p>A Paragraph</p></body></html>" >> /var/www/html/index.html
#COPY $(Build.SourcesDirectory)/* /var/www/html/. 
#COPY /home/vsts/work/1/s/.git/* /var/www/html/.
COPY . /var/www/html/.

EXPOSE 80
#CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]