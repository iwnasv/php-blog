<?php header('Content-Type: application/rss+xml'); ?>
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
  <atom:link href="https://ionas.dev/rss" rel="self" type="application/rss+xml" />
  <title>posts - ionas.dev</title>
  <link>https://ionas.dev/catalog</link>
  <description>Ιωνάρας ο Μερακλής 2310</description>
  <language>el-GR</language>
  <lastBuildDate>Tue, 10 Jun 2003 09:41:01 GMT</lastBuildDate>
  <docs>http://blogs.law.harvard.edu/tech/rss</docs>
  <generator>my own ass script</generator>
  <webMaster>admin@ionas.dev (Ionas)</webMaster>
<?php
$PHPDIR = "/var/www/ionas.dev/php";
require_once($PHPDIR . "/connectdb.php");
require_once($PHPDIR . "/functions.php");
$result = $db->query('SELECT id,title,tags,lang,postedon,body FROM POSTS WHERE PUB = 1 ORDER BY ID DESC LIMIT 5;') or die("shit");
class post {
  public $id;
  public $title;
  public $tags;
  public $lang;
  public $postedon;
  public $body;
}
while ($post = $result->fetchArray(SQLITE3_ASSOC)) {
  $date = date_create($post["postedon"]);
  echo '  <item>
    <title>' . $post["title"] . '</title>
    <link>https://ionas.dev/post/' . $post["id"] . '</link>
    <description>' . aposiopitika($post["body"]) . '</description>
    <pubDate>' . date_format($date, "D, d M Y H:i:s O"). '</pubDate>
    <guid isPermaLink="false">' . hash('sha256',$post["title"] . $post["id"]) . '</guid>' . writeCategories(explode(" ", $post["tags"])) . '  </item>
';
}?>
</channel>
</rss>
