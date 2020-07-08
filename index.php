<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Site active</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<style>
body {
  font-family: sans-serif;
}
</style>
</head>
<body>

<h1>Site active</h1>

<p><?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
<p>PHP <?php echo PHP_VERSION; ?></p>
<p>HTTPS <?php echo ($_SERVER['HTTPS'] ? 'on' : 'off'); ?></p>
<p>host: <?php echo $_SERVER['HTTP_HOST']; ?></p>

<p><a href="./info.php">view <code>phpinfo();</code></a>&hellip;</p>

</body>
</html>
