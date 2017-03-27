## Laravel 5.4 Kickstarter

A basic laravel 5.4 application with backpack CMS (base, crud, permissions, log manager) and fractal already setup.
Package also includes Homepage and Contact CRUD's

### Install
```sh
    // Initial Setup
    $ git clone git@github.com:madmediagroup/Laravel_5.4_Starter.git project_name
    $ cd project_name
    $ composer install
    $ npm install
    $ cp .env.example .env
    $ php artisan key:generate
    
    // VM Setup
    $ php vendor/bin/homestead make
    $ vagrant up
    
    // Project Setup
    $ vagrant ssh
    $ cd /home/vagrant/project_name
    $ php artisan migrate
    $ php artisan optimize
    $ php artisan db:seed
```

### Post Install

1. To keep this package as vanilla as possible, no data will be preset for homepage or contact models.  
In order for the site to load, first create CRUD entries via http://192.168.10.10/admin/homepage.

2. Change site Meta Title `app/Http/Controllers/HomeController`

3. Change Admin header titles `config/backpack/base.php`

4. Add logo.png to `public/images/theme/`