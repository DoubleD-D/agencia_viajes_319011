FROM php:8.2-apache

# 1. Instalar dependencias del sistema necesarias para Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# 2. Limpiar caché para mantener la imagen ligera
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Instalar extensiones de PHP requeridas por Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 4. Instalar Composer (Gestor de paquetes)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Configurar Apache para Laravel (DocumentRoot debe ser /public)
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 6. Habilitar mod_rewrite para las rutas bonitas de Laravel
RUN a2enmod rewrite

# 7. Establecer directorio de trabajo
WORKDIR /var/www/html
