# Utiliza la imagen oficial de PHP como base
FROM php:8.1-fpm

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Instala las extensiones PHP necesarias para Symfony
RUN docker-php-ext-install pdo pdo_mysql

# Copia los archivos de tu proyecto al contenedor
COPY . .

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# Expone el puerto del servidor PHP-FPM
EXPOSE 9000

# Ejecuta el servidor PHP-FPM
CMD ["php-fpm"]
