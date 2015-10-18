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


to make development a little easier I installed postman for chrome:

`https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm`

Further we add a index.php to the /web dir and include the app.php :
`
<?php
/**
 * @author b.j.ouwehand <b.j.ouwehand@gmail.com>
 */
require_once('app.php');
`

Documentation
==============

http://symfony.com/doc/current/book/doctrine.html












