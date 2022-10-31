<?php

namespace Src\Games\Brain\Prime\Game;

#функция которая определяет простое число
function primeNumber(int $acceptedNumber): bool
{
    for ($i = 2; $i < $acceptedNumber; $i++) {
        if ($acceptedNumber % $i == 0) {
            return false;
        }
    }
    return true;
}
#функция если пользователь ответил yes
function ifAnswerYesPrime(int $acceptedNumber): bool
{
    if (primeNumber($acceptedNumber) == true) {
        return true;
    } else {
        return false;
    }
}
#функция если пользователь ответил no
function ifAnswerNoPrime(int $acceptedNumber): bool
{
    if (primeNumber($acceptedNumber) == false) {
        return true;
    } else {
        return false;
    }
}
#функция, которая определяет правильно ли ответил пользователь
function answeredCorrectly(string $acceptedUserResponse, int $acceptedNumber): bool
{
    if ($acceptedUserResponse == 'yes') {
        return ifAnswerYesPrime($acceptedNumber);
    } elseif ($acceptedUserResponse == 'no') {
        return ifAnswerNoPrime($acceptedNumber);
    } else {
        return false;
    }
}
#функция, которая определяет правильный ответ
function rightAnswer(int $acceptedNumber): string
{
    $rightAnswer = '';
    if (ifAnswerYesPrime($acceptedNumber) == true) {
        $rightAnswer = 'yes';
    } elseif (ifAnswerNoPrime($acceptedNumber) == true) {
        $rightAnswer = 'no';
    }
    return $rightAnswer;
}
