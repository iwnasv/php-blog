<?php
date_default_timezone_set('Europe/Athens');
if(!empty($_COOKIE["THEME"])) {
  $THEME = intval($_COOKIE["THEME"]);
} else {
  $THEME = 1;
}
if(isset($_COOKIE["LANG"])) {
  $LANG = intval($_COOKIE["LANG"]);
} else {
  $LANG = 0;
};
function isAltTheme(int $num, $THEME){
  if ($THEME != $num) {
    echo "alternate ";
  }
}
$langtab = array(
  array( #0 english
    array("posts","info"), #0 nav
    array("Posted on","Edited on","Topics"), #1 post
    array("Save cookie","© Ionas 2021 all rights reserved","Language","Theme","Light","Dark"), #2 footer
    array("About","Service","Username","Donate BTC"), #3 about
    array("Welcome!","You've reached Ionas' website. I wrote the code behind this page, but this is a personal project not indicative of my work as a programmer. Email me on admin@(this domain) to let me know what's broken."), #4 index
    array("All posts","Topics","Posts about"), #5 catalog
    array("Add a comment","Name","Email address","Your comment","Post!","Anti-spam question","four-digit integer: two three ten","wrote on") #6 comment
  ),
  array( #1 greek
    array("άρθρα","ίνφο"),
    array("Αναρτήθηκε στις","Επεξεργασία στις","Στις κατηγορίες"),
    array("Αποθήκευση","© Ιωνάρας 2021","Γλώσσα","Θέμα","Κανονικό","Σκοτεινό"),
    array("Πληροφορίες","Υπηρεσία","Όνομα χρήστη","Δωρεά bitcoin"),
    array("Καλωσήρθες","Βρήκες τον ιστότοπο του Ιωνάρα. Θα το αναλύσω αυτό αργότερα. Όλος ο κώδικας είναι δική μου δουλειά. Στείλε email στο admin@ionas.dev για να με πεις τί χάλασα."),
    array("Όλες οι αναρτήσεις","κατηγορίες","Αναρτήσεις περί"),
    array("Σχολίασε","Όνομα","Διεύθυνση email","Το σχόλιό σας","Ανάρτηση!","Ερώτηση ασφαλείας","τετραψήφιος ακέραιος: δύο τρία δέκα","έγραψε στις")
  ),
  array( #2 russian
    array("καταλογος","ινφο"),
    array("Опубликовано","edited on","στις κατηγορίες"),
    array("Αποθηκόφσκι","© Ιωνάς","yazik","8emataki","foteinofski","skoteinofski"),
    array("info","service","username","donate bitcoin"),
    array("dabropazhalovat","ζνταρόβα, δεν έχω μεταφράσει ακόμα τα ρώσσικα κι αν θες στείλε ένα μέιλ να βοηθήσεις"),
    array("индекс","κατηγορίες","σχετικά με"),
    array("Add a comment","Name","Email address","Your comment","Post!","Anti-spam question","ντβα τρι κλπ","έγραψε στις")
  )
);
function str_lang($table,$lang,$page,$str) {
  echo $table[$lang][$page][$str];
}
function getString($table,$lang,$page,$str) {
  return $table[$lang][$page][$str];
}
function writeTags($tagTable, $boldme = null) {//tags to html
  for($i = 0; $i < sizeof($tagTable); $i++) {
    if(!empty($boldme) && ($tagTable[$i] == $boldme)) {
      $tag = "<strong>" . $tagTable[$i] . "</strong>";
    } else {
      $tag = $tagTable[$i];
    }
    echo "<a href=\"/catalog/" . $tagTable[$i] . "\">" . $tag . "</a>";
    if($i < (sizeof($tagTable) - 1)) { echo ", "; }
  }
}
function writeCategories($tagTable) {//tags to rss category
  for($i = 0; $i < sizeof($tagTable); $i++) {
    return '
    <category>' . $tagTable[$i] . '</category>
';
  }
}
function flagEmoji($lang) {
  switch ($lang) {
    case 1: return "🇬🇷"; break;
    case 2: return "🇷🇺"; break;
    default: return "🇬🇧";
  }
}
function getLangName(int $num) {
  switch ($num) {
    case 1: return "el"; break;
    case 2: return "ru"; break;
    default: return "en";
  }
}
function aposiopitika($string) {
  if (strlen($string) > 48) {
    $foo = substr($string,0,44);
    $foo .= "...";
  } else {
    $foo = $string;
  }
  return filter_var($foo,FILTER_SANITIZE_STRING);
}
function selectedNum(int $foo, int $bar) {
  if ($foo == $bar) {
    echo ' selected';
  }
}
function echotf($foo,$bar = true) {
  if (empty($foo) && $bar) {//hax
    echo 'true';
  } else {
    echo 'false';
  }
}
function servstat(string $foo) {
  system("systemctl is-active " . $foo . ".service");
}
?>
