#!/bin/bash

tar -cf hompage.tar index.html css/ images/ pages/ scripts/
scp hompage.tar hopper:/var/www/html/tmahdi/

