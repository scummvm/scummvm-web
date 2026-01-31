# ScummVM-Web

This project is the main ScummVM website located at: https://www.scummvm.org

## Getting Started

These instructions will help you set up the project locally for development and testing.
For deployment details, see the Deployment section below.

### Prerequisites

The ScummVM website relies on several tools.
Before installing, make sure you have the following installed:

* [PHP](https://www.php.net/manual/en/install.php)
  * PHP YAML extension. Install via `pecl install yaml` or `sudo apt install php-yaml`
  * The version of PHP included with macOS doesn't include PECL, so you'll need to install a different version of PHP [through Homebrew](https://formulae.brew.sh/formula/php) or another method
  * Alternatively on macOS you can use [MacPorts](https://www.macports.org) to install both PHP and yaml (for example to use PHP 8.2 `sudo port install php82 php82-yaml php82-iconv php82-intl php82-mbstring php82-sqlite ; sudo port select --set php php82`)
  * To improve build performance, PHP curl extension can be installed.
* [Composer](https://getcomposer.org/)
* [Python & pip](https://www.python.org/) (2.7.9+/3.4+)
* [Node.js & npm](https://nodejs.org/)
* [Git](https://git-scm.com/)
* [Glue](https://glue.readthedocs.io/en/latest/installation.html)
* [Redis](https://redis.io/) (Optional)

### Installing & Developing

Clone this repo

    git clone https://github.com/scummvm/scummvm-web.git

To run the a development version of the site and start a local web server on port 8000, run:

    composer develop

To build for production simply run:

    composer build

## Deployment

To deploy changes to the official ScummVM website, go to the website admin page and click:
“ScummVM.org manual site update”


## Updating data

Most data is now managed upstream in a spreadsheet. To re-generate the data files
run `composer update-data`.This command runs automatically during a site update,but 
running it manually is encouraged so changes can be tracked more easily.

## Disabling cache

During development, you can disable data caching by creating a file called
`.no-cache` in the root folder.

## Contributing

Similar to ScummVM, please use the appropriate project name when contributing:
* **L10N:** Modifications related to translations.
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

PHP files should be formatted using phpcbf
Please run the following before committing:

composer lint

