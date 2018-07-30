#!/bin/bash

# echo empty line because the buffer starts with a tab for some reason
echo ''
echo 'Updating website - please wait until the page finishes loading'

# Go to the root folder
cd ..

# Pull the updated website from github
echo '$ git pull --rebase'
git pull --rebase
echo '$ git status'
git status

# Generate image sprite
echo 'Generating games and platforms sprites'
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
