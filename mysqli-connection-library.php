<?php
/**
 * MySQLi Connection Library
 *
 * Simple and easy procedural PHP script for connecting to a MySQL database.
 * 
 * @copyright (C) 2020, TuxSoft Limited, 2022 Jesse Phillips.
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 * 
 * @author    Jesse Phillips    <james@jamesphillipsuk.com>
 * @version   0.0.1-rc1
 * @since     0.0.1-rc1
 **/

/**
 * Connects to a database.
 * @param    string    $server        (Optional) The database server's hostname (Defaults to DBSERVER).
 * @param    string    $username      (Optional) The database user (Defaults to DBUSER).
 * @param    string    $password      (Optional) The database user's password (Defaults to DBPASS).
 * @param    string    $databaseName  (Optional) The database name (Defaults to DBNAME).
 * @param    int       $port          (Optional) The database port.
 * @param    string    $socket        (Optional) The database socket.
 * @return   mysqli    The database connection object.
 **/
function connect(string $server = DBSERVER, string $username = DBUSER, string $password = DBPASS, $databaseName = DBNAME, int $port = 0, string $socket = "")
{
  if ($port != 0 && !empty($socket))
    $dBConnection = mysqli_connect($server, $username, $password, $databaseName, $port, $socket);
  elseif ($port != 0)
    $dBConnection = mysqli_connect($server, $username, $password, $databaseName, $port);
  elseif (!empty($socket))
    $dBConnection = mysqli_connect($server, $username, $password, $databaseName, null, $socket);
  else
    $dBConnection = mysqli_connect($server, $username, $password, $databaseName);
  if (!$dBConnection)
    die("<p>Couldn't connect to the database.</p>");
  return $dBConnection;
}

/**
 * Closes an open database connection.
 * @param    mysqli    $dBConnection    The Database connection object.
 **/
function disconnect(mysqli $dBConnection)
{
  if (!empty($dBConnection))
    mysqli_close($dBConnection);
}

/**
 * Prevents xss/SQL injection
 * @param    mysqli    $dBConnection    The database connection object currently in use.
 * @param    string    $string          The String to clean.
 * @param    string    $encoding        (Optional) the encoding of the string (Defaults to UTF-8).
 * @return   string    The string.
 **/
function cleanString(mysqli $dBConnection, string $string, string $encoding = "UTF-8")
{
  $string = mysqli_real_escape_string($dBConnection, mb_convert_encoding(htmlspecialchars($string), $encoding));
  return $string;// Return the string.
}

/**
 * Prevents xss/SQL injection - doesn't strip HTML tags.
 * @param    mysqli    $dBConnection    The database connection object currently in use.
 * @param    string    $string          The String to clean.
 * @param    string    $encoding        (Optional) the encoding of the string (Defaults to UTF-8).
 * @return   string    The string.
 **/
function cleanHtmlString(mysqli $dBConnection, string $string, string $encoding = "UTF-8")
{
  $string = mysqli_real_escape_string($dBConnection, mb_convert_encoding($string, $encoding));
  return $string;// Return the string.
}
?>