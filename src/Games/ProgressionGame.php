<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Engine\startGame;

function start(string $playerName): void
{
    startGame($playerName, getDescription(), fn () => getQuestion());
}

function getDescription(): string
{
    return 'What number is missing in the progression?';
}

function getQuestion(): array
{
    $base = rand(0, 100);
    $step = rand(0, 100);
    $maxLength = rand(5, 15);

    $progression = [];
    for ($i = 0; $i < $maxLength; $i++) {
        $progression[] = $base + $step * $i;
    }

    $unknownItemKey = array_rand($progression);
    $unknownItem = $progression[$unknownItemKey];
    $progression[$unknownItemKey] = '..';

    return [
        'content' => implode(' ', $progression),
        'answer' => (string) $unknownItem,
    ];
}
