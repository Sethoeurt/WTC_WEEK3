FROM php:8.3-rc-fpm-alpine
WORKDIR /usr/src/myapp
COPY . .
CMD [ "php", "./src/process.php" ]
