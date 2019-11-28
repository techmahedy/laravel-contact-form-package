Laravel Contact Form Package
============================

[![Issues](https://img.shields.io/github/issues/techmahedy/contact-package?style=flat-square)](https://github.com/techmahedy/contact-package/issues)
[![Stars](https://img.shields.io/github/issues/techmahedy/contact-package?style=flat-square)](https://github.com/techmahedy/contact-package/stargazers)

This will send email to admin and save contact data to database

- Simple interface for building contact form.
- Using this form , user can conatct with admin via email.
- User can customize this form as what ever looks you want.
- This will send email to admin and save contact data to database.

## Installing contact-package

The recommended way to install contact-package using composer

    composer require codechief/contact

## Add the service provider to `config/app.php`

'providers' => [

    Codechief\Contact\ContactServiceProvider::class,

],

## Run this command to migrate contact table 

    php artisan migrate 
 
### Options 

You can set custom design for view.

    php artisan vendor:publish

After running this command just look the position of codechief\contact and enter the position number in cli and hit enter. Then you will find contact.blade.php inside 

    resources/views/vendor/contact/contact.blade.php 

Now just make a style to it whatever you want to look it. 

### Uses

just visit this following url

    http://localhost:8000/contact 