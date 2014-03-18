README
======

This is simple RBAC module for any site or webapp.

Requirements
------------
PHP >= 5.3

Composer

MySQL

PDO

Installation
------------

First of all you need to clone repo into your document root:

    git clone https://github.com/bitfroster/rbac.git

Then you need to run composer install into the root directory:

    <path to your composer> install

Create DB for your auth module. Paste credentials into phinx.yml (it was generated when you ran composer install command) and run:

    php vendor/bin/phinx init .
    php vendor/bin/phinx migrate

This command should create table structure in your database.

TODO
------------

unit tests.

"remember me" functionality.

session management.

client side form validation.

captcha.

"forgot password" functionality

CSS styling.

code refactoring.
