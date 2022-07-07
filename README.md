# SocialNetwork
Проект - социальная сеть


## Установка зависимостей и запуск контейнеров Docker
```bash
npm install
composer install
docker-compose up -d
```
## Локальная разработка
```bash
npm run watch
php artisan serve 
```
## Развертывание на сервере с [конфигурацией](https://github.com/DoomerKitchen/BackendEnvironment)
- Склонировать данный репозиторий в папку backend
- .env.example -> .env 
-```bash
php artisan key:generate    

## Запуск PHPStan
```
make analyse
```
