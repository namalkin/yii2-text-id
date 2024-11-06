<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Шаблон проекта Yii 2 Basic</h1>
    <br>
</p>

Используя шаблон проекта Yii 2 Basic - каркас приложения [Yii 2](https://www.yiiframework.com/), который идеально подходит для быстрой разработки небольших проектов. Создал миграцию на добавление сообщений, от неё через gii сделал модель `Message` с полями `id` и `text` в новой ветке. Создал контроллер через `MessageController` в котором реализовал два действия `actionView` и `actionCreate`  для просмотра и создания сообщений. При добавлении сообщений, ответ приходит telegram пользователю. 

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

СТРУКТУРА ДИРЕКТОРИЙ
-------------------

      assets/             содержит определения для активов
      commands/           содержит консольные команды (контроллеры)
      config/             содержит конфигурационные файлы приложения
      controllers/        содержит классы Web-контроллеров
      mail/               содержит представления для писем
      models/             содержит классы моделей
      runtime/            содержит файлы, создаваемые в процессе выполнения
      tests/              содержит различные тесты для базового приложения
      vendor/             содержит сторонние пакеты зависимостей
      views/              содержит файлы представлений для Web-приложения
      web/                содержит скрипт входа и Web-ресурсы

Ресрусы
------------

php: 8.1-apache
mysql: 5.7
Docker: 24.0.5

ЗАПУСК
------------

Приложение разворачивалось черзе Docker:

Обновите пакеты vendor
~~~
docker-compose run --rm php composer update --prefer-dist
~~~
    
Выполните триггеры установки
~~~
docker-compose run --rm php composer install    
~~~

Запуск
~~~
docker-compose up -d 
~~~

после запуска доступно, как 
~~~
http://localhost:8000/
~~~

КОНФИГУРАЦИЯ
-------------

### База данных

`mysql` была подключена через Docker, вместо localhost:

`db.php`
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=db;dbname=yii2basic',
    'username' => 'root',
    'password' => 'passroot',
    'charset' => 'utf8',
];
```

`params.php`
```php
return [
    'telegramChatId' => '1273867987',
];
```

`web.php`
```php
'telegram' => [
    'class' => 'aki\telegram\Telegram',
    'botToken' => '1234:AAGjLqReTw9PqXziqxYmT4pjEffFOmd8',
],
```

**ЗАМЕЧАНИЯ:**

Файлы миграции.

Если надо будет ввести
~~~
docker ps
docker exec -it <CONTAINER ID> bash
php yii migrate
~~~

ИТОГО
-------------
