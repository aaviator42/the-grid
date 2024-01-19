<?php
// Return current grid state as JSON array
// the-grid by aaviator42
// 2023-01-18, v0.1, AGPLv3

require 'lib/StorX.php';
$sx = new \StorX\Sx;
$sx->openFile('current.db', 0);
$grid = $sx->returnKey('grid');
$sx->closeFile();


// Set the content type to JSON
header('Content-Type: application/json');

// Output the JSON data
echo json_encode($grid);

?>
