<?php

namespace Src\Games\Brain\Gcd\Game;

use function src\Engine\runGame;

const TASK = 'Find the greatest common divisor of given numbers.';

function findGreatestCommonDivisor(int $firstAcceptedNumber, int $secondAcceptedNumber): int
{
    $a = abs($firstAcceptedNumber);
    $b = abs($secondAcceptedNumber);
    while ($a != $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

function runGCD()
{
    require_once __DIR__ . '/../Engine.php';
    $numbersAndAnswer = [];
    for ($i = 0; $i < 3; $i++) {
        $first = rand(1, 99);
        $second = rand(1, 99);
        switch (mt_rand(1, 3)) {
            case 1:
                $numbersAndAnswer["$first $second"] = findGreatestCommonDivisor($first, $second);
                break;
            case 2:
                $numbersAndAnswer["$first $second"] = findGreatestCommonDivisor($first, $second);
                break;
            case 3:
                $numbersAndAnswer["$first $second"] = findGreatestCommonDivisor($first, $second);
                break;
        }
    }
    runGame(TASK, $numbersAndAnswer);
}
