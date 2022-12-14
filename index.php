<!DOCTYPE HTML>  
<html lang="en">
<?php
$config = fopen("config.json", "r") or die("Unable to open file!");
$jsonobj = fread($config,filesize("config.json"));
fclose($config);
$obj = json_decode($jsonobj);
$brandName = $obj->brand;
?>
<head>
<title><?php echo $brandName; ?> Blogging</title>
<link href="https://bouncecss.bookie0.repl.co/bounce.css" rel="stylesheet" type="text/css" />
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<card style="float: right; margin-right: 150px; margin-top: 10px; padding: 3px; background-image: linear-gradient(black, green, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, green, blue, black);" onclick="window.location.replace(origin+'/blogs.php');">Visit Other Blogs</card>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $websiteErr = $titleErr = "";
$name = $email = $comment = $website = $title = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }
	if (empty($_POST["title"])) {
    $titleErr = "Title is required";
  } else {
    $title = test_input($_POST["title"]);
    // check if title only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$title)) {
      $titleErr = "Only letters and white space allowed";
			$title = 'Error';
    }
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2><?php echo $brandName; ?> Blogging</h2>
<p><span title='Required' class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span title='Required' class="error">* <?php echo $nameErr;?></span>
  <br><br>
	Title: <input type="text" name="title" value="<?php echo $title;?>">
  <span title='Required' class="error">* <?php echo $titleErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span title='Required' class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Content: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<?php
$myfile = fopen("js/tempwrite.js", "r") or die("Unable to open file!");
$oldjs = fread($myfile,filesize("js/tempwrite.js"));
fclose($myfile);
if ($name !== "") {
	$permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
$rand = generate_string($permitted_chars, rand(1, 2));
$filename = $name . '.html';
if (strlen($comment) <= 30) {
	$description = substr($comment, 0, strlen($comment)-10) . "...";
}
if (strlen($comment) >= 30) {
	$desccount = strlen($comment) - 20;
	$description = substr($comment, 0, $desccount) . "...";
}
$dat = date("l jS \of F Y h:i:s A");
$content = "<!DOCTYPE HTML5> <html> <head> <meta charset=\"utf-8\"> <meta max-age='1'/> <meta name=\"viewport\" content=\"width=device-width\"> <title>" . $title . " | $brandName Blogs</title> <link href=\"https://bouncecss.bookie0.repl.co/bounce.css\" rel=\"stylesheet\" type=\"text/css\" /> </head> <body><h2>" . $title . '</h2><img style=\'float: right; margin-right: 150px;\' width="450" height="450" title=\'Altify Developing\' src=\'/favicon-0.png\'><br>' . '<br><p>What is it: ' . $comment . '</p><br><p>Email: <a href=\'mailto:' . $email . "' title='Send Email'>" . $email . "</a>" . '</p><br><p>Website: <a href=\'' . $website . "' title='Visit Website'>" . $website . "</a>" . "</p><br><h3>Blog Contributed By: " . $name . "</h3>" . "<h4>Blog Provided to you by <a href='https://www.altifydeveloping.com/'>Altify Developing</a><h4><br><br><br><br>" . '<a href=\'https://github.com/Altify-Developing\' target="_blank" style=\'float: right; margin-right: 150px;\' width="450" height="120" title=\'Altify Developing\'><img src=\'/github.png\' style=\'float: right;\' width="450" height="120" title=\'Altify Developing\'></a>';
$content3 = "document.body.innerHTML += \"<div style=\\\"background-image: linear-gradient(black, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, red, black);border-style: solid;padding: '50px'\\\"><h4>Blog Title: '" . $title . "'<br>Created By: " . $name . "</h4><br><h5>A Small Description:</h5><p>" . $description . "<br><script> // Blog Provided By $brandName Don't Steal My Source Code Asshole</script>" . "<a href='/" . 'blogs/' . $rand . $filename . "'>Visit Blog</a><p>Date: $dat</p></div>\\n\";\n";
$fh = fopen('blogs/' . $rand . $filename, 'w');
fwrite($fh, $content);
fclose($fh);
$fh = fopen('js/tempwrite.js', 'w');
fwrite($fh, $content3 . "\n$oldjs");
fclose($fh);
echo "<a href='/" . 'blogs/' . $rand . $filename . "'>Visit Blog</a>";
};
?>

</body>
</html>