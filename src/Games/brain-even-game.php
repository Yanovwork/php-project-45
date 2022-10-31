<?php

namespace Src\Games\Brain\Even\Game;

#функция, которая определяет четное или нечетное число
function evenOrOdd(int $acceptedNumber): bool
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
    if (evenOrOdd($acceptedNumber) == true) {
        return true;
    } else {
        return false;
    }
}
#функция, которая определяет правильный ли ответ 'no'
function isAnswerNo(int $acceptedNumber): bool
{
    if (evenOrOdd($acceptedNumber) == false) {
        return true;
    } else {
        return false;
    }
}
#функция, которая определяет правильно ли ответил пользователь
function exactAnswer(string $acceptedUserResponse, int $acceptedNumber): bool
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
function rightAnswer(int $acceptedNumber)
{
    $rightAnswer = '';
    if (isAnswerYes($acceptedNumber) == true) {
        $rightAnswer = 'yes';
    } elseif (isAnswerNo($acceptedNumber) == true) {
        $rightAnswer = 'no';
    }
    return $rightAnswer;
}
