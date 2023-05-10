<?php
try {
  $db = new SQLite3('/var/www/ionas.dev/db/ionasdev.db');
} catch(Exception $e) {
  echo $e->getMessage() . " :(";
  die();
}
?>
