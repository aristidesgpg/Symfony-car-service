Production Server: Ubuntu 16.04

PHP Version: 7.3.22

MySQL Version: 5.7.31

`git clone https://github.com/jmdigital/iservice3`

`cd iservice3`

`composer install`

Open .env and cut the entire `###> doctrine/doctrine-bundle ###` block and paste into a new file called .env.local in 
the root directory.

Modify the `DATABASE_URL` env variable as needed w/ the database name of iservice3

Make sure you have symfony installed and set up as an environment variable on your system. 

`symfony server start`


Load the fixtures:
`php bin/console doctrine:fixtures:load` & confirm `yes`

This will load dummy data into the iservice3 database. A few never change, otherwise they will change every time the 
fixtures are loaded. 

Constant Username: tperson@iserviceauto.com

Constant Password: test

Constant Link Hash: a94a8fe5ccb19ba61c4c0873d391e987982fbbd3

Constant PIN: tbd


The API Documentation can be found at `localhost:8000/api/doc` and test login using credentials provided above
