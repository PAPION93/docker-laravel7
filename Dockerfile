# step 1
FROM php:7.4.3-fpm-alpine3.11 AS custom-laravel

# step 2
WORKDIR /root

RUN apk update && \
        apk add -u vim procps tzdata bash curl zip git zlib-dev libzip-dev icu-dev && \
        rm -rf /var/cache/apk/*

RUN cp /usr/share/zoneinfo/Asia/Seoul /etc/localtime
RUN echo "Asia/Seoul" > /etc/timezone

# step 3
# Composer Install
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer
RUN ["/bin/bash", "-c", "echo PATH=$PATH:~/.composer/vendor/bin/ >> ~/.bashrc"]
RUN ["/bin/bash", "-c", "source ~/.bashrc"]

# step 4
# PHP Extension Install
RUN docker-php-ext-install opcache
RUN docker-php-ext-install intl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo_mysql
#RUN docker-php-ext-install opcache intl bcmath zip pdo_mysql
#RUN docker-php-ext-install mbstring tokenizer xml ctype fileinfo json

# step 5
# PHP Config
RUN cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini && \
        sed -i "s/display_errors = Off/display_errors = On/" /usr/local/etc/php/php.ini && \
        sed -i "s/upload_max_filesize = .*/upload_max_filesize = 10M/" /usr/local/etc/php/php.ini && \
        sed -i "s/post_max_size = .*/post_max_size = 12M/" /usr/local/etc/php/php.ini && \
        sed -i "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/" /usr/local/etc/php/php.ini && \
        sed -i "s/variables_order = .*/variables_order = 'EGPCS'/" /usr/local/etc/php/php.ini && \
        #    sed -i "s/;error_log =.*/error_log = \/proc\/self\/fd\/2/" /usr/local/etc/php-fpm.conf && \
        sed -i "s/listen = .*/listen = 9000/" /usr/local/etc/php-fpm.d/www.conf && \
        sed -i "s/pm.max_children = .*/pm.max_children = 200/" /usr/local/etc/php-fpm.d/www.conf && \
        sed -i "s/pm.start_servers = .*/pm.start_servers = 56/" /usr/local/etc/php-fpm.d/www.conf && \
        sed -i "s/pm.min_spare_servers = .*/pm.min_spare_servers = 32/" /usr/local/etc/php-fpm.d/www.conf && \
        sed -i "s/pm.max_spare_servers = .*/pm.max_spare_servers = 96/" /usr/local/etc/php-fpm.d/www.conf && \
        sed -i "s/^;clear_env = no$/clear_env = no/" /usr/local/etc/php-fpm.d/www.conf

# step 6
# download the Laravel installer using Composer
RUN composer global require laravel/installer
# composer Speed faster
RUN composer config -g repos.packagist composer https://packagist.jp
RUN composer global require hirak/prestissimo
# permission
#RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache/

# step 7
# Bind Port
EXPOSE 9000

CMD ["php-fpm"]