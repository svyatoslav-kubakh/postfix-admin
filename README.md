# postfix-admin

[![version][version-badge]][CHANGELOG]

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


[CHANGELOG]: ./CHANGELOG.md
[version-badge]: https://img.shields.io/badge/version-1.0.0-blue.svg
