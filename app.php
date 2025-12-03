<?php

function day1_1()
{
    $init = 50;
    $password = 0;

    $fp = fopen("input/1.txt", "r");

    while (($buffer = fgets($fp)) !== false) {

        $direction = substr($buffer, 0, 1);
        $steps = substr($buffer, 1);

        if ($steps < 100 || $steps > 100) {
            $steps = $steps % 100;
            $password += floor($steps / 100);
        }

        if ($direction == "L") {
            if ($init - $steps < 0) {
                $init = 100 - ($steps - $init);
            } else {
                $init -= $steps;
            }
        } else if ($direction == "R") {
            if ($init + $steps >= 100) {
                $init = $steps + $init - 100;
            } else {
                $init += $steps;
            }
        }

        if ($init == 0) {
            $password++;
        }
    }

    return $password;
}


$answer = day1_1();
echo $answer . PHP_EOL;
