<?php

function task3(): void
{
    displayLoop();
    currentDateToNewFile();
}

function getTask3LoopString(int $i): string
{
    $outputString = 'ok';
    if (0 === $i % 5 && 0 === $i % 3) {
        $outputString = 'goodexcellent';
    } elseif (0 === $i % 5) {
        $outputString = 'excellent';
    } elseif (0 === $i % 3) {
        $outputString = 'good';
    }

    return $i.$outputString;
}

function displayLoop(): void
{
    $start = 1;
    $stop = 100;

    for ($i = $start; $i <= $stop; ++$i) {
        echo getTask3LoopString($i);
        if ($i === $stop - 10) {
            echo 'Stop!';
            break;
        }
    }
}

function currentDateToNewFile(): void
{
    $dateString = (new \DateTime('now'))->format('Y-m-d');
    file_put_contents(uniqid($dateString), $dateString);
}
