# Image for Node dependencies
#
# The packages installed in this image
#
# Alpine packages
# git - Bower dependency
# openssh - Git dependency
#
# Node global packages
# grunt - Grunt task runner
# bower - Frontend package manager
FROM node:alpine

# Install Alpine packages
RUN apk update && apk upgrade && \
	apk add --no-cache bash git openssh

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
