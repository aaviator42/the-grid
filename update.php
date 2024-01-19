<?php

if(!(isset($_GET["row"]) && isset($_GET["col"]) && isset($_GET["color"]))){
	die;
}

$row = (int)$_GET["row"];
$col = (int)$_GET["col"];
$color = (int)$_GET["color"];

if(!(	$row >= 0 && $row <= 100 &&
		$col >= 0 && $col <= 100 && 
		$color >= 0 && $color <= 7)){
	die;
}


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