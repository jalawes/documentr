<?php

/**
 * Pretty print the provided string.
 *
 * @param $json
 *
 * @return bool|string
 */
function prettify($json)
{
    return !isJson($json) ? json_encode($json, JSON_PRETTY_PRINT) : false;
}

/**
 * Determine if the provided string is JSON.
 *
 * @param $string
 *
 * @return bool
 */
function isJson($string)
{
    return (is_string($string) && is_array(json_decode($string, true)) && (json_last_error() === JSON_ERROR_NONE));
}

/**
 * Retrieve the portion of a string before another.
 *
 * @param        $string
 * @param string $character
 *
 * @return string
 */
function before_first($string, $character = ' ')
{
    return str_before($string, $character);
}

/**
 * Retrieve the portion of a string after another.
 *
 * @param        $string
 * @param string $character
 *
 * @return string
 */
function after_first($string, $character = ' ')
{
    return str_after($string, $character);
}

/**
 * Return the initials from a given name.
 *
 * @param $string
 *
 * @return string
 */
function first_last_initials($string)
{
    $all_initials = get_capital_initials($string);
    $initials = '';
    $number_of_initials = 2;

    if (count($all_initials) < $number_of_initials) {
        $number_of_initials = count($all_initials);
    }

    foreach (range(0, $number_of_initials - 1) as $index) {
        $initials .= $all_initials[$index];
    }

    return $initials;
}

/**
 * Separate a string by an empty space character.
 *
 * @param string $string
 *
 * @return array|false|string
 */
function separate_by_space(string $string)
{
    return preg_split('/\s+/', $string);
}

/**
 * Return the capitalized initials for a provided string.
 *
 * @param $string
 *
 * @return mixed
 */
function get_capital_initials($string)
{
    preg_match_all("/(\S)\S*/i", ucwords($string), $array, PREG_PATTERN_ORDER);

    return $array[1];
}

