<?php

namespace Src\Games\Brain\Prime\Game;

use function src\Engine\runGame;

use const src\Engine\NUMBEROFROUNDS;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $acceptedNumber): bool
{
    for ($i = 2; $i < $acceptedNumber; $i++) {
        if ($acceptedNumber % $i == 0) {
            return false;
        }
    }
    return true;
}

function runIsItPrimeNumber()
{
    $numbersAndAnswer = [];
    for ($i = 0; $i < NUMBEROFROUNDS; $i++) {
        $randNumber = rand(1, 99);
        $numbersAndAnswer["{$i}"]['question'] = "{$randNumber}";
        if (isPrime($randNumber) == true) {
            $numbersAndAnswer[$i]['answer'] = 'yes';
        } else {
            $numbersAndAnswer[$i]['answer'] = 'no';
        }
    }
    runGame(TASK, $numbersAndAnswer);
}
