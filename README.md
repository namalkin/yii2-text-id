<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Шаблон проекта Yii 2 Basic</h1>
    <br>
</p>

Шаблон проекта Yii 2 Basic — это каркас приложения [Yii 2](https://www.yiiframework.com/), который идеально подходит для быстрой разработки небольших проектов.

Этот шаблон включает базовые функции, такие как вход и выход пользователей и страницу обратной связи.
Он содержит все стандартные настройки, позволяющие сосредоточиться на добавлении новых возможностей в приложении.

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

ТРЕБОВАНИЯ
------------

Минимальные требования к шаблону проекта — поддержка PHP 7.4 на веб-сервере.

УСТАНОВКА
------------

### Установка через Composer

Если у вас нет [Composer](https://getcomposer.org/), установите его, следуя инструкциям на [getcomposer.org](https://getcomposer.org/doc/00-intro.md#installation-nix).

Вы можете установить этот шаблон проекта с помощью следующей команды:

~~~
composer create-project --prefer-dist yiisoft/yii2-app-basic basic
~~~

Теперь вы сможете получить доступ к приложению по следующему URL (предполагая, что `basic` — директория под корнем Web):

~~~
http://localhost/basic/web/
~~~

### Установка из архива

Распакуйте архив, скачанный с [yiiframework.com](https://www.yiiframework.com/download/), в директорию с именем `basic`, которая находится под корнем Web.

Установите ключ валидации куки в файле `config/web.php`, используя случайную секретную строку:

```php
'request' => [
    'cookieValidationKey' => '<секретная случайная строка>',
],
```

Теперь вы можете получить доступ к приложению по следующему URL:

~~~
http://localhost/basic/web/
~~~

### Установка с помощью Docker

Обновите пакеты vendor

    docker-compose run --rm php composer update --prefer-dist
    
Выполните триггеры установки (создание кода для валидации куки)

    docker-compose run --rm php composer install    

Запустите контейнер

    docker-compose up -d
    
Теперь вы можете получить доступ к приложению по следующему URL:

    http://127.0.0.1:8000

**ЗАМЕЧАНИЯ:** 
- Минимальная версия Docker `17.04` для разработки (см. [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/))
- По умолчанию используется volume в домашней директории `.docker-composer` для кэшей Composer

КОНФИГУРАЦИЯ
-------------

### База данных

Отредактируйте файл `config/db.php`, указав реальные данные, например:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**ЗАМЕЧАНИЯ:**
- Yii не создаёт базу данных автоматически — её нужно создать вручную до использования.
- Проверьте и при необходимости отредактируйте другие файлы в директории `config/`, чтобы настроить приложение под себя.
- Прочитайте README в директории `tests` для информации, относящейся к тестам базового приложения.

ТЕСТИРОВАНИЕ
-------

Тесты находятся в директории `tests`. Они разработаны с использованием [Codeception PHP Testing Framework](https://codeception.com/).
По умолчанию есть 3 тестовых набора:

- `unit`
- `functional`
- `acceptance`

Тесты можно запустить с помощью команды

```
vendor/bin/codecept run
```

Эта команда выполнит unit и функциональные тесты. Unit-тесты проверяют компоненты системы, а функциональные тесты проверяют взаимодействие с пользователем. Acceptance-тесты по умолчанию отключены, так как они требуют дополнительной настройки для работы в браузере.

### Запуск acceptance-тестов

Чтобы запустить acceptance-тесты, выполните следующее:

1. Переименуйте `tests/acceptance.suite.yml.example` в `tests/acceptance.suite.yml`, чтобы включить конфигурацию набора.

2. Замените пакет `codeception/base` в `composer.json` на `codeception/codeception`, чтобы установить полную версию Codeception.

3. Обновите зависимости с помощью Composer:

    ```
    composer update  
    ```

4. Скачайте [Selenium Server](https://www.seleniumhq.org/download/) и запустите его:

    ```
    java -jar ~/selenium-server-standalone-x.xx.x.jar
    ```

    Для работы с Selenium Server 3.0 и Firefox версии 48+ или Google Chrome версии 53+ скачайте [GeckoDriver](https://github.com/mozilla/geckodriver/releases) или [ChromeDriver](https://sites.google.com/a/chromium.org/chromedriver/downloads) и запустите Selenium с ним:

    ```
    # для Firefox
    java -jar -Dwebdriver.gecko.driver=~/geckodriver ~/selenium-server-standalone-3.xx.x.jar
    
    # для Google Chrome
    java -jar -Dwebdriver.chrome.driver=~/chromedriver ~/selenium-server-standalone-3.xx.x.jar
    ``` 
    
    Либо используйте готовый Docker-контейнер с Selenium и старой версией Firefox:
    
    ```
    docker run --net=host selenium/standalone-firefox:2.53.0
    ```

5. (Необязательно) Создайте базу данных `yii2basic_test` и примените миграции, если они есть.

   ```
   tests/bin/yii migrate
   ```

   Конфигурация базы данных находится в `config/test_db.php`.

6. Запустите веб-сервер:

    ```
    tests/bin/yii serve
    ```

7. Теперь можно запустить все доступные тесты:

   ```
   vendor/bin/codecept run  # запустить все тесты
   vendor/bin/codecept run acceptance  # запустить только acceptance-тесты
   vendor/bin/codecept run unit,functional  # запустить unit и функциональные тесты
   ```

### Поддержка покрытия кода

По умолчанию покрытие кода отключено в `codeception.yml`, чтобы включить его, раскомментируйте необходимые строки. Запустите тесты с покрытием, используя команду:

```
vendor/bin/codecept run --coverage --coverage-html --coverage-xml  # все тесты с покрытием
vendor/bin/codecept run unit --coverage --coverage-html --coverage-xml  # только unit-тесты
vendor/bin/codecept run functional,unit --coverage --coverage-html --coverage-xml  # unit и functional с покрытием
```

Отчёт о покрытии будет доступен в директории `tests/_output`.