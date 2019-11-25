FROM composer as builder

COPY composer.json /app/composer.json

RUN composer install --prefer-dist --optimize-autoloader

FROM codeception/codeception

COPY --from=builder /app /app

WORKDIR /app
