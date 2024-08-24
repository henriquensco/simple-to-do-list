FROM php:8.1-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd mysqli pdo pdo_mysql zip

# Instala o Composer
RUN curl -o composer.phar https://getcomposer.org/composer.phar \
    && chmod +x composer.phar \
    && mv composer.phar /usr/local/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o código fonte para o container
COPY ./app /var/www/html

# Configura permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Executa o Composer para instalar dependências
RUN composer install --prefer-dist --no-dev --no-scripts --no-autoloader

# Expõe a porta do PHP-FPM
EXPOSE 9000
