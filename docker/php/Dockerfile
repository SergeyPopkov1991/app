FROM php:8.2-apache

# PHP-расширения
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Включаем mod_rewrite
RUN a2enmod rewrite

# Разрешаем .htaccess и явно открываем доступ к корню сайта
RUN sed -ri 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf \
    && printf '<Directory /var/www/html>\n\
    Options FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    DirectoryIndex index.php index.html\n\
    </Directory>\n' > /etc/apache2/conf-available/zz-site-allow.conf \
    && a2enconf zz-site-allow

# Dev-настройки PHP (можно убрать на проде)
RUN { \
    echo 'display_errors=On'; \
    echo 'display_startup_errors=On'; \
    echo 'error_reporting=E_ALL'; \
    } > /usr/local/etc/php/conf.d/dev.ini

