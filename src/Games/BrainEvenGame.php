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
                $numberAndAnswer["$number"] = determineParity($number);
                break;
            case 2:
                $numberAndAnswer["$number"] = determineParity($number);
                break;
            case 3:
                $numberAndAnswer["$number"] = determineParity($number);
                break;
        }
    }
    runGame(TASK, $numberAndAnswer);
}
