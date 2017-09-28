<?php


if (!function_exists('dd')) {
    /**
     * Generates tab with spaces.
     *
     * @param int $tabs
     * @param int $spaces
     *
     * @return string
     */
    function dd(...$params)
    {
        echo "<pre/>";
        foreach ($params as $param) {
            var_dump($param);
        }
        die();
    }
}