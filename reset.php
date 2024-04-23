<?php
// Reset grid to all black cells
// the-grid by aaviator42
// 2024-01-18, v0.2, AGPLv3

// Function to generate a 100x100 array with all values 0
function generateZeroArray() {
    $array = array();
    for ($i = 0; $i < 100; $i++) {
        $row = array();
        for ($j = 0; $j < 100; $j++) {
            $row[] = 0;
        }
        $array[] = $row;
    }
    return $array;
}

// Generate black grid array
$grid = generateZeroArray();

// Delete current.db
if(file_exists('current.db')){
	unlink('current.db');
}

// Create new current.db
require 'lib/StorX.php';
$sx = new \StorX\Sx;
$sx->createFile('current.db');
$sx->openFile('current.db', 1);
$sx->modifyKey('grid', $grid);
$sx->closeFile();

echo 'ok';
?>
