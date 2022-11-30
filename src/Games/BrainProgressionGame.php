<?php

namespace  Src\Games\Brain\Progression\Game;

use function src\Engine\runGame;

use const src\Engine\ROUND;

const TASK = 'What number is missing in the progression?';

function makeProgression(int $differenceBetweenNumbers): array
{

    $proposedArray = [];
    $firstRandomNumberAccepted = rand(0, 99);
    $randomLongArray = rand(5, 15);
    if ($differenceBetweenNumbers == 0) {
        for ($i = $firstRandomNumberAccepted; count($proposedArray) <= $randomLongArray; $i += 2) {
            $proposedArray[] = $i;
        }
    } elseif ($differenceBetweenNumbers == 1) {
        for ($i = $firstRandomNumberAccepted; count($proposedArray) <= $randomLongArray; $i += 3) {
            $proposedArray[] = $i;
        }
    } elseif ($differenceBetweenNumbers == 2) {
        for ($i = $firstRandomNumberAccepted; count($proposedArray) <= $randomLongArray; $i += 5) {
            $proposedArray[] = $i;
        }
    }
    $randIndex = rand(0, count($proposedArray) - 1);
    $randResponse = $proposedArray[$randIndex];
    $proposedArray[$randIndex] = '..';
    $progressionInString = implode(' ', $proposedArray);
    return ["{$progressionInString}" => $randResponse];
}

function runTheProgression()
{
    $progressionAndResponse = [];
    for ($i = 0; $i < ROUND; $i++) {
        $progressionInArray = makeProgression($i);
        foreach ($progressionInArray as $key => $value) {
            $progressionAndResponse["{$i}"]['question'] = $key;
            $progressionAndResponse["{$i}"]['answer'] = $value;
        }
    }
    runGame(TASK, $progressionAndResponse);
}
