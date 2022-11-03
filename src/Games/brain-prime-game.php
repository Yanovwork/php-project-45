<?php

namespace Src\Games\Brain\Prime\Game;

use function cli\line;
use function cli\prompt;
use function cli\out;

#функция которая определяет простое число
function definesPrimeNumber(int $acceptedNumber): bool
{
    for ($i = 2; $i < $acceptedNumber; $i++) {
        if ($acceptedNumber % $i == 0) {
            return false;
        }
    }
    return true;
}
#функция если пользователь ответил yes
function doIfYes(int $acceptedNumber): bool
{
    if (definesPrimeNumber($acceptedNumber) == true) {
        return true;
    } else {
        return false;
    }
}
#функция если пользователь ответил no
function doIfNo(int $acceptedNumber): bool
{
    if (definesPrimeNumber($acceptedNumber) == false) {
        return true;
    } else {
        return false;
    }
}
#функция, которая определяет правильно ли ответил пользователь
function determinesСorrectnessOfAnswer(string $acceptedUserResponse, int $acceptedNumber): bool
{
    if ($acceptedUserResponse == 'yes') {
        return doIfYes($acceptedNumber);
    } elseif ($acceptedUserResponse == 'no') {
        return doIfNo($acceptedNumber);
    } else {
        return false;
    }
}
#функция, которая определяет правильный ответ
function determinesCorrectAnswer(int $acceptedNumber): string
{
    $rightAnswer = '';
    if (doIfYes($acceptedNumber) == true) {
        $rightAnswer = 'yes';
    } elseif (doIfNo($acceptedNumber) == true) {
        $rightAnswer = 'no';
    }
    return $rightAnswer;
}

function isItPrimeNumber()
{
    require __DIR__ . '/../../vendor/autoload.php';
    $userGreeting = 'Welcome to the Brain Games!';
    line($userGreeting);
    $userName = prompt('May I have your name? ');
    $helloUser = 'Hello, ' . $userName . '!';
    line($helloUser);
    $gameConditions = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    line($gameConditions);
    $wellDone = 'Congratulations, ' . $userName . '!';
    $rightAnswersSum = 0;
    while ($rightAnswersSum < 3) {
        $questionBeforeNumber = 'Question: ';
        $lineBeforeUserResponse = 'Your answer';
        $positiveResponse = 'Correct!';
        $randomNumber = rand(1, 99);
        out($questionBeforeNumber);
        line($randomNumber);
        $userResponse = prompt($lineBeforeUserResponse);
        $lowUserResponse = strtolower($userResponse);
        $firstPartNegativeResponse = "'" . $userResponse . "'" . ' is wrong answer ;(. Correct answer was ' . "'";
        $secondPartNegativeResponse = determinesCorrectAnswer($randomNumber);
        $thirdRartNegativeResponse = "'" . ".\nLet's try again, " . $userName . "!";
        $negativeResponse = $firstPartNegativeResponse . $secondPartNegativeResponse . $thirdRartNegativeResponse;
        if (determinesСorrectnessOfAnswer($lowUserResponse, $randomNumber) == true) {
            $rightAnswersSum++;
            line($positiveResponse);
        } else {
            line($negativeResponse);
            exit;
        }
    }
    return line($wellDone);
}
