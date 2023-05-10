<?php
$PHPDIR = "/var/www/ionas.dev/php";
require_once($PHPDIR . "/connectdb.php");
require_once($PHPDIR . "/functions.php");
$PAGE = 5;
$TITLE = getString($langtab,$LANG,$PAGE,0);
if(!empty($_GET["tag"])) {
  $selectTag = filter_var($_GET["tag"],FILTER_UNSAFE_RAW);
  if(preg_match('/[^A-Za-z0-9]/', $selectTag)) {
    http_response_code(400);
    die("400 bad request");
  }
  $result = $db->query("SELECT id,title,lang,postedon,tags,body FROM POSTS WHERE pub = 1 AND tags LIKE '%" . $selectTag . "%' ORDER BY ID DESC;");
  $TITLE = getString($langtab,$LANG,$PAGE,2) . ": " . $selectTag;
} else {
  $result = $db->query('SELECT id,title,lang,postedon,tags,body FROM POSTS WHERE pub = 1 ORDER BY ID DESC;');
}
class post {
  public $id;
  public $title;
  public $lang;
  public $postedon;
  public $tags;
  public $editedon;
  public $body;
}
require($PHPDIR . "/head.php");
require($PHPDIR . "/nav.php"); ?>
<main>
  <div id="title"><?php echo $TITLE; ?></div>
  <hr>
  <ul class="align-left">
  <?php while ($post = $result->fetchArray(SQLITE3_ASSOC)) {
    $DATE = date_create($post["postedon"]);
    echo "<li><a href=\"/post/" . $post["id"] . "\">" . $post["title"] . "</a> <span class=\"smallfont\">" . date_format($DATE,"Y-n-j") . ' [' . getString($langtab,$LANG,$PAGE,1) . ': ';
    if (!empty($selectTag)) {
      writeTags(explode(" ", $post["tags"]), $selectTag);
    } else {
      writeTags(explode(" ", $post["tags"]));
    }
    echo "]</span></li>";
  }?>
  </ul>
</main>
<?php include($PHPDIR . "/footer.php") ?>
