#!/bin/bash

# Go to the root folder
cd ..

# Pull the updated website from github
echo '$ git pull --rebase'
git pull --rebase
echo '$ git status'
git status

# Generate image sprite
glue images/icons/games/ --img=images/ --scss=scss/sprites/_games.scss

# Run composer install
export COMPOSER_HOME=/var/www/composer
echo "$ Composer home:" $COMPOSER_HOME
echo '$ composer install'
composer install 2>&1
 