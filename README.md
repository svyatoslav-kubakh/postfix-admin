# postfix-admin

[![version][release-badge]][release]
[![license][license-badge]][license]
[![composer.lock available][composer-lock-badge]][packagist]
![build-status][travis-build-badge]][travis-history]

Basic admin interface for postfix service with settings hosted in mysql

http://www.postfix.org/MYSQL_README.html

## Installation

### Development Environment

* install vendor libs: `composer install`
* edit .env file manually
* run migrations: `console/yii migrate`
* run inernal server: `console/yii serve`

### Production Environment

* install vendor libs: `composer install --no-dev`
* register your [environments] in the web server
* run migrations: `console/yii migrate --interactive=0`


## Environments
* Debug settings:
  * YII_DEBUG - (true|false)
  * YII_ENV - system environment (dev|prod)
* Request parameters
  * COOKIE_VALIDATION_KEY - random string, cookie salt
* Uncomment to change site root
  * BASE_URL (optional) - change if admin rood different from the document root
* Database settings
  * DB_DSN - database DSN (e.g. mysql:host=127.0.0.1;port=3306;dbname=postfix_mailer)
  * DB_USERNAME - database user name
  * DB_PASSWORD - database user password
  * DB_TABLE_PREFIX (optional)


## Command line routines

* `console/yii migrate` - Upgrades the application by applying new migrations
* `console/yii users` - List users
* `console/yii users/disable` - Disable user
* `console/yii users/enable` - Enable user
* `console/yii users/passwd` - Change password

## Development routines
* `vendor/bin/phpcs --ignore=vendor --extensions=php --standard=PSR2 .` - Run PSR checks


[release]: https://github.com/svyatoslav-kubakh/postfix-admin/releases
[release-badge]: https://img.shields.io/github/release/svyatoslav-kubakh/postfix-admin.svg
[license]: ./LICENSE
[license-badge]: https://img.shields.io/badge/license-BSD%202--Clause-lightgrey.svg
[packagist]: https://packagist.org/packages/ksar/postfix-admin
[composer-lock-badge]: https://poser.pugx.org/ksar/postfix-admin/composerlock
[travis-history]: https://travis-ci.org/svyatoslav-kubakh/postfix-admin
[travis-build-badge]: https://travis-ci.org/svyatoslav-kubakh/postfix-admin.svg?branch=master
