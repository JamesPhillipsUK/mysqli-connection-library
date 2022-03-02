# mysqli-connection-library

Simple and easy procedural PHP script for connecting to a MySQL database.

mysqli-connection-library is based on the PHP MySQLi Extension for handling database connections.  This system is based on the one implemented in [BlogDraw](https://blogdraw.com/ "BlogDraw") for secure database connections!

## How To Use

### Example Usage

```PHP
<?php
// If you define these, the library will use them by default.  
// Either block the file with these saved via .htaccess, or put it above your web root to ensure database security.
define(DBUSER, 't3stUser');
define(DBPASS, '1nSecureP3ssW0rd');
define(DBSERVER, '128.365.1.256');
define(DBNAME, 'fakeDatabase');

// Call the library.
require_once('mysqli-connection-library.php');

// Connect to the database.  If you've defined the values above, just call this:
$dBConnection = connect();

//Or you can define connection values manually:
$dBConnection = connect($server, $username, $password, $databaseName, $port, $socket);

$userInputString = "My name is: ');DROP TABLES ...";
// Clean SQL injection attempts from the string.
$saferUserInputString = cleanString($userInputString);

$userInputHtmlString = "<strong>My name is:</strong> ');DROP TABLES ...";
// Clean SQL injection attempts from the string, whilst preserving HTML tags.
$saferUserInputHtmlString = cleanHtmlString($userInputHtmlString);

// Put your query through to the database using mysqli_query().
$dBQuery = "SELECT [...]";// You can use a prepared statement here for better security.
$returnQuery = mysqli_query($dBConnection,$dBQuery);
// If you're expecting a result set, use mysqli_fetch_array().
while ($row = mysqli_fetch_array($returnQuery, MYSQLI_ASSOC))
  //Iterate through results in $row[].

// Disconnect from the database.
disconnect($dBConnection);
?>
```

### API Documentation

View the complete API documentation here: [jamesphillipsuk.github.io/mysqli-connection-library](https://jamesphillipsuk.github.io/mysqli-connection-library/).

## System Requirements

- PHP 7.1 or later (Including PHP 8).
  - With mbstring and MySQLi extensions (these are usually included by default).
- MySQL (or compatible) database server.

## Bug-finding

I hope you don't have too many problems with this library, but if you do find any bugs, please report them as issues in the GitHub repo.

## More From me

If you want to see more of what I do, you can visit: [my blog](https://jamesphillipsuk.com "jamesphillipsuk.com").
If you want to donate to my development efforts, you can send donations via [PayPal.Me](https://paypal.me/JamesPhillipsUK "My PayPal.Me").
