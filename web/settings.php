<?php
$theme = filter_var($_POST["theme"],FILTER_SANITIZE_NUMBER_INT);
$lang = filter_var($_POST["lang"],FILTER_SANITIZE_NUMBER_INT);
if($theme >= 0) {
  setcookie("THEME",$theme,time() + 1209600, "/");
} else {
  setcookie("THEME","",time() - 3600);
}
if($lang >= 0){
  setcookie("LANG",$lang,time() + 1209600, "/");
} else {
  setcookie("THEME","",time() - 3600);
}
if(isset($_SERVER['HTTP_REFERER'])) {
  header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
  header("Location: /");
}
?>
