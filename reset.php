<?php
// Function to generate a random 100x100 array with values between 0 and 0
function generateZeroArray() {
    $array = array();
    for ($i = 0; $i < 100; $i++) {
        $row = array();
        for ($j = 0; $j < 100; $j++) {
            $row[] = rand(0, 0);
        }
        $array[] = $row;
    }
    return $array;
}

// Generate black grid array
$grid = generateZeroArray();

if(file_exists('current.db')){
	unlink('current.db');
}

require 'lib/StorX.php';
$sx = new \StorX\Sx;
$sx->createFile('current.db');
$sx->openFile('current.db', 1);
$sx->modifyKey('grid', $grid);
$sx->closeFile();

echo 'ok';
?>
