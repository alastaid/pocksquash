<?php 

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    //$connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
     $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}
xdebug_break();
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
$connectstr_dbname = 'pocksquash';
define('DB_NAME', $connectstr_dbname);

/** MySQL database username */
define('DB_USER', $connectstr_dbusername);

/** MySQL database password */
define('DB_PASSWORD', $connectstr_dbpassword);

/** MySQL hostname : this contains the port number in this format host:port . Port is not 3306 when using this feature*/
define('DB_HOST', $connectstr_dbhost);
mysql_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,$connectstr_dbname) or die(mysql_error());
mysql_select_db("$connectstr_dbname") or die("no database by that name");;


?>
