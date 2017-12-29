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
