FROM mariadb AS custom-mariadb

RUN apt-get update \
        && apt-get -y install vim

COPY initdb.sql /docker-entrypoint-initdb.d/