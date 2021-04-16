FROM php:8.0.3-apache
RUN docker-php-ext-install pdo pdo_mysql

COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

COPY . /var/www
CMD ["apache2-foreground"]