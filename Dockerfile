FROM ubuntu:latest
RUN apt-get update && apt-get install -y tzdata && apt-get install -y apache2 php7.0 net-tools iputils-ping && apt-get clean && rm -rf /var/lib/apt/lists/*
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_RUN_DIR /var/run/apache2
RUN rm -rf /var/www/html/*
RUN mkdir /var/run/apache2

#RUN echo "<!DOCTYPE html><html><body><h1>Pocksquash</h1><p>A Paragraph</p></body></html>" >> /var/www/html/index.html
#COPY $(Build.SourcesDirectory)/* /var/www/html/. 
COPY /home/vsts/work/1/s/.git/* /var/www/html/.

EXPOSE 80
CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]