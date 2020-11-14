## Monthly Activation

<h6>This is a simple app where an user can register himself and login..But every user have to pay $10 per month to keep activate hi/her account
. </h6>

##Set Up
<ul>
<li>Clone this repo</li>
<li>After Clone setup your .env file</li>
<li>update your composer with command (composer update) (Note:it is not mandatory but update ir if you face any errors/bugs)</li>
<li>then generate your key with artisan command (php artisan key:generate)</li>
<li>Do the migration with artisan command (php artisan migrate)</li>
<li>Last of all run the app with (php artisan serve)</li>
<li>And if you face any difficulties to run project, config your cache (php artisan config:cache)</li>
</ul>

## Features/Tasks has been completed
<ul>
<li>User can Register himself</li>
<li>After Registration user can login </li>
<li>If any user got 3 times wrong credentials, at the fourth time he/she will be locked for 10 minutes</li>
<li>After login user have to activate his account</li>
<li>For activate use this following stripe credentials</li>
<li>And if he/she successfully activate his/her account then he/she can see his/her monthly payment report </li>
</ul>

## Stripe Credentials
<ul>
<li>Card Number : 4242 4242 4242 4242</li>
<li>Expiration date : 04/24</li>
<li>CVC : 424</li>
<li>Zip : 42424</li>
</ul>  

