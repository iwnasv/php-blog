<?php
session_start();
if ($_SESSION["auth"] != 1) {
  http_response_code(403);
  die("auth first");
}
try {
  $db = new SQLite3('/var/www/ionas.dev/db/ionasdev.db');
} catch(Exception $e) {
  echo $e->getMessage() . " :(";
  die();
}
if (!isset($_POST["writeno"])) {
  if ($_POST["pub"] == "on") {
    $PUB = 1;
  } else {
    $PUB = 0;
  }
  $TIME = date("Y-m-d H:i:s");
  $BODY = $_POST["body"];
  $query = $db->prepare('INSERT INTO POSTS(title,lang,postedon,tags,body,pub) VALUES(:title,:lang,:postedon,:tags,:body,:pub)');
  $query->bindValue(':title', $_POST["title"]);
  $query->bindValue(':lang', $_POST["lang"]);
  $query->bindValue(':postedon', $TIME);
  $query->bindValue(':tags', $_POST["tags"]);
  $query->bindValue(':body', $BODY);
  $query->bindValue(':pub', $PUB);
  $query->execute() or die("fuck");
  $lastId = $db->lastInsertRowID;
  header("Location: https://ionas.dev/post/$lastId");
} else {
  echo "TODO: editing posts";
}
?>
