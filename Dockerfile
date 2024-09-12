FROM ctftraining/base_image_nginx_mysql_php_56

COPY src /var/www/html
COPY file/flag.sh /flag.sh

RUN chown -R www-data:www-data /var/www/html