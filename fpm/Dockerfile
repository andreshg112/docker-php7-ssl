FROM ubuntu:latest

RUN apt-get update && apt-get install -y software-properties-common language-pack-en-base \
    && LC_ALL=en_US.UTF-8 add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php7.4 php7.4-fpm php7.4-mysql mcrypt php7.4-gd curl \
       php7.4-curl php-redis php7.4-mbstring sendmail supervisor \
    && mkdir /run/php \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN sed -i -e 's/listen = \/run\/php\/php7.4-fpm.sock/listen = 0.0.0.0:9000/g' /etc/php/7.4/fpm/pool.d/www.conf \
    && sed -i -e 's/;daemonize = yes/daemonize = no/g' /etc/php/7.4/fpm/php-fpm.conf

WORKDIR /var/app

EXPOSE 9000

CMD ["/usr/bin/supervisord"]