========================================================================================
=== LaravelCRUDBootstrap5 === Sail =====================================================
----------------------------------------------------------------------------------------

0 === установка Composer с оф-сайта https://getcomposer.org/download/

1 === подготовка

sudo apt update 
sudo apt upgrade

2 === переход в папку с проектом
cd /home/aleksandr/projects/LaravelCRUDBootstrap5/

3 === установка 
composer create-project laravel/laravel laravel-crud

4 === копируем все файлы с папки laravel-crud в .  (точка это текущая папка->/projects/LaravelCRUDBootstrap5/)
	Опция -a означает архивный режим, сохраняя все атрибуты и рекурсивно копируя содержимое.
rsync -a laravel-crud/ ./
	рекурсивное сравнение 2-ух каталогов текущего и laravel-crud
diff -r laravel-crud .

5 === проверяем artisan
php artisan
	создать символическую ссылку для доступа к папке storage
php artisan storage:link 

3 === Sail - это пакет Laravel, который включает в себя сервер, базу данных и другие сервисы, используя Docker контейнеры
composer require laravel/sail --dev

6 === Установка Sail в Laravel. Выбрать базу данных из списка mysql(по умолчанию)
php artisan sail:install

 ┌ Which services would you like to install? ───────────────────┐
 │ › ◼ mysql                                                  ┃ │
 │   ◻ pgsql                                                  │ │
 │   ◻ mariadb      


7 === Редактируем файл .env для создания базы данных
Заходим в редактор кода и редактируем строки 
в файле .env путь в моем проекте /home/aleksandr/projects/LaravelCRUDBootstrap5/.env

APP_NAME="Laravel Store"
...
APP_URL=http://localhost

LOG_CHANNEL=daily
...

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_crud
DB_USERNAME=root
DB_PASSWORD=password

обязательно DB_USERNAME=root !!! иначе нет прав доступа возможно еще sail будет работаь

8 === запуск alias убирает необходимость указывать полный путь к командам ./vendor/bin/sail
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
	
9 === запуск контейнеров сервера базы данных
sail up -d
	проверка версии
sail php --version

+++ Другие команды (Полный список sail list-commands или sail help в командной строке)
  sail up        запустить контейнеры без доступа к командной строке, нужно открывать другую вкладку терминала для ввода
  sail up -d     запустить контейнеры с доступом к командной строке (в фоне)
  sail stop      остановить контейнеры
  !!! sail down  выгрузит с потерей данных по описанию (не проверял)
  sail restart   перезапуск
  sail ps        список запущенных контейнеров

10 === Если нет ключей то генерируем
	!!! Все команды php artisan ... заменяются на sail artisan ...
!!! sail artisan key:generate

11 === линк для storage в sail
sail artisan storage:link

стартовая страница http://localhost/

12 === проверка для базы данных создалась подключилась если миграция успешна
sail artisan migrate

выбрать Yes
   WARN  The database 'laravel_shop' does not exist on the 'mysql' connection.  

 ┌ Would you like to create it? ────────────────────────────────┐
 │ ● Yes / ○ No                                         
 └──────────────────────────────────────────────────────────────┘
