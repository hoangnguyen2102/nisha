<?php

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

    // Function get 200 char from string
    if (!function_exists('compactString200')) {
        function compactString200($string)
        {
            if (strlen($string) > 200) {
                $string = substr($string, 0, 200);
                $string .='...';
            }

            return $string;
        }
    }

    // Function convert description personal trainer index
    if (!function_exists('convertDescriptionPT')) {
        function convertDescriptionPT($string)
        {
            $result = "<ul>";
            $result .= "<li>";
            $result .= preg_replace('/\r\n/', "</li><li>", $string);
            $result .=  "</li>";
            $result .=  "</ul>";

            return $result;
        }
    }

    if (!function_exists('convertPrice')) {
        function convertPrice($price)
        {
            $result = number_format($price, 0, '', ',');
            $result .= ' đ';
            return $result;
        }
    }
