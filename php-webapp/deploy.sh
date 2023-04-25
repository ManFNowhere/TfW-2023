#!/bin/bash
rm -r /var/www/html/$USER-web/tfw
mkdir /var/www/html/$USER-web/tfw
cp www/*.php /var/www/html/$USER-web/tfw/
if curl -s -o /dev/null https://informatik.hs-bremerhaven.de/$USER-web/tfw/demo.php; then
  echo "deployt nach https://informatik.hs-bremerhaven.de/$USER-web/tfw"
  echo "(demo.php, sqldemo.php, redisdemo.php)"
else
  echo "es ist ein Fehler aufgetreten"
  exit 1
fi

