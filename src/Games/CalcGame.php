<?php

namespace BrainGames\Games\CalcGame;

use Exception;

use function BrainGames\Engine\startGame;

function start(string $playerName): void
{
    startGame($playerName, getDescription(), fn () => getQuestion());
}

function getDescription(): string
{
    return 'What is the result of the expression?';
}

function getQuestion(): array
{
    $a = rand(0, 100);
    $b = rand(0, 100);
    $operation = randOperation();

    return [
        'content' => "$a $operation $b",
        'answer' => (string) calc($a, $b, $operation),
    ];
}

function randOperation(): string
{
    $possibleOperations = [
        '*',
        '-',
        '+',
    ];

    $randKey = array_rand($possibleOperations);

    return $possibleOperations[$randKey];
}

function calc(int $a, int $b, string $operation): int
{
    switch ($operation) {
        case '*':
            return $a * $b;
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
    }

    throw new Exception('Undefined operation');
}
