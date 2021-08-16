<?php

namespace Nin\Libs\Session;

trait TokenGenerate
{
    /**
     * Generate a token.
     *
     * @param int $length
     * @return string
     */
    protected function randomString($length)
    {
        $seed = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijqlmnopqrtsuvwxyz0123456789';
        $max = strlen($seed) - 1;
        $string = '';
        for ($i = 0; $i < $length; ++$i) {
            $string .= $seed[intval(mt_rand(0.0, $max))];
        }

        return $string;
    }
}
