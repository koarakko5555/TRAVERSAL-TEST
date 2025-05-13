<?php
$filename = $_GET['file'];
$path = __DIR__ . '/files/' . $filename;

if (file_exists($path)) {
  echo nl2br(file_get_contents($path));
} else {
  echo "File not found.";
}
?>