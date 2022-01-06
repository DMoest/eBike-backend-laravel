# Backend Laravel

This repository is the backend in the project eBike System. 
The backend is intended to serve data to several parts that include admin webb-app, 
customer webb-app, customer mobile-/webb-app, the bike control system application & a 
REST-API for third party application/plugins development.



<br>


## Application usage
Make sure to have PHP version 8.x installed in the environment you intend to run the application.

### Setup Database
In case you want to run your application with MongDB as your datbase 

Second you need a working database to collect/write data to/from. All information regarding connections to private/protected information should be stored safely in a .env file inside the directory 'backend/'.
Create a .env file in bachend/ directory. Create a srv MongoDB connection defined with the database related environmental variables.
You need the following to get setup:
* ```DB_CONNECTION``` - This should be 'mongodb'.
* ```DB_HOST``` - This is the host you are running your application on, by default MongoDB runs on '127.0.0.1'.
* ```DB_PORT``` - This is the port you have set for the connection, by default MongoDB runs on '27017'.
* ```DB_DSN``` - This is the DSN adress that connects to your database. MongoDB provides easy access for connection to databases where you can 
apply your settings including database name, database user and database password in one adress string.
* ```DB_DATABASE``` - This is the name of your MongoDB database.
* ```DB_USERNAME``` - This is the name of the user you allow access to the database.
* ```DB_PASSWORD``` - This is the password for the given user of the database.

In case you wish to run any of the other preconfigured database types available set the connection type in 'config/database.php'. 
```SQLite``` would be a good recommendation for fast and easy application try out if a MongoDB setup is not wanted. 
Make sure to uncomment the ```_id``` columns in the migrations since SQLite does not apply automatic id:s for data tables.

<br>

### Seed fake data to the database
In the factories files you find a setup to seed the database with fake data. 
To migrate the collections/tables to the database run:
```
php artisan migrate
```

In case you want to rollback/drop the database migrations run:
```
php artisan migrate:rollback
```
To drop/rollback first and then remigrate the database collections/tables run:
```
php artisan migrate:fresh
```
While in development and working with the database you often find your self in need to drop, remigrate and seed the database. For this action use:
```
php artisan migrate:fresh --seed
```

<br>

### Install the application
After cloning the repository make sure that all the application dependencies are installed correctly.
Run the command and make sure the installation finnish correctly:
```
make install
```
Followed by
```
npm install
```

I case of anything not working as expected later when making requests to the API you might need to run:
```
make clean-all install
```
There could be a few cache files or unconfigured dependencies affecting the API:s performance.

<br>

### Start the server
First make sure to optimize routes, models and other class related objects. 
Optimization only needs to be done once after first clone or new changes to the application.  
Mainly Optimization needs to be done after a new route is added but in case of uncertain do it to be sure. 
Then start the API server.
```
php artisan optimize:clear
php artisan serve
```

In case you are in development run
```
npm run dev
```
or
```
npm run watch
```
for compile of package files.
<br>

### Make request calls to the API
Use your preferred request service tool (CURL, Insomnia, Postman... ) or web browser.
```
http://<host adress>/api/<route add on>
```

<br>

### View the available routes for the API
To view all registered routes on the API you can use this command.
```
php artisan route:list
```

<br>

### Unit test the server

There are two way of testing the API.

First you can run the artisan command for unit testing only.
```
php artisan test
```
the other way would be the better way since it runs a few other tests as well.
```
make test
```

<br>

### Enable third party app development
Register a user on route
```
http://localhost:8000/register
```

If already existing user exists, log in user to register new client on route
```
http://localhost:8000/login
```

Register new client for authentication with the API.
```
http://localhost:8000/dashboard/client
```

<br>
<br>

This project is a part of the course Frameworks & Design Patterns @ Blekinge Institute of Technologies.
Developed by Daniel Andersson, Robert Israelsson, Robin Granqvist & Sofia Herelius.
2021/2022

