#!/bin/bash

##create tar from php-webapp
tar -cf php-webapp.tar www/ demo.sql

##copy tar to hopper
scp -P 8080 php-webapp.tar tmahdi@hopper.hs-bremerhaven.de:~/tfw/