<?php

const PHI = 3.14;

function LuasPersegiPanjang(int $x)
{
    $panjang = $x / 3;
    $lebar = $x / 5;

    echo ($panjang * $lebar) . "<br>";
}

function LuasLingkaran(int $x)
{
    $radius = $x / 3;   // radius atau jari-jari

    echo (PHI * ($radius * $radius)) . "<br>";
}

function KelilingLingkaran(int $x)
{
    $radius = $x / 5;

    echo (2 * PHI * $radius) . "<br>";
}

for ($x = 1; $x <= 100; $x++)
{
    if (($x % 3) == 0 && ($x % 5) == 0) LuasPersegiPanjang($x);
    else if (($x % 3) == 0)             LuasLingkaran($x);
    else if (($x % 5) == 0)             KelilingLingkaran($x);
    else                                printf("%.2f <br>", $x);
}

?>