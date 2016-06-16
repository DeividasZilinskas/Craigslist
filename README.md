Training assignment for a PHP developer
==========
Create a small web application that displays advertisements posted by users on its home page. It should somewhat resemble websites such as craigslist.org or skelbiu.lt, but have much less features.

##Requirements:
- PHP 7 or higher
- Mysql
- Gulp
- [Requirements for Running Symfony 2.8](http://symfony.com/doc/2.8/reference/requirements.html)

##Setup:

Using GIT and Composer:
```
$ git clone https://github.com/DeividasZilinskas/Craigslist.git
$ cd Craigslist/
$ composer install 
$ npm install
$ bower install
$ gulp
$ php app/console doctrine:database:create
$ php app/console doctrine:schema:update --force
$ php app/console doctrine:fixtures:load
```
##Usage:
```
$ cd Craigslist/
$ php app/console server:run
```
This command will start a web application which you can access at http://localhost:8000/. In order to stop web server press ```Ctrl + C``` in your terminal window.
- - - - - - -  
###### &copy; 2016 [Deividas Žilinskas](https://github.com/DeividasZilinskas)
