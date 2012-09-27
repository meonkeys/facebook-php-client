<?php

require_once 'vendor/autoload.php';

function my_autoload($class) {
  include(__DIR__ . "/$class.php");
}

spl_autoload_register("my_autoload");
