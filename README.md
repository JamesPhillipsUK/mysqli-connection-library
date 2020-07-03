# MySQLi-Connection-Library

A database connection library based on the MySQLi Library for PHP.  
As used in [BlogDraw](https://blogdraw.com/ "BlogDraw").

## How To Use

```PHP
<?php
// Define these, the library needs them.  
// Either block the file with these in via .htaccess, or put it above your web root.
// Ensure database security at all costs.
define(DBUSER, 't3stUser');
define(DBPASS, '1nSecureP3ssW0rd');
define(DBSERVER, '128.365.1.256');
define(DBNAME, 'fakeDatabase');

// Call the library.
require_once('mysqli-connection-library.php');

// Connect to the database.
$dBConnection = connect();

$userInputString = "My name is: ');DROP TABLES ...";

// Clean SQL injection attempts from the string.
$saferUserInputString = cleanString($userInputString);


$userInputHtmlString = "<strong>My name is:</strong> ');DROP TABLES ...";

// Clean SQL injection attempts from the string, whilst preserving HTML tags.
$saferUserInputHtmlString = cleanHtmlString($userInputHtmlString);

// Put your query through using mysqli_query().
$dBQuery = "SELECT [...]";// You can use a prepared statement here for better security.
$returnQuery = mysqli_query($dBConnection,$dBQuery);
// If you're expecting a result set, use mysqli_fetch_array().
while ($row = mysqli_fetch_array($returnQuery, MYSQLI_ASSOC))
  //Iterate through results in $row[].

// Disconnect from the database.
disconnect($dBConnection);
?>
```
