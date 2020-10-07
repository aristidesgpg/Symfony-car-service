Production Server: Ubuntu 16.04

PHP Version: 7.3.22

MySQL Version: 5.7.31

install docker

1. Go to project root directory and run command below

`docker-compose up -d --build`

This command will create docker container named iService3 and iService3_db_1

2. After the docker containers are built, run command below

`docker exec -it iService3 /bin/bash`

This will lead you to iService3 docker container bash

3. Now that you are able to install composer packages and doctrine migrations

`composer install`

add JWT keys in config/jwt using openssl

`yes | php bin/console doctrine:migration:migrate`

`yes | php bin/console doctrine:fixtures:load`


Constant Username: tperson@iserviceauto.com

Constant Password: test

Constant Link Hash: a94a8fe5ccb19ba61c4c0873d391e987982fbbd3

Constant PIN: tbd


The API Documentation can be found at `localhost:8000/api/doc` and test login using credentials provided above
