<?php
$uri = strtok("?",$_SERVER['REQUEST_URI']);
?>
<footer>
  <form action="/settings.php" method="post">
    <label for="lang"><?php str_lang($langtab,$LANG,2,2); ?>:</label>
    <select name="lang">
      <option value="0" name="en"<?php selectedNum($LANG, 0) ?>>🇬🇧</option>
      <option value="1" name="el"<?php selectedNum($LANG, 1) ?>>🇬🇷</option>
      <option value="2" name="ru"<?php selectedNum($LANG, 2) ?>>🇷🇺</option>
    </select>
    <label for="theme"><?php str_lang($langtab,$LANG,2,3); ?>:</label>
    <select name="theme">
      <option value="0"<?php selectedNum($THEME, 0) ?>><?php str_lang($langtab,$LANG,2,4); ?></option>
      <option value="1"<?php selectedNum($THEME, 1) ?>><?php str_lang($langtab,$LANG,2,5); ?></option>
    </select>
    <input type="submit" value="<?php str_lang($langtab,$LANG,2,0); ?>">
  </form>
  <span><?php str_lang($langtab,$LANG,2,1); ?></span>
</footer>
</body>
</html>
