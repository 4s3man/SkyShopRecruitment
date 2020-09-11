<?php

function globalGETHasSubstring(): bool
{
    $textA = $_GET['a'] ?? '';
    $textB = $_GET['b'] ?? '';

    if ($textA === '') {
        return false;
    }

    return false === strpos($textB, $textA, ) ? false : true;
}
