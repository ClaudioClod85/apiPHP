<?php
//require_once __DIR__.'/../vendor/autoload.php';

function autoloadClass($className){
  $link = str_replace('\\','/',$className).".php";
  if (file_exists($link)) require_once $link;
  else "error_autoinclude";
}
spl_autoload_register('autoloadClass');
