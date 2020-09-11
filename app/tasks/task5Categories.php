<?php

function categoryArrayTotree(array $arr, string $delimiter): array
{
    $tree = [];

    foreach ($arr as $catPath) {
        $categories = explode($delimiter, $catPath);
        $code = array_reduce($categories, function (string $carry, string $cat) {return $carry .= sprintf('[\'%s\']', trim($cat)); }, '');
        eval(sprintf('$tree%s = [];', $code));
    }

    return $tree;
}
