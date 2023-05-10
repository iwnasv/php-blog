<?php
$post = filter_var($_POST["postId"],FILTER_SANITIZE_NUMBER_INT);
$name = filter_var($_POST["posterName"],FILTER_SANITIZE_STRING);
$email = filter_var($_POST["posterAddress"],FILTER_SANITIZE_EMAIL);
$captcha = filter_var($_POST["captcha"],FILTER_SANITIZE_STRING);
$comment = filter_var($_POST["commentBody"],FILTER_SANITIZE_STRING);
if(empty($post) || empty($name) || empty($comment) || empty($post)) {
  die("bad request");
}
//elegxo captcha
if(hash("sha256",$captcha) != "21945e7f31fb51b4fccc6947a26b2573b9bc4763ae10b6bd1b59afda8959aab3") {
  die("bad captcha");
}
if(hash("sha256",$email) == "9faac4b6ef97a7c6a8743bd09c041fbaa05699106b7dc3cd5ab6ad1626c14d35") {
  $name = "<span class=\"admin\">" . $name . "</span>";
}
//elegxo referer
//if(!isset($_SERVER["HTTP_REFERER"]) || $_SERVER["HTTP_REFERER"] != "https://ionas.dev/post/" . $post) {
  //http_response_code(403);
  //die("403 :thinking:");
//}
$time = date("Y-m-d H:i:s");
$hash = substr(hash('sha256',$name . $email . $time),0,12);
try {
  $db = new SQLite3('/var/www/ionas.dev/db/ionasdev.db');
} catch(Exception $e) {
  echo $e->getMessage() . " :(";
  die();
}
//$PHPDIR = "/var/www/ionas.dev/php";
//require_once("/var/www/ionas.dev/php/connectdb.php");
//require_once($PHPDIR . "/Parsedown.php");
//$Parsedown = new Parsedown();
//$Parsedown->setSafeMode(true);

//$sql = 'INSERT INTO COMMENTS(parentpost,name,email,comment,time,hash) VALUES(' . $post . ',' . $name . ',' . $email . ',"' . $Parsedown->text($comment). $time . ',' . $hash . ')';
if(empty($email)) {
  $email = "NULL";
} else {
  $email = "\"$email\"";
}
$sql = "INSERT INTO COMMENTS(parentpost,name,email,comment,time,hash) VALUES($post,\"$name\",$email,\"$comment\",\"$time\",\"$hash\");";
$db->exec($sql) or die($sql);
header("Location: " . $_SERVER["HTTP_REFERER"]);
