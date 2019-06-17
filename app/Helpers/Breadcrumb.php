<?php
/**
 * Created by PhpStorm.
 * User: hugo2
 * Date: 6/5/2019
 * Time: 9:35 PM
 */

// Function get 30 char from string
if (!function_exists('compactString')) {
    function compactString($string)
    {
        if (strlen($string) > 30) {
            $string = substr($string, 0, 30);
            $string .='...';
        }

        return $string;
    }
}