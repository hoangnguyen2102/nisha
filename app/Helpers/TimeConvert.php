<?php

    // Function get date from string
    if (!function_exists('getDateFromString')) {
        function getDateFromString($string)
        {
            $date = null;

            if (!is_null($string)) {
                $date = strtotime($string);
                $date = date('d-m-Y', $date);
            }

            return $date;
        }
    }

    // Function get time from string
    if (!function_exists('getTimeFromString')) {
        function getTimeFromString($string)
        {
            $time = null;

            if (!is_null($string)) {
                $time = strtotime($string);
                $time = date('H:i:s', $time);
            }

            return $time;
        }
    }
