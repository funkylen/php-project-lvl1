<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Engine\startGame;

const DESCRIPTION = 'What number is missing in the progression?';

function start(): void
{
    startGame(DESCRIPTION, fn () => getQuestionContentAndAnswer());
}

function getQuestionContentAndAnswer(): array
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
