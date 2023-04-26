#!/bin/bash
rm -r ~/Sites/tfw
mkdir ~/Sites/tfw
cp  -r www/* ~/Sites/tfw/
if curl -s -o /dev/null https://informatik.hs-bremerhaven.de/$USER-web/tfw/demo.php; then
  echo "deployt nach https://informatik.hs-bremerhaven.de/$USER-web/tfw"
  echo "(demo.php, sqldemo.php, redisdemo.php)"
else
  echo "es ist ein Fehler aufgetreten"
  exit 1
fi

mysql -u root -p < demo.sql
