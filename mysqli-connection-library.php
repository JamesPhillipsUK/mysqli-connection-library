<?php
/**
 * Connects to a database.
 * @return dBConnection - Database connection object.
 **/
function connect()
{
  $dBConnection = mysqli_connect(DBSERVER, DBUSER, DBPASS, DBNAME);
  if (!$dBConnection)
    die("<p>Couldn't connect to the database.</p>");
  return $dBConnection;
}

/**
 * Closes an open database connection.
 * @param dBConnection - The Database connection object.
 **/
function disconnect(mysqli $dBConnection)
{
  if (!empty($dBConnection))
    mysqli_close($dBConnection);
}

/**
 * Prevents xss/SQL injection
 * @param dBConnection - The database connection object currently in use.
 * @param string - The String to clean.
 * @param encoding - (Optional) the encoding of the string (Defaults to UTF-8).
 * @return string - The string.
 **/
function cleanString(mysqli $dBConnection, string $string, string $encoding = "UTF-8")
{
  $string = mysqli_real_escape_string($dBConnection, mb_convert_encoding(htmlspecialchars($string), $encoding));
  return $string;// Return the string.
}

/**
 * Prevents xss/SQL injection - doesn't strip HTML tags.
 * @param dBConnection - The database connection object currently in use.
 * @param string - The String to clean.
 * @param encoding - (Optional) the encoding of the string (Defaults to UTF-8).
 * @return string - The string.
 **/
function cleanHtmlString(mysqli $dBConnection, string $string, string $encoding = "UTF-8")
{
  $string = mysqli_real_escape_string($dBConnection, mb_convert_encoding($string, $encoding));
  return $string;// Return the string.
}
?>