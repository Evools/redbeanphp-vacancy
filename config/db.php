<?php

require "rb.php";

R::setup(
  'mysql:host=localhost;dbname=redbeanphp',
  'root',
  'root'
);

if (!R::testConnection()) {
  exit('No DB connection!');
}
