<?php

use Illuminate\Support\Str;


if (!function_exists('add_cents_if_none')) {

    /**
     * 
     *
     * @param
     * @return
     */
    function add_cents_if_none(string $money = '')
    {
        return str_contains($money, '.') ? $money : ($money . '.0');
    }
}

if (!function_exists('only_digits')) {

    /**
     * 
     *
     * @param
     * @return
     */
    function only_digits(string $str)
    {
        return Str::replaceMatches(
            pattern: '/[^0-9]++/',
            replace: '',
            subject: $str
        );
    }
}

if (!function_exists('extract_class_name')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function extract_class_name(string $full_class_name): string
    {
        
        return !empty($full_class_name) ? Str::of($full_class_name)->match('/[^\\\\]+$/')->snake() : '';

    }
}


if (!function_exists('format_cpf_cnpj')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function format_cpf_cnpj(string $cpf_cnpj): string
    {
        
        $CPF_LENGTH = 11;
        $cnpj_cpf_only_digits = preg_replace("/\D/", '', $cpf_cnpj);

        if (strlen($cnpj_cpf_only_digits) === $CPF_LENGTH) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf_only_digits);
        }

        return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf_only_digits);

    }
}