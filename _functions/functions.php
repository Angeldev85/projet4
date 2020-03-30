<?php
/**
* Permet de sécuriser une chaine de caractère
* @param $string
* @return $string
*/
function str_secur($string)
{
    return trim(htmlspecialchars($string));
}

/**
* Debug plus lisible des différentes variables
* @param $var
*/
function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
* fonction pour formater une string en enlevant les espaces et les remplace par des underscore
* @param $string
*/
function format_space($string)
{
    return preg_replace('/\s+/', '_', $string);
}

/**
* fonction pour formater une string en enlevant les underscore et les remplace par des espaces
* @param $string
*/
function format_dash($string)
{
    return str_replace('_', ' ', $string);
}
