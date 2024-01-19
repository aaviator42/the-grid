 <?php
// Update pixel values in current.db
// the-grid by aaviator42
// 2023-01-18, v0.1, AGPLv3


if(!(isset($_GET["row"]) && isset($_GET["col"]) && isset($_GET["color"]))){
	die;
}

$row = (int)$_GET["row"];
$col = (int)$_GET["col"];
$color = (int)$_GET["color"];

// Range checks
if(!(	$row >= 0 && $row <= 100 &&
		$col >= 0 && $col <= 100 && 
		$color >= 0 && $color <= 7)){
	die;
}

// Write to file
require 'lib/StorX.php';
$sx = new \StorX\Sx;
$sx->openFile('current.db', 1);
$grid = $sx->returnKey('grid');
$grid[$row][$col] = $color;
$sx->modifyKey('grid', $grid);
$sx->closeFile();

/*
// Set the content type to JSON
header('Content-Type: application/json');

// Output the JSON data
echo json_encode($grid);
*/