[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel/badges/build.png?b=master)](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)



# Backend Laravel
This repository is the backend in the project eBike System.
The backend is intended to serve data to several parts that include admin webb-app,
customer webb-app, customer mobile-/webb-app, the bike control system application & a
REST-API for third party application/plugins development.



<br>


## Application usage
Make sure to have PHP version 8.x installed in the environment you intend to run the application.

<br>



### Installing and compiling the application

Start by cloning this repository
```
git clone https://github.com/Den-geografiska-oredan/eBike-system.git
```

After cloning the repository make sure that all the application dependencies are installed correctly.

For a cache-, vendor- and .bin files free starting point for you api installation use:
```
make clean-all install
```
<i>In case you find the API not performing as expected it is a good idea to use the clean installation make command.</i>

If you did not use the preferred clean installation command above you can install php tools and application dependencies with:
```
make install
```


As Laravel is very adaptive framework there are a few javascript packages at work to compile assets of different sorts. First make sure they are installed properly.
```
npm install
```

After package installation you need to compile the installed assets.  
For development purposes use:
```
npm run dev
```
Alternativly, for active recompile watch on code changes you can use:
```
npm run watch
```


For application to run in production use:
```
npm run prod
```

<br>


### Configure Passport Authentication Keys
Our API use a OAuth2 authentication build with the [Laravel Passport package](https://laravel.com/docs/8.x/passport) that is a part of the laravel ecosystem.
Together with the [Laravel Breeze package]() user clients can easily be registered, logged in/out (and more) on the API with so called [bearer tokens](https://datatracker.ietf.org/doc/html/rfc6745).

For the authentication to work your API needs to be setup with public and private keys.
First build/generate the keys with Laravel Passport using:
```
php artisan passport:install
```

If you for any reason find keys in the ```storage/``` folder or installed keys for the API it would be a good idea to remove them and start fresh to avoid security issues down the road.
You can remove old keys and build/generate new once with the command:
```
php artisan passport:install --force
```
<i>Note: If you intend to run this command already having other applications depending on the existing keys you need to create new keys and authenticate new clients with your API.</i>

Last you need to publish the passport keys configuration with the command:
```
php artisan vendor:publish --tag=passport-config
```

<br>


### Setup database

In case you want to run a SQLite database you need to create the database file. Create the file ```backend/database/eBikeDB.sqlite``` and you should be set to migrate the database tables.
You also need to make sure your environment variables in the ```backend/.env``` file is set correctly. Set ```DB_CONNECTION=sqlite``` and ```DB_FILE=database/eBikeDB.sqlite```.

<br>

[comment]: <> (In case you want to run your application with MongDB as your datbase )

[comment]: <> (Second you need a working database to collect/write data to/from. All information regarding connections to private/protected information should be stored safely in a .env file inside the directory 'backend/'.)

[comment]: <> (Create a .env file in bachend/ directory. Create a srv MongoDB connection defined with the database related environmental variables.)

[comment]: <> (You need the following to get setup:)

[comment]: <> (* ```DB_CONNECTION``` - This should be 'mongodb'.)

[comment]: <> (* ```DB_HOST``` - This is the host you are running your application on, by default MongoDB runs on '127.0.0.1'.)

[comment]: <> (* ```DB_PORT``` - This is the port you have set for the connection, by default MongoDB runs on '27017'.)

[comment]: <> (* ```DB_DSN``` - This is the DSN adress that connects to your database. MongoDB provides easy access for connection to databases where you can )

[comment]: <> (apply your settings including database name, database user and database password in one adress string.)

[comment]: <> (* ```DB_DATABASE``` - This is the name of your MongoDB database.)

[comment]: <> (* ```DB_USERNAME``` - This is the name of the user you allow access to the database.)

[comment]: <> (* ```DB_PASSWORD``` - This is the password for the given user of the database.)

[comment]: <> (In case you wish to run any of the other preconfigured database types available set the connection type in 'config/database.php'. )

[comment]: <> (```SQLite``` would be a good recommendation for fast and easy application try out if a MongoDB setup is not wanted. )

[comment]: <> (Make sure to uncomment the ```_id``` columns in the migrations since SQLite does not apply automatic id:s for data tables.)

[comment]: <> (<br>)



### Migrate database tables to enable data to be stored.
As the application comes without a configured database ready to run transactions right out of the box. You need to migrate the database tables to enable data storage, use the artisan command:
```
php artisan migrate
```

<br>


### Seed fake data to the database
In development its common to work with fake data.
You can use the factories defined (or define your own) in ```database/factories/``` to seed the database with data to try out.

In case you want to drop/rollback the database migrations run:
```
php artisan migrate:rollback
```
<i>Be aware that dropping the database will destroy all stored data and can not be undone. Never run this command on applications deployed in production.</i>

In development you may want to restart with dropping/rollback the database first and then remigrate the database collections/tables. Use the rollback command:
```
php artisan migrate:fresh
```

While working with data in development you can find the need to drop, remigrate and then reseed the database with fake data. For this set of actions use:
```
php artisan migrate:fresh --seed
```

For more information on working with [data and databases in Laravel 8](https://laravel.com/docs/8.x/database). If you intend to develop the API further its also worth knowing from the start, this application is using the [Eloquent Object Relational Mapper](https://laravel.com/docs/8.x/eloquent) for easier workflows creating and maintaining relations that enable data from the database.

<br>



### Routes to make request calls to the API
If you intend to continue development of the API or develop third party applications that interact with this API you need to know what routes are available.
For a better view of what routes the API have to offer use the command:
```
php artisan route:list
```
<i>Here you will find all the routes that have been registered meaning there are cache files generated to include them.</i>

<br>



### Start the API locally
First make sure to optimize cache files, routes, models and other class related objects in use of Laravel.
Optimization should be done on first startup after install and configuration but can also be helpful on changes to the application that require a restart.
Mainly optimizations  are done to clear old and then generate new cache files used by Laravel for a better performing API on startup.
For example, while in development after a new route is created you should restart the API to generate these files to include the cache files.
We consider this to be a good time to execute an optimization and then restart the API.
```
php artisan optimize:clear
```

After optimization have been executed you can start the API.
```
php artisan serve
```

<br>


### Run the API in a Docker container
For a more stable and secure environment to test run or possibly put this application into production we have created dockerfiles to build images from.
As it is understood that running applications with large amounts of code from unknown developers could potentially become a problem, with docker you do not have to worry.
This is a containerized environment that will not affect you local system.

First we strongly recommend that all parts of the [ebike system](https://github.com/Den-geografiska-oredan/eBike-system)
to be run with ```docker compose``` using the [docker-compose.yml file](https://github.com/Den-geografiska-oredan/eBike-system/blob/master/docker-compose.yml)
we have provided in the main repository for the ebike system.

Second you need to build the image to be able to run the container, use the docker compose build command for the API:
```
docker-compose build ebike_backend
```
In case you need to rebuild the container without docker cache files from previous build use:
```
docker-compose build --no-cache ebike_backend
```

Third thing to know there are two ways of spinning this API up with docker compose.

You could run only the backend container which will open the API container up to ```port 8000``` for interactions with the API.
```
docker compose up ebike_backend
```

Alternatively you can run the API through a ```Nginx``` server container. This will run a number of containers acting as a webserver server.
```
docker-compose up nginx
```

<br>



### Testing the API
In development of this API we have included build tests with [Scrutinizer](https://scrutinizer-ci.com/g/Den-geografiska-oredan/eBike-backend-laravel)
and [GitHub Actions workflow](https://docs.github.com/en/actions/learn-github-actions/workflow-syntax-for-github-actions). Integration and unit tests are also executed in the build tests but could also be performed manually as a
good tool in development that favour test driven development aka TDD. You can view the results from the last push to the ```master``` branch by
clicking the badges at the top.

To execute tests on the API there are two way. The first would be to run the artisan command for unit testing only.
```
php artisan test
```
as this test only execute the unit tests the other and possibly beter way would be the better way would be the ```make``` command we have setup.
```
make test
```
This command executes a series of tests as follows; Linting with php (code sniffer), php cpd (copy paste detector),
php mess detector and php stan (static analysis). Integration and unit testing with php unit that generates code coverage.
Composer validate for validation of the composer.json files that install all the application dependencies.

<br>
<br>



    This project is a part of the course  
    Frameworks & Design Patterns.
    Course was created and lectured by Mikael Roos 
    @ Blekinge Institute of Technologies.  
    
    Developed in 2021/2022.
    
    Develpoers:  
    -----------
    Daniel Andersson  
    Robert Israelsson  
    Robin Granqvist  
    Sofia Herelius  
