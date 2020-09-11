FROM romeoz/docker-apache-php:7.3

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
	mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/app/

EXPOSE 80 443