<?php
define('DB_SERVER','mysql');
define('DB_USER','root');
define('DB_PASS' ,'myRot@554414');
define('DB_NAME', 'echo.fleetsapi.com');

define('DIR','https://workdesk.techpulsesolution.com/');
define('TechPulse','techpulsesolution@gmail.com');

$con = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>