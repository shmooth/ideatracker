# ABOUT

This is a simple CRUD app to to keep track of your ideas, so you can see which pit to sink your time, money, and dreams into.


#INSTALL

(*Not tested yet.*)

(*Main branch is called 'main'.*)


* cd to your dev directory (e.g. cd ~/dev)
* Install git
* git@github.com:shmooth/ideatracker.git (create and install your .ssh keys in github.com if necessary)
        OR
* git clone https://github.com/shmooth/ideatracker.git 
* Copy .env.example file to .env
* Update .env file
   
        DB_CONNECTION=mysql
        DB_HOST=localhost
        DB_PORT=3306
        DB_DATABASE=ideatracker
        DB_USERNAME=ideatracker
        DB_PASSWORD=password
        ...
        MAIL_MAILER=log # change from 'smtp' (email will now print to [projecthome]/storage/logs/laravel.log)
 
* Install PHP
* Install Node
* Install MariaDB
-   Create database 'ideatracker'
-   Create user 'ideatracker' with password 'password' (change to suit)
* composer update
* npm install
* npm run hot
* artisan migrate (this creates the appropriate tables in the db)


# RUN

Go to http://localhost:8000/login


# MISC


