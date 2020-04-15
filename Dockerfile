# step 1
FROM php:7.4.3-fpm-alpine3.11 AS custom-laravel

# step 2
WORKDIR /root

RUN apk update \
        && apk add -u vim procps tzdata bash curl libzip libzip-dev \
        && rm -rf /var/cache/apk/*

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
RUN docker-php-ext-install zip
#RUN docker-php-ext-install bcmath
#RUN docker-php-ext-install mbstring
#RUN docker-php-ext-install tokenizer
#RUN docker-php-ext-install xml
#RUN docker-php-ext-install ctype
#RUN docker-php-ext-install fileinfo
#RUN docker-php-ext-install json
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql

# step 5
# download the Laravel installer using Composer
RUN composer global require laravel/installer

# step 6
# Bind Port
EXPOSE 80
EXPOSE 9000
EXPOSE 9001
EXPOSE 9002

CMD ["php-fpm"]

RUN mkdir laravel-project
WORKDIR /root/laravel-project