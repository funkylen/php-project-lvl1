<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Engine\startGame;

function start($playerName)
{
    startGame($playerName, getDescription(), fn () => getQuestion());
}

function getDescription()
{
    return 'What is the result of the expression?';
}

function getQuestion()
{
    $a = rand(0, 100);
    $b = rand(0, 100);
    $operation = randOperation();

    return [
        'content' => "$a $operation $b",
        'answer' => (string) calc($a, $b, $operation),
    ];
}

function randOperation()
{
    $possibleOperations = [
        '*',
        '-',
        '+',
    ];

    $randKey = array_rand($possibleOperations);

    return $possibleOperations[$randKey];
}

function calc($a, $b, $operation)
{
    switch ($operation) {
        case '*':
            return $a * $b;
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
    }
}
