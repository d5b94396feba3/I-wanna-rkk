# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

**Important:** Make sure to update the `app.baseURL` in your `.env` file to match your project's URL.

**Database Settings:** Update the `database.default` and `database.maindb` sections in your `.env` file with your database credentials.

**Example .env File:**
```
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = development

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

app.baseURL = 'http://localhost:8085'

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = ci4_test
database.default.username = root
database.default.password = root
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306

database.maindb.hostname = localhost
database.maindb.database = ci4_test
database.maindb.username = root
database.maindb.password = root
database.maindb.DBDriver = MySQLi
database.maindb.DBPrefix =
database.maindb.port = 3306
```
## Running the Application

To run the application, navigate to the project's root directory and start a PHP development server using the following command:
```
php spark serve
```
This will start a server at `http://localhost:8085`, which you can access in your web browser.

**Please** read the user guide for a better explanation of how CI4 works!

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> **Warning**
> CodeIgniter 4.4.x requires PHP 8.1 or newer. If you are
> using an older PHP version, you should upgrade immediately.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
