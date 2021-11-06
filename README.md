# Backend Laravel

This repository is the backend in the project eBike System. 
The backend is intended to serve data to several parts that include admin webb-app, 
customer webb-app, customer mobile-/webb-app, the bike control system application & a 
REST-API for third party application/plugins development.


<br>

## Use the application

### Install the application
After cloning the repository make sure that all the application dependencies are installed.
```
make clean-all install
```

### Start the server
First make sure to optimize routes, models and other class related objects. Optimization only needs to be done once after first clone or new changes to the application.  
Then start the API server.
```
php artisan optimize
php artisan serve
```

### To reseed the database
The database will first be reset, then remigrated and reseeded from factories classes and custom data seeders.
```
php artisan migrate:fresh --seed
```


### Make request calls to the API
Use your preferred request service tool (CURL, Insomnia, Postman... ) or web browser.
```
http://<host adress>/api/<route>
```


### Unit test the server
```
php artisan test
```

<br>
<br>
<br>

This project is a part of the course Frameworks & Design Patterns @ Blekinge Institute of Technologies.
Developed by Daniel Andersson, Robert Israelsson, Robin Granqvist & Sofia Herelius.
2021/2022

