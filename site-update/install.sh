#!/bin/bash

# Go to the root folder
cd ..

# Pull the updated website from github
echo '$ git pull --rebase'
git pull --rebase
echo '$ git status'
git status

# Run composer install
export COMPOSER_HOME=/var/www/composer
echo "$ Composer home:" $COMPOSER_HOME
echo '$ composer install'
composer install 2>&1
 