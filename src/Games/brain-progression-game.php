<?php

namespace  Src\Games\Brain\Progression\Game;

use function cli\line;
use function cli\prompt;
use function cli\out;

#функция, которая генерирует нужный массив
function generatingProgression(int $acceptedMaximumArrayLength, int $acceptedNumberOfCorrectAnswers): array
{
    $proposedArray = [];
    $firstRandomNumberAccepted = rand(0, 99);
    $randomLongArray = rand(5, $acceptedMaximumArrayLength);
    if ($acceptedNumberOfCorrectAnswers == 0) {
        for ($i = $firstRandomNumberAccepted; count($proposedArray) <= $randomLongArray; $i += 2) {
            $proposedArray[] = $i;
        }
    } elseif ($acceptedNumberOfCorrectAnswers == 1) {
        for ($i = $firstRandomNumberAccepted; count($proposedArray) <= $randomLongArray; $i += 3) {
            $proposedArray[] = $i;
        }
    } elseif ($acceptedNumberOfCorrectAnswers == 2) {
        for ($i = $firstRandomNumberAccepted; count($proposedArray) <= $randomLongArray; $i += 5) {
            $proposedArray[] = $i;
        }
    }
    return $proposedArray;
}
#функция, которая определяет правильно ли ответил пользователь
function determiningUserTruth(string $aUserResponse, array $receivedArray, int|string $numberOfSelectedItem): bool
{
    $intUserResponse = (int)$aUserResponse;
    if ($receivedArray[$numberOfSelectedItem] == $intUserResponse) {
        return true;
    } else {
        return false;
    }
}
#функция, которая переводит массив в строку
function convertingAnArrayToString(array $receivedArray, int|string $numberOfSelectedItem): string
{
    $receivedArray[$numberOfSelectedItem] = '..';
    $arrayInString = implode(' ', $receivedArray);
    return $arrayInString;
}

#функция, которая определяет верный ответ
function determiningTheCorrectAnswer(array $receivedArray, int|string $numberOfSelectedItem): int
{
    $rightAnswers = $receivedArray[$numberOfSelectedItem];
    return $rightAnswers;
}

function startTheProgression()
{
    require __DIR__ . '/../../vendor/autoload.php';
    $userGreeting = 'Welcome to the Brain Games!';
    line($userGreeting);
    $userName = prompt('May I have your name? ');
    $helloUser = 'Hello, ' . $userName . '!';
    line($helloUser);
    $gameConditions = 'What number is missing in the progression?';
    line($gameConditions);
    $wellDone = 'Congratulations, ' . $userName . '!';
    $rightAnswersSum = 0;
    while ($rightAnswersSum < 3) {
        $questionBeforeOperation = 'Question: ';
        $lineBeforeUserResponse = 'Your answer';
        $positiveResponse = 'Correct!';
        out($questionBeforeOperation);
        $maximumArrayLength = 15;
        $randomProgression = generatingProgression($maximumArrayLength, $rightAnswersSum);
        $randomEliminatedNumber = array_rand($randomProgression);
        $outputOfProgression = convertingAnArrayToString($randomProgression, $randomEliminatedNumber);
        line($outputOfProgression);
        $userResponse = prompt($lineBeforeUserResponse);
        $lowUserResponse = strtolower($userResponse);
        $firstPartNegativeResponse = "'" . $userResponse . "'" . ' is wrong answer ;(. Correct answer was ' . "'";
        $secondPartNegativeResponse = determiningTheCorrectAnswer($randomProgression, $randomEliminatedNumber);
        $thirdRartNegativeResponse = "'" . ".\nLet's try again, " . $userName . "!";
        $negativeResponse = $firstPartNegativeResponse . $secondPartNegativeResponse . $thirdRartNegativeResponse;
        if (determiningUserTruth($userResponse, $randomProgression, $randomEliminatedNumber) == true) {
            $rightAnswersSum++;
            line($positiveResponse);
        } else {
            line($negativeResponse);
            exit;
        }
    }
    return line($wellDone);
}
