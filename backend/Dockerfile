FROM php:8.2-apache
COPY index.php /var/www/html/
RUN sed -i 's/80/8088/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
EXPOSE 8088
