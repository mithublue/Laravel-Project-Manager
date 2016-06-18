# Laravel Project Manager - Alpha

Laravel Project Manager is a free , open source app that is easily extendable and customizatble, feel free to use it the way you want. ( Credit is appreciated though. )

![Project](https://raw.githubusercontent.com/mithublue/Laravel-Project-Manager/master/project_manager.png)
![Task](https://raw.githubusercontent.com/mithublue/Laravel-Project-Manager/master/task.png)

## How to Setup

1) Clone or download the zip file and unzip it.

2) Enter the folder and run following command ( composer update )

3) Run the command to generate the app key ( php artisan key:generate )

4) make a copy of .env.example and rename it to '.env' . Provide here the database credentials.

5) Create the database in database server with the name provided in .env file

6) Run the command ( php artisan migrate ), it will migrate the tables necessary for the application.

Now you are ready to go !

## Seeding

Run the following command ( php artisan db:seed --class=UsersTableSeeder ). It will create an user entry in user table with the administrator role. User its credential to login to the application.

## Contributing

This project is still under development and in alpha version. You are free to contribute to this project !