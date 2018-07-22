#!/bin/bash

# Go to the root folder
cd ..

# Pull the updated website from github
echo '$ git pull --rebase'
git pull --rebase
echo '$ git status'
git status

# Generate image sprite
glue images/icons/games/ --img=images/ --scss=scss/sprites/ --retina
glue images/icons/platforms/ --img=images/ --scss=scss/sprites/ --retina
mv scss/sprites/games.scss scss/sprites/_games.scss
mv scss/sprites/platforms.scss scss/sprites/_platforms.scss

# Create a css folder if it doesn't exist
if [ ! -d "css" ]; then
  echo "$ mkdir css"
  mkdir css
fi

# Run composer install
export COMPOSER_HOME=/var/www/composer
echo "$ Composer home:" $COMPOSER_HOME
echo '$ composer install'
composer install 2>&1
 
# Run npm install
echo "$ npm install"
npm install
