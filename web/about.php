<?php
$PHPDIR = "/var/www/ionas.dev/php";
require_once($PHPDIR . "/functions.php");
$PAGE = 3;
$TITLE = getString($langtab,$LANG,$PAGE,0);
require($PHPDIR . "/head.php"); ?>
<body>
<?php require($PHPDIR . "/nav.php") ?>
<main>
<!--
  * ti scroblarei to kinhto m me cronjob
  * last insert row id gia na kserw to epomeno url
-->
<div id="title"><?php echo $TITLE ?></div>
<hr>
<div id="postbody">
<table>
  <thead>
    <tr>
      <th><?php str_lang($langtab,$LANG,$PAGE,1); ?></th>
      <th><?php str_lang($langtab,$LANG,$PAGE,2); ?></th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>email</td>
     <td><a href="mailto:admin@ionas.dev">admin@ionas.dev</a><br>(<a href="http://pgp.mit.edu/pks/lookup?op=get&search=0x65592E46A7EE4C91">PGP key</a>)</td>
    </tr>
    <tr>
      <td>github</td>
      <td><a href="https://github.com/iwnaras">iwnaras</a></td>
    </tr>
    <tr>
      <td>steam</td>
      <td>iwnaras</td>
    </tr>
    <tr>
     <td>valorant</td>
     <td>iwnaras#2310<br>αναβολή λόγω κόβιντ</td>
    </tr>
  </tbody>
</table>
<table id="status">
  <thead>
    <tr>
      <th>Status:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>nginx</td>
      <td><?php servstat("nginx"); ?></td>
    </tr>
    <tr>
      <td><a href="mumble://:helloguyswhereareyoufrom@ionas.dev">mumble server</a></td>
      <td><?php servstat("mumble-server"); ?></td>
    </tr>
    <tr>
      <td>sshd</td>
      <td><?php servstat("sshd"); ?></td>
    </tr>
  </tbody>
</table>
</div>
<span><?php str_lang($langtab,$LANG,$PAGE,3); ?>: 1KCVtMxbw12x7o8TUSbA6UJzcTPFV8Gijk</span>
<br>
<span>Ελπίζω να το δει κάποτε ένας σεΐχης και να με χαρτζιλικώσει κανά μύριο</span>
</main>
<?php require($PHPDIR . "/footer.php"); ?>
