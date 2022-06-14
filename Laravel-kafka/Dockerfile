FROM docker.io/bitnami/laravel:9

RUN set -xe \
    && apt-get update \
    && apt-get install -y autoconf \
    && apt-get install -y build-essential \
    && apt-get install -y librdkafka-dev git zip unzip wget \
    && pecl install rdkafka \
    && echo "extension=rdkafka.so" > '/opt/bitnami/php/lib/php.ini'
