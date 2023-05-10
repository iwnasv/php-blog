<?php
$PHPDIR = "/var/www/ionas.dev/php";
require_once($PHPDIR . "/connectdb.php");
require_once($PHPDIR . "/functions.php");
$PAGE = 4;
$TITLE = getString($langtab,$LANG,$PAGE,0);
$BODY = getString($langtab,$LANG,$PAGE,1);
require($PHPDIR . "/head.php"); ?>
<body>
<?php require($PHPDIR . "/nav.php") ?>
<main>
  <div id="title"><?php echo $TITLE; ?></div>
  <hr>
  <div id="postbody">
    <section><?php echo $BODY ?></section>
  </div>
</main>
<?php require($PHPDIR . "/footer.php"); ?>
