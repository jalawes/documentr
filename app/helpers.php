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

function get_initials($string)
{
    $initials = get_capital_initials($string);

    return (string) $initials[0] . $initials[1];
}

function separate_by_space(string $string)
{
    return preg_split('/\s+/', $string);
}

/**
 * PREG_PATTERN_ORDER
 * Orders results so that $matches[0] is an array of full pattern matches,
 * $matches[1] is an array of strings matched by the first parenthesized subpattern, and so on.
 *
 * @param $string
 * @return array
 */
function get_capital_initials($string)
{
    preg_match_all("/(\S)\S*/i", ucwords($string), $array, PREG_PATTERN_ORDER);

    return $array[1];
}

