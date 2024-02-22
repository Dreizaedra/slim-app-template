# Utilisez l'image PHP 8.2
FROM php:8.2-apache

# Installez les dépendances nécessaires, y compris php-gd et ext-zip
RUN apt update
RUN apt install -y \    
    git \    
    curl \    
    libldap2-dev \    
    libicu-dev \    
    libonig-dev \    
    libcurl4-openssl-dev \    
    libsodium-dev \    
    unzip \    
    zip \    
    libzip-dev \    
    libpq-dev \    
    libxml2-dev \    
    libfreetype6-dev \    
    libjpeg62-turbo-dev \    
    libpng-dev

RUN docker-php-ext-install \    
    curl \    
    ldap \    
    intl \    
    mbstring \    
    pdo_mysql \    
    pdo_pgsql \    
    sodium \    
    zip \    
    soap
# Installez l'extension php-gd
# RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \    
#     docker-php-ext-install -j$(nproc) gd

# Activez le module Apache rewrite
RUN a2enmod rewrite

# Ajoutez la directive ServerName pour résoudre le message d'avertissement
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copiez les fichiers de votre application dans le conteneur
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Définissez le répertoire de travail
WORKDIR /app

ENV COMPOSER_ALLOW_SUPERUSER=1

# Exposez le port si votre application nécessite un port spécifique
EXPOSE 8000