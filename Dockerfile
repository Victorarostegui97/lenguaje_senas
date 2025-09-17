# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Copia todos los archivos de tu repositorio al servidor web
COPY . /var/www/html/

# Da permisos correctos a la carpeta de tu proyecto
RUN chown -R www-data:www-data /var/www/html

# Expone el puerto 80 para que Render pueda acceder
EXPOSE 80

# Apache ya se inicia automáticamente al usar esta imagen
