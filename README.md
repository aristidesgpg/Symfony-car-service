Production Server: Ubuntu 16.04

PHP Version: 7.3.22

MySQL Version: 5.7.31

1. Install docker
        https://docs.docker.com/get-docker/

2. Go to project root directory and run command below

        `docker-compose up -d --build`

        This command will create docker container named iService3 and iService3_db_1
        (If you recieve an error about var-dump-server, delete your vendor folder and run `composer install`. 
         Additionally, if you get an error about not being able to access the script.sh file, you may have to 
         allow execute permissions on that file)

3. After the docker containers are built, run command below

        `docker exec -it iService3 /bin/bash`

        This will lead you to iService3 docker container bash
        
4. (OPTIONAL) If you would like to set up your database in a third party database tool, create a new session using 127.0.0.1 as the host and 3307 as the port with a username/password of root/6&ydM85oUR!w

5. Now that you are able to install composer packages and doctrine migrations

        `composer install`

        `mkdir config/jwt | openssl genrsa -out config/jwt/private.pem -aes256 4096`
        You need to use this password for it to work: 0dd003e40304fb6c03eb056fcaa27a3c
        `openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem`
        Make sure you use the same password

        `yes | php bin/console doctrine:migration:migrate`

        `yes | php bin/console doctrine:fixtures:load`
        
        `php bin/console assets:install --symlink`
        This command will set up the symlinks for swagger-ui (if necessary)

        `chmod -R 755 config/jwt`
        This command will allow you to read jwt key files

6. NOTE: Occasionally as things change you will have to remove containers and images created by docker-compose using the commands below

        `docker kill $(docker ps -aq)`
        (on windows: list containers using docker ps -aq and kill them one by one)

        This will stop all docker containers

        `docker rm $(docker ps -aq)`
        (on windows: list containers using docker ps -aq and remove them one by one)

        This will remove all docker containers

        `docker rmi $(docker images)`
        (on windows: list images using docker ps -aq and remove them one by one)

        This will remove all docker images
        
7. Get a JWT token by going to /api/authentication/authenticate passing the following as formData:

        username: tperson@iserviceauto.com
        password: test

    or if authenticating testing the customer app:

        linkHash: a94a8fe5ccb19ba61c4c0873d391e987982fbbd3
        
    or if authenticating testing the technician app:

        //@TODO: Coming soon

8. Another way to test endpoints is to use the API Documentation that can be found at `localhost:8000/api/doc` 

    1. In the top left of the page, select "http" from the drop-down
    2. Expand the `/authentication/authenticate` endpoint
    3. Click "try it out"
    4. Enter credentials as desired provided above
    5. Click "Execute"
    6. Copy the value of the `token` provided in the response
    7. At the top right, click "Authorize"
    8. In the text box type "Bearer " then paste the token you copied
    9. Click "Authorize" 
    10. All calls after this will automatically have the bearer token in the "Authorization" header


9. Installing Developer Tools.
   
   `This installs: php-cs-fixer, psalm & xsd2php.`
   
   1. From the root of the project, run: 
      1. cd ./tools/
      2. composer install
   
   To use php-cs-fixer(from root):
   
   1. php tools/vendor/bin/php-cs-fixer fix [FILE_PATH_HERE]
      example: php tools/vendor/bin/php-cs-fixer fix ./src/Command/UnleashTheKrakenCommand.php

10. How to test? ( unit & functional testing )

    1. For all tests

           php bin/phpunit

    2. For single test
        
           php bin/phpunit [FILE_PATH_HERE]
           
       Example:

           php bin/phpunit tests/Controller/RepairOrderTeamControllerTest.php
