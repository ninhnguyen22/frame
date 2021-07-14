<?php

if (!function_exists('vd')) {
    function vd(...$vars)
    {
        foreach ($vars as $var) {
            dump($var);
        }

        exit(1);
    }
}
