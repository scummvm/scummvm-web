#!/bin/bash
export PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin

# echo empty line because the buffer starts with a tab for some reason
echo ''
echo "Current time: $(date)"
echo 'Updating website - please wait until the page finishes loading'

# Go to the root folder
cd ..

# Pull the updated website from github
echo '$ git pull --rebase'
git pull --rebase
echo '$ git status'
git status

# Generate image sprite
echo 'Checking for glue'
if ! [ -x "$(command -v glue)" ]; then
  echo 'Installing glue'
  pip install glue
fi
echo 'Glue found. Generating games and platforms sprites'
glue images/icons/games/ --img=images/ --scss=scss/sprites/ --retina
glue images/icons/platforms/ --img=images/ --scss=scss/sprites/ --retina
mv scss/sprites/games.scss scss/sprites/_games.scss
mv scss/sprites/platforms.scss scss/sprites/_platforms.scss

# Create a css folder if it doesn't exist
echo "Checking CSS folder"
if [ ! -d "css" ]; then
  echo "$ mkdir css"
  mkdir css
fi

# Run composer install
export COMPOSER_HOME=/var/www/composer
echo "Composer home:" $COMPOSER_HOME
echo '$ composer install'
composer install 2>&1

# Update i18n
echo 'Update base news translation file'
git add data/news/i18n/news.en.json
git commit -m "I18N: Update base news translation file"
git push

# Run npm install
echo "$ npm install"
npm install 2>&1

# Set up smarty 3
echo "Checking smarty template folder"
if [ -d "vendor/smarty/smarty/libs" ] && [ ! -d "vendor/smarty/smarty/libs/template_c" ]; then
  echo "$ mkdir vendor/smarty/smarty/libs/template_c"
  mkdir vendor/smarty/smarty/libs/template_c
  echo "$ chmod +w vendor/smarty/smarty/libs/template_c"
  chmod +w vendor/smarty/smarty/libs/template_c
fi
