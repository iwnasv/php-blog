<?php
$PHPDIR = "/var/www/ionas.dev/php";
require_once($PHPDIR . "/functions.php");
$PAGE = 1;
if(empty($_GET["id"]) || !(preg_match('/[0-9]/', $_GET["id"]))) {
  http_response_code(400);
  die("400 bad request");
}
$ID = intval(filter_var($_GET["id"],FILTER_SANITIZE_NUMBER_INT)) or die("bad post number");
require_once($PHPDIR . "/connectdb.php");
$result = $db->query('SELECT * FROM posts WHERE pub = 1 AND id = '.$ID) or die("failed to query db, sorry");
$post = $result->fetchArray(SQLITE3_ASSOC) or http_response_code(404) and die("404 post not found");
$TITLE = $post["title"];
$DATE = $post["postedon"];
$TAGS = explode(" ", $post["tags"]);
if (!empty($post["editedon"])) { $EDIT = $post["editedon"]; };
$BODY = $post["body"];
require($PHPDIR . "/head.php"); ?>
<body>
<?php require($PHPDIR . "/nav.php") ?>
<main>
  <div id="title"><?php echo $TITLE; ?></div>
  <hr>
  <span class="smallfont"><?php str_lang($langtab,$LANG,$PAGE,0); ?> <a id="date" <?php if (!empty($EDIT)) { echo 'class="edited" title="',printStatic($langtab,$LANG,$PAGE,1)," $EDIT",'"'; } ?>href="/post/<?php echo $ID;?>"><?php echo $DATE ?></a></span><!--όταν ασχοληθώ με την επεξεργασία να έχω στο νου μου που θα μπει το προηγούμενο if-->
  <br>
  <span class="smallfont" id="tags"><?php  echo flagEmoji($post["lang"]); str_lang($langtab,$LANG,$PAGE,2); ?>: <?php writeTags($TAGS); ?></span>
  <div id="postbody"><?php echo $BODY ?></div>
</main>
<?php require_once($PHPDIR . "/commentform.php"); ?>
<?php require_once($PHPDIR . "/footer.php"); ?>
