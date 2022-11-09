<?php

namespace Src\Games\Brain\Even\Game;

use function cli\line;
use function cli\prompt;
use function cli\out;

#функция, которая определяет четное или нечетное число
function determineParity(int $acceptedNumber): bool
{
    if ($acceptedNumber % 2 == 0) {
        return true;
    } else {
        return false;
    }
}
#функция, которая определяет правильный ли ответ 'yes'
function isAnswerYes(int $acceptedNumber): bool
{
    if (determineParity($acceptedNumber) == true) {
        return true;
    } else {
        return false;
    }
}
#функция, которая определяет правильный ли ответ 'no'
function isAnswerNo(int $acceptedNumber): bool
{
    if (determineParity($acceptedNumber) == false) {
        return true;
    } else {
        return false;
    }
}
#функция, которая определяет правильно ли ответил пользователь
function determinesСorrectness(string $acceptedUserResponse, int $acceptedNumber): bool
{
    if ($acceptedUserResponse == 'yes') {
        return isAnswerYes($acceptedNumber);
    } elseif ($acceptedUserResponse == 'no') {
        return isAnswerNo($acceptedNumber);
    } else {
        return false;
    }
}

#функция, которая определяет правильный ответ
function definesResponse(int $acceptedNumber)
{
    $rightAnswer = '';
    if (isAnswerYes($acceptedNumber) == true) {
        $rightAnswer = 'yes';
    } elseif (isAnswerNo($acceptedNumber) == true) {
        $rightAnswer = 'no';
    }
    return $rightAnswer;
}

function runParity()
{
    $userGreeting = 'Welcome to the Brain Games!';
    line($userGreeting);
    $userName = prompt('May I have your name? ');
    $helloUser = 'Hello, ' . $userName . '!';
    line($helloUser);
    $gameConditions = 'Answer "yes" if the number is even, otherwise answer "no".';
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
        $lowUserResponse = mb_strtolower($userResponse);
        $firstPartNegativeResponse = "'" . $userResponse . "'" . ' is wrong answer ;(. Correct answer was ' . "'";
        $secondPartNegativeResponse = definesResponse($randomNumber);
        $thirdRartNegativeResponse = "'" . ".\nLet's try again, " . $userName . "!";
        $negativeResponse = $firstPartNegativeResponse . $secondPartNegativeResponse . $thirdRartNegativeResponse;
        if (determinesСorrectness($lowUserResponse, $randomNumber) == true) {
            $rightAnswersSum++;
            line($positiveResponse);
        } else {
            line($negativeResponse);
            exit;
        }
    }
    return line($wellDone);
}
