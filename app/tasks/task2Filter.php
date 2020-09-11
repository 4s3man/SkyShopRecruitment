<?php

function removeNotNumbers(string $input): string
{
    return preg_replace('[\d]', '', $input);
}
