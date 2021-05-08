# ABOUT

This is a simple CRUD app to to keep track of your ideas.

![Screenshot of sample ideas and their descriptions in a DataTable.net](https://repository-images.githubusercontent.com/364119798/c8419780-adc0-11eb-8754-e5b60a18ef9d)


# INSTALL

(*Not tested yet.*)

(*Main branch is called 'main'.*)


* cd to your dev directory (e.g. cd ~/dev)
* Install git
* git@github.com:shmooth/ideatracker.git (create and install your .ssh keys in github.com if necessary) OR
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
* artisan migrate (this creates the appropriate tables in the db)


# Run

* npm run hot (makes sure any (most) of your changes are reflected in auto-reloaded web page/app)
* artisan serve --host=localhost


# View

Go to 
    
    http://localhost:8000/login

Register a new user here so you can log in:

    http://localhost:8000/register

    Verification link will show up in log file at [apphome]/storages/logs/laravel.log. Copy and paste it.


# Misc

To seed the database with example data (as in the screenshot):

    > artisan db:seed

To get a list of HTTP routes, API and web:

    > artisan route:list

It can be helpful to set the path to artisan so that you can execute it from anywhere in your directory structure:

    > alias artisan='/home/psmithsf/dev/ideatracker/artisan'

    Store this in your ~/.bashrc if you like.

Roll back everything in the db to empty:

    > artisan migrate:reset

    Note, this will kill your login, too. You'll have to re-register.




