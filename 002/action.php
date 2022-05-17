<?php

$door = [$_POST['par1'], $_POST['par2']];
$device = [$_POST['holPar1'], $_POST['holPar2'], $_POST['holPar2']];

rsort($door);
rsort($device);

function measure($door, $device) {
    foreach ($door as $key => $value) {
        if($device[$key] > $value )
                return 'не пройде';
    }
    return 'пройде';
}

echo (measure($door, $device));
echo "<hr>";
echo "  <a href=\"./\"><button>повернутися на попередню сторінку</button></a>";



