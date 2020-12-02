# ScummVM-Web

This project is the main ScummVM website located at: https://www.scummvm.org

## Getting Started

These instructions will get you a copy of the project up and running on your
local machine for development and testing purposes. See deployment for notes
on how to deploy the project on a live system.

### Prerequisites

The ScummVM website relies on several tools to install properly.
Before installing please make sure you have the following installed:

* [PHP](https://www.php.net/manual/en/install.php)
  * PHP YAML extension. Install via `pecl install yaml` or `sudo apt install php-yaml`
  * The version of PHP included with macOS doesn't include PECL, so you'll need to install a different version of PHP [through Homebrew](https://formulae.brew.sh/formula/php) or another method
* [Composer](https://getcomposer.org/)
* [Python & pip](https://www.python.org/) (2.7.9+/3.4+)
* [Node.js & npm](https://nodejs.org/)
* [Git](https://git-scm.com/)
* [Glue](https://glue.readthedocs.io/en/latest/installation.html)
* [Redis](https://redis.io/) (Optional)

### Installing

Clone this repo

```
git clone https://github.com/scummvm/scummvm-web.git
```

Then install the required PHP dependencies with:

```
composer install
```

To run the build scripts and start a web server on port 8000, run:

```
composer develop[-win]
```

Instead of the above command, you can either build and run independently using:
```
composer build[-win]
composer start
```
respectively.

## Deployment

To deploy changes to the official ScummVM website, simply go to the website admin page and click the "ScummVM.org
manual site update" link.

## Updating data

Most data is now managed upstream in a spreadsheet. To re-generate the data files
run `composer update-data` note that this will run automatically on site update
but is encouraged for you to do manually to keep track on who's updating the
data.

## Disabling cache

During development, you can disable data caching by creating a file called
`.no-cache` in the root folder.

## Contributing

Similar to ScummVM, please use the appropriate project name when contributing:
* **I10N:** Modifications related to translations.
* **CSS:** Changes to stylesheets.
* **TEMPLATES:** Changes to page and component templates.
* **IMAGES:** Site graphics (Icons are excluded).
* **ICONS:** New game and platform Icons. Please see the Wiki for updated
submission guidelines.
* **DATA:** Site data files.
* **BUILD:** Files related to building and developing the site.
* **WEB:** Catch-all for things that don't fit any of the above, or a mix of
multiple components in a single commit.

### Code Style

YAML files should adhere to the [Flathub YAML Style Guide](https://github.com/flathub/flathub/wiki/YAML-Style-Guide).

PHP files use phpcbf. Please run `composer lint` before committing code.
