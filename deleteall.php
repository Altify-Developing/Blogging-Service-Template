<?php
$files = glob('blogs/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file)) {
    unlink($file); // delete file
  }
}
unlink("js/tempwrite.js");
$fh = fopen('js/tempwrite.js', 'w');
fwrite($fh, "\n");
fclose($fh);
?>