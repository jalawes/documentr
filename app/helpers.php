<?php

function prettify($json)
{
    if (!isJson($json)) {
        return json_encode($json, JSON_PRETTY_PRINT);
    }
    return false;
}

function isJson($string)
{
    return is_string($string)
           && is_array(json_decode($string, true))
           && (json_last_error() == JSON_ERROR_NONE)
        ? true
        : false;
}

function before_first($string, $character = ' ')
{
    return str_before($string, $character);
}

function after_first($string, $character = ' ')
{
    return str_after($string, $character);
}

function first_last_initials($string)
{
    $all_initials       = get_capital_initials($string);
    $initials           = '';
    $number_of_initials = 2;

    if (sizeof($all_initials) < $number_of_initials) {
        $number_of_initials = sizeof($all_initials);
    }
    foreach (range(0, $number_of_initials - 1) as $index) {
        $initials .= $all_initials[$index];
    }

    return (string)$initials;
}

function separate_by_space(string $string)
{
    return preg_split('/\s+/', $string);
}

function get_capital_initials($string)
{
    preg_match_all("/(\S)\S*/i", ucwords($string), $array, PREG_PATTERN_ORDER);

    return $array[1];
}

