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

        $question = $getQuestionContentAndAnswer();

        line('Question: ' . $question['content']);

        $answer = prompt('Your answer');

        if ($answer !== $question['answer']) {
            line("'$answer' is wrong answer ;(. Correct answer was '{$question['answer']}'.");
            line("Let's try again, $playerName!");
            return;
        }

        if ($triesCount === 0) {
            line("Congratulations, $playerName!");
            return;
        }

        line('Correct!');
    }
}
