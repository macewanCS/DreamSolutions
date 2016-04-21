# DreamSolutions - EPL Business Plan Manager

Requirements
------------
- [Composer](https://getcomposer.org/download/)
- [Node Packet Manager/Node.js](https://nodejs.org/en/)
- [php](http://php.net/downloads.php)
- [mysql](http://dev.mysql.com/downloads/)

Installation (UNIX/OSX)
--------------------------------
1. Clone the repository <pre>git clone url</pre>

<b>Via the Command Line</b> (change working directory to /src/epl-business-plan-manager)

1. composer install
2. npm install (OSX will need to use sudo for permission purposes)
3. gulp
4. touch .env (edit the .env file and add the below to your new file, this is your config file, username and passwords must match your own setup)
  <pre>
    APP_ENV=local
    APP_DEBUG=true
    APP_KEY=SomeRandomString

    DB_HOST=127.0.0.1
    DB_DATABASE=EPL_database
    DB_USERNAME=root
    DB_PASSWORD=secret

    CACHE_DRIVER=file
    SESSION_DRIVER=file
  </pre>
5. php artisan key:generate
6. mysql -u root -p
7. create schema EPL_database;
8. exit
9. php artisan migrate
10. php artisan db:seed
11. php artisan serve
12. You should be able to now connect to http://localhost:8000/
13. You can now log in with any of the seeded data, which is available in this file (/src/epl-business-plan-manager/database/seeds/UsersTableSeeder.php)

Team Members
-------------
1. [Alan Yong](https://github.com/adfyong)
2. [Cody Moorhouse](https://github.com/codymoorhouse)
3. [Elliott Sobek](https://github.com/ElliottSobek)
4. [John Mulvany-Robbins](https://github.com/reboss)
