FROM php:8.3.4RC1-apache
COPY . /brunolee/www/phpdockerteste 
WORKDIR /brunolee/www/phpdockerteste 
CMD [ "php", "./index.php" ]