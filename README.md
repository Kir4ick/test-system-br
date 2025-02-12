Тестовое задание для ООО Система бронирования
---

Старт проекта:

```shell
cp .env.example .env
```

Настроить конфигурацию в .env файле:

DB_HOST \
DB_PORT \
DB_DATABASE \
DB_USERNAME\
DB_PASSWORD\
MYSQL_ROOT_PASSWORD

Поднятие приложения
```shell
docker compose up -d
```

Библиотеки
```shell
docker exec -it application composer install
```

Ключ
```shell
docker exec -it application php artisan key:generate
```

Миграции
```shell
docker exec -it application php artisan migrate
```

Засев бд
```shell
docker exec -it application php artisan db:seed
```


На главной странице выбор отеля происходит по ключу hotel_id
---
