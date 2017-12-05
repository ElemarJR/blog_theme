# Image for Node dependencies
#
# The packages installed in this image
#
# Alpine packages
# git - Bower dependency
# openssh - Git dependency
# automake - Node imagemin packages build dependency
# git - Node imagemin packages build dependency
# alpine-sdk - Node imagemin packages build dependency
# nasm - Node imagemin packages build dependency
# autoconf - Node imagemin packages build dependency
# build-base - Node imagemin packages build dependency
# zlib - Node imagemin packages build dependency
# zlib-dev - Node imagemin packages build dependency
# libpng - Imagemin dependency
# libpng-dev - Imagemin dependency
# libwebp - Imagemin dependency
# libwebp-dev - Imagemin dependency
# libjpeg-turbo - Imagemin dependency
# libjpeg-turbo-dev - Imagemin dependency
#
# https://github.com/sindresorhus/gulp-imagemin/issues/236#issuecomment-292611025
#
# Node global packages
# grunt - Grunt task runner
# bower - Frontend package manager
FROM node:alpine

# Install Alpine packages
RUN apk update && apk upgrade && \
	apk add --no-cache \
		bash \
		git \
		openssh \
		automake \
		git \
		alpine-sdk  \
		nasm  \
		autoconf  \
		build-base \
		zlib \
		zlib-dev \
		libpng \
		libpng-dev\
		libwebp \
		libwebp-dev \
		libjpeg-turbo \
		libjpeg-turbo-dev

# Install Node global packages
RUN npm install -g grunt-cli bower

# Add PHP vendors binaries to the PATH
ENV PATH="/app/vendor/bin:${PATH}"

# Allow use Bower as root
RUN echo '{ "allow_root": true }' > /root/.bowerrc

# Define working directory.
WORKDIR /app

# Expose livereload port
EXPOSE 35729
