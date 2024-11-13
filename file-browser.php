<?php
/**
 * File Browser (2020)
 * https://github.com/yamahdico/php-file-manager
 */

$domain = "fadak.ir"; // Needs to be changed and configured
$filesInFolder = array();
$baseDir       = "../tutorial"; // Needs to be changed and configured
$currentDir    = !empty($_GET['dir']) ? $_GET['dir'] : $baseDir;
$currentDir    = rtrim($currentDir, './');

if (isset($_GET['download'])) {
    //you could provide another logic to present requested file
    readfile($_GET['download']);
    exit;
}

$iterator = new FilesystemIterator($currentDir);
//echo "<h3>" . $iterator->getPath() . "</h3>";
foreach ($iterator as $entry) {
    $name = $entry->getBasename();

    if (is_dir($currentDir . '/' . $name)) {
        echo "D: <a href='?dir=" . $currentDir . "/" . $name . "'>" . $name . "</a><br />";
    } elseif (is_file($currentDir . '/' . $name) and $name != "*.php") {
        echo "F: <a href='https://$domain/" . $currentDir . '/' . $name . "' download='" . $name . "'> " . $name . " </a><br />";
    }
}
?>