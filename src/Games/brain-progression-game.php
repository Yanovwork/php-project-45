<?php

namespace  Src\Games\Brain\Progression\Game;

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
function correctnessOfUserResponse($acceptedUserResponse, array $receivedArray, int $numberOfSelectedItem): bool
{
    $intUserResponse = (int)$acceptedUserResponse;
    if ($receivedArray[$numberOfSelectedItem] == $intUserResponse) {
        return true;
    } else {
        return false;
    }
}
#функция, которая переводит массив в строку
function arrayToString(array $receivedArray, int $numberOfSelectedItem): string
{
    $receivedArray[$numberOfSelectedItem] = '..';
    $arrayInString = implode(' ', $receivedArray);
    return $arrayInString;
}

#функция, которая определяет верный ответ
function rightAnswerProgression(array $receivedArray, int $numberOfSelectedItem): int
{
    $rightAnswers = $receivedArray[$numberOfSelectedItem];
    return $rightAnswers;
}
