<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Engine\startGame;

function start(string $playerName): void
{
    startGame($playerName, getDescription(), fn () => getQuestion());
}

function getDescription(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function getQuestion(): array
{
    $number = rand(0, 100);

    return [
        'content' => $number,
        'answer' => (string) $number % 2 === 0 ? 'yes' : 'no',
    ];
}
