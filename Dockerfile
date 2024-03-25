FROM bitnami/laravel:10.3.3-debian-12-r6

COPY . /app

WORKDIR /app

RUN apt update && apt install php-pgsql -y
RUN phpenmod pdo_pgsql

RUN find / -type f -name '*.ini' -exec sed -i '/^\s*;extension=\(pgsql\|pdo_pgsql\)/s/;//' {} +

RUN composer install

