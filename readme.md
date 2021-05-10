# ABOUT

This is a simple CRUD app to to keep track of your ideas.

![Screenshot of sample ideas and their descriptions in a DataTable.net](https://repository-images.githubusercontent.com/364119798/c8419780-adc0-11eb-8754-e5b60a18ef9d)


# TTD

Basic CRUD functionality not fully implemented yet.


# INSTALL

(*Not tested yet.*)

(*Main branch is called 'main'.*)


* cd to your dev directory (e.g. `cd ~/dev`)
* `sudo apt-get install git`
    - Install git command line client
* Clone this repo (choose one)
    * `git clone git@github.com:shmooth/ideatracker.git` 
        - create and install your .ssh keys at/in github.com if necessary
    OR
    * `git clone https://github.com/shmooth/ideatracker.git`
        - this option may no longer be available b/c of new 2FA github policy 
* Copy `.env.example` file to `.env`
* Update `.env` file
   
        DB_CONNECTION=mysql
        DB_HOST=localhost
        DB_PORT=3306
        DB_DATABASE=ideatracker
        DB_USERNAME=ideatracker
        DB_PASSWORD=password
        ...
        # email will now print to [projecthome]/storage/logs/laravel.log, incl recovery emails
        MAIL_MAILER=log # change from 'smtp' 
 
* Install PHP
* Install Node
* Install MariaDB
    - Create database 'ideatracker'
    - Create user 'ideatracker' with password 'password' (change to suit)
* `composer update`
* `npm install`
* `artisan migrate` 
    - this creates the appropriate tables in the db


# Run

* `npm run hot` 
    - makes sure _most_ of your changes are reflected in auto-reloaded web page/app
* `artisan serve --host=localhost` 
    - runs your local dev server


# View

Go to 
    
    `http://localhost:8000/login`

Register a new user here so you can log in:

    `http://localhost:8000/register`

Verification link will show up in log file at `[apphome]/storages/logs/laravel.log`. Copy and paste it into browser.


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


# Gotchas / Lessons Learned

* If you're using jQuery with Vue3, and you don't have a jQuery-Vue plugin of some type installed, you might have to do some funky stuff. Below, I show how to pass 'this' to the jQuery `.on()` click event handler, so that we can use it and the other `this`, which is a different one/context (obviously?), within the callback. We use them both.

        211    // listen for the onClick event on all table rows (tr)
        212    $( "#myTable tbody" ).on( "click", "tr", {thisArg: this}, function(event) {
        213        //console.log(this);                // produces '<tr class="even">...</tr>'
        214        //console.log(event.data.thisArg);  // produces 'Proxy {route: ƒ…}'; aka the Vue component
        215        let data = myDataTable.row(this).data();
        216        event.data.thisArg.modal_title=data.codename;
        217        event.data.thisArg.idea.codename=data.codename;
        218        event.data.thisArg.idea.tagline=data.tagline;
        219        event.data.thisArg.idea.updated_at=data.updated_at;
        220        event.data.thisArg.showModal=true;
        221    });


* The datatables component's `render()` function within the `ColumnDefs` will fail for all rows/data if it fails for _any_ rows/data. So, look out for null/missing datetimes, which was my case. Need a way to more-gracefully handle 'Invalid date' errors -- like log the problem row, then return a date that makes sense for the contenxt -- either epoch time, current datetime, or future time. Also, possibly allow for quick repair.



