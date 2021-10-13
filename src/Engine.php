<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\askNameAndGreetPlayer;
use function cli\line;
use function cli\prompt;

function startGame(string $description, callable $getQuestionContentAndAnswer): void
{
    $playerName = askNameAndGreetPlayer();

    line($description);

    $triesCount = 3;

    while ($triesCount > 0) {
        $triesCount -= 1;

        ['answer' => $answer, 'content' => $questionContent] = $getQuestionContentAndAnswer();

        line('Question: ' . $questionContent);

        $playerAnswer = prompt('Your answer');

        if ($playerAnswer !== $answer) {
            line("'$playerAnswer' is wrong answer ;(. Correct answer was '$answer'.");
            line("Let's try again, $playerName!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, $playerName!");
}
