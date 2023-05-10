<?php
session_start();
try {
  $db = new SQLite3('/var/www/ionas.dev/db/ionasdev.db');
} catch(Exception $e) {
  echo $e->getMessage() . " :(";
  die();
}
if (isset($_POST["readno"])) {
  if (preg_match('/[0-9]/', $_POST["readno"]) && intval($_POST["readno"]) > 0 ) {//elegxos an einai int metaksy 1 k ID(max)
    $ID = intval($_POST["readno"]);
    $statement = $db->prepare('SELECT * FROM posts WHERE pub = 1 AND id = '.$ID);
    $result = $statement->execute();
    $post = $result->fetchArray();
  }
}
?>
<html lang="en">
<head>
<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
<meta http-equiv="Content-Security-Policy" content="default-src 'self'">
<meta charset="utf-8">
<meta name="robots" content="none">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="my first-name .dev">
<meta name="author" content="Ionas">
<meta name="rating" content="14 years">
<title>New post - ionas.dev</title>
<body>
  <form action="/auth.php" method="post">
    <label for="pw">what's the magic word?</label>
    <input type="password" name="pw">
    <input type="submit" value="get authd"<?php if (isset($_SESSION["auth"]) && ($_SESSION["auth"] == 1)) { echo ' disabled="true"'; } ?>>
  </form>
  <form action="/index.php" method="post">
    <label for="readno">grab post no.</label>
    <input type="number" min="1" max="1000" name="readno">
    <input type="submit" value="set or reset"></input>
  </form>
  <form action="/submit.php" method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" width="6em" required="true" value="<?php if (!empty($ID)) { echo $post["title"]; } ?>">
    <label for="lang">Lang:</label>
    <input type="number" name="lang" min="0" max="3" required="true" value="<?php if (!empty($ID)) { echo $post["lang"]; } ?>">
    <br>
    <label for="tags">Tags:</label>
    <input type="text" name="tags" required="true" value="<?php if (!empty($ID)) { echo $post["tags"]; } ?>"><br>
    <textarea name="body" required="true" rows="8" cols="64"><?php if (!empty($ID)) { echo $post["body"]; } else { echo 'paste it'; } ?></textarea><br>
    <label for="writeno">Editing post:</label>
    <input type="number" name="writeno" value="<?php if(!empty($ID)) { echo $ID; } else { echo '" disabled="true'; } ?>">
    <label for="pub">public</label>
    <input name="pub" checked="true" type="checkbox">
    <input type="submit" value="write post" min="0" max="<?php echo $IDmax ?>">
  </form>
</body>
</html>
