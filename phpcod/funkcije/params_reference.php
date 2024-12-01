<?php
declare(strict_types=1);

$age = 30;

function promjeniGodine(int $godine): void {
    $GLOBALS['age'] = $godine;
}

promjeniGodine(40);
echo $age; // 40

function promjeniGodineReference(int &$godine, int $value): void {
    $godine = $value;
}

promjeniGodineReference($age, 50);
echo $age; // 50

$noveGodine = 10;
promjeniGodineReference($noveGodine, 30);
echo $noveGodine; // 30