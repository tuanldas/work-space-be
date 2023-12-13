# Work Space

## Chuẩn bị môi trường

```bash
cp .env.example .env
cp docker-compose-prod.yml docker-compose.override.yml # prod, local
docker network create ${PUBLISH_NETWORK}
```


## Build Docker images and containers

```bash
docker-compose build
```


## Bật các container

```bash
docker-compose up -d
```

## Cấu hình môi trường 

```bash
docker-compose exec php-fpm composer update
docker-compose exec php-fpm php artisan cache:clear
docker-compose exec php-fpm php artisan config:clear
docker-compose exec php-fpm composer dump-autoload
```

## Cài đặt node

```bash
docker-compose exec php-fpm npm i
docker-compose exec php-fpm npm run dev # local
docker-compose exec php-fpm npm run prod # production
```

## Chạy migration and seeding

```bash
docker-compose exec php-fpm php artisan migrate
docker-compose exec php-fpm composer dump-autoload
docker-compose exec php-fpm php artisan db:seed
```
