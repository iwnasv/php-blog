
<?php
if(empty($TITLE)) { die("give me a title or give me death. -<head>"); }
?>
<!DOCTYPE html>
<html lang="<?php echo getLangName($LANG); ?>">
<head>
<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">
<meta charset="utf-8">
<meta name="robots" content="noarchive">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Ιωνάρας ο Μερακλής 2310">
<meta name="author" content="Ionas">
<meta name="rating" content="14 years">
<base href="https://ionas.dev">
<title><?php echo $TITLE ?> - ionas.dev</title>
<link rel="icon" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="/assets/css/base.css">
<link rel="<?php isAltTheme(0,$THEME); ?>stylesheet" type="text/css" title="plain" href="/assets/css/plain.css">
<link rel="<?php isAltTheme(1,$THEME); ?>stylesheet" type="text/css" title="plain-dark" href="/assets/css/plain-dark.css">
<link rel="alternate" type="application/rss+xml" href="/feed.xml" title="ionas.dev">
<link rel="stylesheet" type="text/css" media="print" href="/assets/css/print.css">
<script type="text/javascript" src="/assets/js/main.js" integrity="sha512-XxZZTo+bdYzPlqRoSIdwW6ACz20em93NQjz+mNR6vWJ+PbwnjOgM7d80vOYiqthShc5/ObGbknsHMfmI/ang9Q=="></script>
</head>
