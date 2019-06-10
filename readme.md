
# Invoices system

:star: Star us on GitHub — it helps!


## Table of content

- [Requirements](#requirements)
- [Installation](#installation)
- [Frontend](#frontend)

## Requirements

The Invoices distribution requires:
- Linus/Unix or WAMP/XAMP environment
- PHP >= 7.0.4
- MySQL >= 5.1
- Web server (Apache, Nginx or integrated PHP web server for testing)

If required PHP extensions are missing, `composer` will tell you about the missing
dependencies.

## Installation
 
To install the Invoices application, you need [composer](https://getcomposer.org).
On the CLI, execute this command for a complete installation including a working setup:

`git clone`

`cd invoices`

`composer install`

`php artisan key:generate`

`php artisan serve`



## Frontend

After the installation, you can test the Invoices frontend by calling the URL of your
VHost in your browser. If you use the integrated PHP web server, you should browse
this URL: [http://127.0.0.1:8000](http://127.0.0.1:8000)

[![Invoices frontend](http://invoices.kindlebit.com/images/mac.png)](http://invoices.kindlebit.com/)


# Invoices
