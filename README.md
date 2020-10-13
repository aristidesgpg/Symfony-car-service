Production Server: Ubuntu 16.04

PHP Version: 7.3.22

MySQL Version: 5.7.31

1. Install docker
        https://docs.docker.com/get-docker/

2. Go to project root directory and run command below

        `docker-compose up -d --build`

        This command will create docker container named iService3 and iService3_db_1

3. After the docker containers are built, run command below

        `docker exec -it iService3 /bin/bash`

        This will lead you to iService3 docker container bash

4. Now that you are able to install composer packages and doctrine migrations

        `composer install`

        `openssl genrsa -out config/jwt/private.pem -aes256 4096`
        `openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem`

        `yes | php bin/console doctrine:migration:migrate`

        `yes | php bin/console doctrine:fixtures:load`

5. You can remove containers and images created by docker-compose using the commands below

        `docker kill $(docker ps -aq)`

        This will stop all docker containers

        `docker rm $(docker ps -aq)`

        This will remove all docker containers

        `docker rmi $(docker ps -aq)`

        This will remove all docker images

Constant Username: tperson@iserviceauto.com

Constant Password: test

Constant Link Hash: a94a8fe5ccb19ba61c4c0873d391e987982fbbd3

Constant PIN: tbd


The API Documentation can be found at `localhost:8000/api/doc` and test login using credentials provided above
