<?php
namespace App\Classes;

use URL;

/**
 * Class Common
 * @package App\Classes
 *
 * Default library for current project
 */
class Common
{

    /**
     * Obtiene el dígito verificador de un rut
     *
     * @param int $rut El rut, en forma de entero (int).
     * @return string El dígito verificador como string.
     */
    public static function getCheckDigit($rut)
    {
        $s=1;
        for ($m=0;$rut!=0;$rut/=10){
            $s=($s+$rut%10*(9-$m++%6))%11;
        }
        return chr($s?$s+47:75);
    }

    /**
     * Obtiene el rut en corma de string con formato (e.g. 15.214.336-k)
     *
     * @param int $rut El rut, en forma de entero (int).
     * @return string El rut con el formato adecuado, en forma de string.
     */
    public static function getFormattedRut($rut)
    {
        $dv = self::getCheckDigit($rut);
        return str_replace(',', '.', number_format($rut)).'-'.$dv;
    }

    /**
     * Obtiene el formato adecuado para representar cantidades de dinero, para el formato chileno
     * (e.g. $15.326).
     *
     * @param int $amount El monto a convertir
     * @return string El monto en forma de string con formato
     */
    public static function getFormattedAmount($amount)
    {
        return '$'.str_replace(',', '.', number_format($amount));
    }

}