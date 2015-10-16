# SIM Hangman API #

In this assignment we ask you to implement a minimal version of a hangman API using the following resources below:

## Resources ##

**/games (POST)**

Start a new game

- A list of words can be found in the MySQL database. At the start of the game a random word should be picked from this list.

**/games/[:id] (PUT)**

Guess a started game

- Guessing a correct letter doesn’t decrement the amount of tries left

- Only valid characters are a-z

## Response ##

Every response should contain the following fields:

*word*: representation of the word that is being guessed. Should contain dots for letters that have not been guessed yet (e.g. aw.so..)

*tries_left*: the number of tries left to guess the word (starts at 11)

*status*: current status of the game (busy|fail|success)


Installation
============

First i run composer, this gave me an error on the doctrine migrations bundle
so i downgraded the symphony version to 2.4 and then we were oke.

Then i run migrations with:

`php app/console doctrine:migrations:migrate`

this gave me all the words in my database.

Added to my apache conf:

`
  1 <VirtualHost *:80>
  2
  3   ServerName  symfony.dev
  4   ServerAlias symfony.local
  5
  6   DocumentRoot /home/bas/vhosts/symfony/web
  7   <Directory /home/bas/vhosts/symfony/web>
  8    Order allow,deny
  9    Allow from all
 10    require all granted
 11    allowOverride all
 12   </Directory>
 13 </VirtualHost>
`

and to my hosts file:

`127.0.0.1 symfony.dev`

then
`sudo a2ensite symfony.conf && sudo service apache2 reload`

And there is our symfony ghost telling us no GET is configured, which is correct

to make development a little easier I installed postman for chrome:

`https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm`

this is a plugin that will let you do all REST request trough your browser (real easy)

Further we add a index.php to the /web dir and include the app.php :
`
<?php
/**
 * @author b.j.ouwehand <b.j.ouwehand@gmail.com>
 */
require_once('app.php');
`

then we see we already have a controller configured in /home/bas/vhosts/symfony/src/Hangman/Bundle/ApiBundle/Resources/config/routing.yml
accessable trough /hello/world, so we can start development

Development
===========

Aparently there is a Symfony cookbook:

http://symfony.com/doc/current/book/doctrine.html

So we have documentation.

Lets start by creating the models, or 'entities' as symfony calls them











