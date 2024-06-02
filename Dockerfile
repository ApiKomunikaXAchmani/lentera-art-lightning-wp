FROM wordpress:php8.1-fpm-alpine

# Copy the script and set permissions
COPY ./init/prep.sh /prep.sh
RUN chmod +x /prep.sh
