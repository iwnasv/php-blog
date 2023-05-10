<aside>
  <input type="button" id="newCommentSwitch" value="<?php $PAGE = 6; str_lang($langtab,$LANG,$PAGE,0); ?>" onclick="expandComment()">
  <div id="inputComment">
    <form action="/comment" method="post">
      <fieldset>
        <legend><?php str_lang($langtab,$LANG,$PAGE,0); ?></legend>
        <input name="postId" value="<?php echo $ID; ?>">
        <label for="posterName"><?php str_lang($langtab,$LANG,$PAGE,1); ?></label>
        <input type="text" name="posterName" minlength="2" maxlength="16">
        <label for="posterAddress"><?php str_lang($langtab,$LANG,$PAGE,2); ?></label>
        <input type="email" placeholder="optional" name="posterAddress">
        <label for="captcha"><?php str_lang($langtab,$LANG,$PAGE,5); ?></label>
        <input type="text" name="captcha" minlegth="4" maxlength="12" placeholder="<?php str_lang($langtab,$LANG,$PAGE,6); ?>">
        <textarea name="commentBody" placeholder="<?php str_lang($langtab,$LANG,$PAGE,3); ?>" cols="40" rows="10"></textarea>
        <input type="submit" method="post" value="<?php str_lang($langtab,$LANG,$PAGE,4); ?>">
      </fieldset>
    </form>
  </div>
  <ul id="comments">
  <?php $result = $db->query('SELECT time,name,comment,hash FROM COMMENTS WHERE parentpost = ' . $ID . ' ORDER BY time ASC');
  $wrote = " " . getString($langtab,$LANG,$PAGE,7) . " ";
  while ($comment = $result->fetchArray(SQLITE3_ASSOC)) {
    echo '<li class="comment" id="' . $comment["hash"] . '"><img src="https://robohash.org/' . $comment["name"] . '.png?size=100x100"><div><span>' . $comment["name"] . $wrote . $comment["time"] . '</span><br><span>' . $comment["comment"] . '</span></div></li>';
  }
  ?>
  </ul>
</aside>
