<?php

namespace app\classes;

/**
 * Gerencia os tipos de entrada GET e POST
 */

class Input{

    /**
     * get
     * @param string
     * @param int filter Constante com o filtro para a varialvel
     * @return string
    */

    public static function get(string $param, int $filter = FILTER_SANITIZE_SPECIAL_CHARS): string
    {
        return filter_input(INPUT_GET, $param, $filter);
    }

    /**
     * post
     * @param string
     * @param int filter Constante com o filtro para a varialvel
     * @return string
    */

    public static function post(string $param, int $filter = FILTER_SANITIZE_SPECIAL_CHARS): string
    {
        return filter_input(INPUT_POST, $param, $filter);
    }
}