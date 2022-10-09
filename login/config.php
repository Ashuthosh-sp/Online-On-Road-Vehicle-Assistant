<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'hellomechanic');
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($con== false) {
    die('Error:Cannot Connect');
}
function pr($arr)
{
  /*To return array length*/
  echo '<pre>';
  print_r($arr);
}
function prx($arr)
{
  echo '<pre>';
  print_r($arr);
  die();
}
function get_safe_value($con, $str)
{
  if ($str != '') {
    $str = trim($str);
    return strip_tags(mysqli_real_escape_string($con, $str));
  }
}
?>
