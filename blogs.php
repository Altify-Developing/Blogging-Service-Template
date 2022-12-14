<!DOCTYPE HTML5>
<html lang="en">
<?php
$config = fopen("config.json", "r") or die("Unable to open file!");
$jsonobj = fread($config,filesize("config.json"));
fclose($config);
$obj = json_decode($jsonobj);
$brandName = $obj->brand;
?>
<head>
  <meta charset="utf-8">
	<meta max-age='1'/>
  <meta name="viewport" content="width=device-width">
  <title><?php echo $brandName; ?> Blogs</title>
  <link rel="stylesheet" type="text/css" href="style2.css" />
	<script type="text/javascript" src="/js/tempwrite.js" defer></script>
	<script type="text/javascript" src="/js/keep.js" defer></script>
</head>
<body>
</body>
</html>