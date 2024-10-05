<?php

use Cknow\Money\Money;

if (!function_exists('percent_parser')) {

    /**
     * Parse a formatted percent number to float
     *
     * @param string
     * @return float
     */
    function percent_parser(?string $number)
    {

        if(is_null($number) || empty($number))
        {
            return null;
        }

        $cleaned_number = preg_replace('/[^\d,]/i', '', $number);  
        $float_format = str_replace(',', '.', $cleaned_number);

        return floatval( $float_format );
    }
}

if (!function_exists('money_format')) {

    /**
     * Parse a formatted percent number to float
     * 14584 -> 14584,00 
     * @param string already float converted number
     * @return string
     */
    function money_format(?string $number): string
    {

        if(is_null($number) || empty($number))
        {
            return '0,00';
        }

        if(!str_contains($number, ','))
        {
            $number = $number . ',00';
        }

        return $number;
    }
}