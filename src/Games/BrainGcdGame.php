<?php

namespace Src\Games\Brain\Gcd\Game;

use function src\Engine\runGame;

use const src\Engine\NUMBEROFROUNDS;

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
    $numbersAndAnswer = [];
    for ($i = 0; $i < NUMBEROFROUNDS; $i++) {
        $firstNumber = rand(1, 99);
        $secondNumber = rand(1, 99);
        $numbersAndAnswer[$i]['question'] = "{$firstNumber} {$secondNumber}";
        $numbersAndAnswer[$i]['answer'] = findGreatestCommonDivisor($firstNumber, $secondNumber);
    }
    runGame(TASK, $numbersAndAnswer);
}
