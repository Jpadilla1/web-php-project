web-php-project
===============

Class project done with a MVC pattern in PHP. The goal was to create a small web app to manage a security system.

## Installation

You can download or clone the repo to your apache public folder. We used xampp, so if you're using xampp, you can put the project in the htdocs folder. Once that's done, run apache and MySQL servers and create a new database named "sistema_seguridad_administracion" and import the .sql file which is located in the sql folder.

Then, you wil need to copy this url and replace it in the init.php file found in the app folder. Look for something like this.

```php
'SITE_URL' => 'http://localhost/github/web-php-project/web-php-project/public/'
```

And replace the url with this one:

```
http://localhost/web-php-project/public/
```

Now, go to your browser and type:

```
localhost/web-php-project/public/
```

You should see the home page.

The last thing to do is create a user. To create a user, go to phpmyadmin and inside the categories table create a new category with id of '002' and title 'admin', you can put whatever you want in description. Then create a new user in the 'usuario' table. Now, go back to the login page and try to login.

If everything went well, then you are done!

For any problems, please leave an issue on the issues page. 

##Note

This was a class project, so I will not be updating this repo for more features. I will only update it for any issues that may occur at its current point.
