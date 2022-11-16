<?php

namespace Src\Games\Brain\Prime\Game;

use function src\Engine\runGame;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function definesPrimeNumber(int $acceptedNumber): string
{
    for ($i = 2; $i < $acceptedNumber; $i++) {
        if ($acceptedNumber % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}

function runIsItPrimeNumber()
{
    require_once __DIR__ . '/../Engine.php';
    $numberAndAnswer = [];
    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 99);
        switch (mt_rand(1, 3)) {
            case 1:
                $numbersAndAnswer["$number"] = definesPrimeNumber($number);
                break;
            case 2:
                $numbersAndAnswer["$number"] = definesPrimeNumber($number);
                break;
            case 3:
                $numbersAndAnswer["$number"] = definesPrimeNumber($number);
                break;
        }
    }
    runGame(TASK, $numbersAndAnswer);
}
