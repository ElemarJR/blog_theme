# Image for PHP dependencies
#
# The packages and extension installed in this image
# Credits: https://github.com/docker-library/wordpress
#
# Alpine packages
# bash              - To execute the bin scripts
# libjpeg-turbo-dev - Thumbnail generator
# libpng-dev        - Thumbnail generator
# mysql-client      - To WP-CLI access the database
# openssh-client    - To deploy the application and MySQL server access
#
# PHP extensions
# gd      - Thumbnail generator
# mysqli  - MySQL server access
# opcache - Improve performance
FROM php:7.1-alpine

# Install alpine packages
RUN apk add --update bash mysql-client openssh-client

# install the PHP extensions we need
RUN set -ex; \
	\
	apk add --no-cache --virtual .build-deps \
		bash \
		libjpeg-turbo-dev \
		libpng-dev \
		mysql-client \
		openssh-client \
	; \
	\
	docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr; \
	docker-php-ext-install gd mysqli opcache; \
	\
	runDeps="$( \
		scanelf --needed --nobanner --format '%n#p' --recursive /usr/local/lib/php/extensions \
			| tr ',' '\n' \
			| sort -u \
			| awk 'system("[ -e /usr/local/lib/" $1 " ]") == 0 { next } { print "so:" $1 }' \
	)"; \
	apk add --virtual .wordpress-phpexts-rundeps $runDeps; \
	apk del .build-deps

# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=2'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# Add vendors binaries to the PATH
ENV PATH="/app/vendor/bin:${PATH}"

COPY entrypoint /usr/local/bin/

WORKDIR /app

ENTRYPOINT ["entrypoint"]

# Expose HTTP server port
EXPOSE 8080
