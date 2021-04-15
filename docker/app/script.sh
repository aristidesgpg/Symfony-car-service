#!/bin/bash

chmod 775 -R public/uploads -f

service apache2 start

tail -f /dev/null