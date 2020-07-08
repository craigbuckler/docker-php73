FROM php:7.3-apache

RUN a2enmod ssl
RUN a2enmod rewrite

RUN mkdir -p /etc/apache2/ssl
COPY ./ssl/*.pem /etc/apache2/ssl/
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
EXPOSE 443
