<?php

namespace Src\Games\Brain\Gcd\Game;

use function cli\line;
use function cli\prompt;
use function cli\out;

#функция которая определяет наибольший общий делитель
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

#функция которая определяет правильно ли ответил пользователь
function determineСorrectness(string $accepsedUserResponce, int $firstAcceptedNumber, int $secondAcceptedNumber): bool
{
    $intAccepsedUserResponce = (int)$accepsedUserResponce;
    if ($intAccepsedUserResponce == findGreatestCommonDivisor($firstAcceptedNumber, $secondAcceptedNumber)) {
        return true;
    } else {
        return false;
    }
}

function runningGCD()
{
    require __DIR__ . '/../../vendor/autoload.php';
    $userGreeting = 'Welcome to the Brain Games!';
    line($userGreeting);
    $userName = prompt('May I have your name? ');
    $helloUser = 'Hello, ' . $userName . '!';
    line($helloUser);
    $gameConditions = 'Find the greatest common divisor of given numbers.';
    line($gameConditions);
    $wellDone = 'Congratulations, ' . $userName . '!';
    $rightAnswersSum = 0;
    while ($rightAnswersSum < 3) {
        $questionBeforeTwoRandomNumber = 'Question: ';
        $lineBeforeUserResponse = 'Your answer';
        $positiveResponse = 'Correct!';
        $firstRandomNumber = rand(1, 99);
        $secondRandomNumber = rand(1, 99);
        $randomTwoNumber = $firstRandomNumber . ' ' . $secondRandomNumber;
        out($questionBeforeTwoRandomNumber);
        line($randomTwoNumber);
        $userResponse = prompt($lineBeforeUserResponse);
        $lowUserResponse = strtolower($userResponse);
        $firstPartNegativeResponse = "'" . $userResponse . "'" . ' is wrong answer ;(. Correct answer was ' . "'";
        $secondPartNegativeResponse = findGreatestCommonDivisor($firstRandomNumber, $secondRandomNumber);
        $thirdRartNegativeResponse = "'" . ".\nLet's try again, " . $userName . "!";
        $negativeResponse = $firstPartNegativeResponse . $secondPartNegativeResponse . $thirdRartNegativeResponse;
        if (determineСorrectness($userResponse, $firstRandomNumber, $secondRandomNumber) == true) {
            $rightAnswersSum++;
            line($positiveResponse);
        } else {
            line($negativeResponse);
            exit;
        }
    }
    return line($wellDone);
}
