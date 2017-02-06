<?php

try
{
  $user = 'percy';
  $password = 'w6O1FbMBdhi4nJWS2LK0';
  $db = new PDO('pgsql:host=127.0.0.1;dbname=percmap', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

//w6O1FbMBdhi4nJWS2LK025