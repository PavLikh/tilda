## Docker сборка
- склонировать проект
- установить библиотеки \
`composer install -o`
- создать .env файл
- установить sail \
`php artisan sail:install`
- установить библиотеки \
`npm install`
- запустить собрать контейнеры \
`vendor/bin/sail up` или установить алиас, тогда \
`sail up`
- собрать фронт \
`npm run build`

##


- .env файл \
    DB_CONNECTION=mysql \
    DB_HOST=mysql \
    DB_PORT=3306 \
    DB_DATABASE=laravel \
    DB_USERNAME=sail \
    DB_PASSWORD=password