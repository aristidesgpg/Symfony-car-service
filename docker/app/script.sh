#!/bin/bash

chown www-data:www-data -R public/uploads
chmod 755 -R public/uploads -f

service apache2 start

tail -f /dev/null
