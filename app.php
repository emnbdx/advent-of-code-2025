<?php

function day1($countAll = false)
{
    $init = 50;
    $password = 0;

    $fp = fopen("input/1.txt", "r");

    while (($buffer = fgets($fp)) !== false) {

        $direction = substr($buffer, 0, 1);
        $steps = substr($buffer, 1);

        if ($steps > 100) {
            if ($countAll) {
                $password += floor($steps / 100);
            }
            $steps = $steps % 100;
        }

        if ($direction == "L") {
            if ($init - $steps < 0) {
                if ($countAll && $init != 0) {
                    $password++;
                }
                $init = 100 - ($steps - $init);
            } else {
                $init -= $steps;
            }
        } else if ($direction == "R") {
            if ($init + $steps >= 100) {
                $init = $steps + $init - 100;
                if ($countAll && $init != 0) {
                    $password++;
                }
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

function day2()
{
    $output = 0;

    //$fp = fopen("input/2.txt", "r");
    $fp = file_get_contents("input/2.txt", "r");

    $ranges = explode(",", $fp);

    foreach ($ranges as $range) {
        $fl = explode('-', $range);
        $start = $fl[0];
        $end = $fl[1];

        while ($start <= $end) {
            $len = strlen($start);
            if ($len % 2 != 0) {
                $start++;
                continue;
            }

            $first = substr($start, 0, $len / 2);
            $second = substr($start, $len / 2, $len / 2);

            if ($first == $second) {
                $output += $start;
            }

            $start++;
        }
    }

    return $output;
}

$answer = day1();
echo $answer . PHP_EOL;

echo PHP_EOL;

$answer = day1(true);
echo $answer . PHP_EOL;

echo PHP_EOL;

$answer = day2();
echo $answer . PHP_EOL;
