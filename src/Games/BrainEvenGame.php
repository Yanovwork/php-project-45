<?php

namespace Src\Games\Brain\Even\Game;

use function src\Engine\runGame;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function determineParity(int $acceptedNumber): string
{
    if ($acceptedNumber % 2 == 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function runEven()
{
    require_once __DIR__ . '/../Engine.php';
    $numberAndAnswer = [];
    for ($i = 0; $i < 3; $i++) {
        $number = rand(0, 99);
        switch (mt_rand(1, 3)) {
            case 1:
                $rightResponse = determineParity($number);
                $numberAndAnswer["$number"] = $rightResponse;
                break;
            case 2:
                $rightResponse = determineParity($number);
                $numberAndAnswer["$number"] = $rightResponse;
                break;
            case 3:
                $rightResponse = determineParity($number);
                $numberAndAnswer["$number"] = $rightResponse;
                break;
        }
    }
    runGame(TASK, $numberAndAnswer);
}
