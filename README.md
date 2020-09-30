Production Server: Ubuntu 16.04

PHP Version: 7.3.22

MySQL Version: 5.7.31

`git clone https://github.com/jmdigital/iservice3`

`cd iservice3`

`composer install`

Open .env and cut the entire `###> doctrine/doctrine-bundle ###` block and paste into a new file called .env.local in the root directory.

Modify the `DATABASE_URL` env variable as needed w/ the database name of iservice3

Make sure you have symfony installed as an environment variable on your system. 

`symfony server start`
