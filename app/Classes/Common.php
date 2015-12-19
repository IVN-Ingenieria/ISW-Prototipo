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

    /*
     * <li class="active"><a href="{{URL::to('home')}}">Inicio <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Usuarios </a></li>
                    <li><a href="{{URL::to('report')}}">Reportes </a></li>
                    <li><a href="#">Administración </a></li>
     */
    public static function getNavMenuObject($active)
    {
        $menu = '';
        $template = '<li%ACTIVE%><a href="%URL%">%LABEL%</a>%CURRENT%</li>';
        $elements = array(
            ['inicio', URL::to('home')],
            ['usuarios', '#'],
            ['reportes', URL::to('report')],
            ['administración', '#']
        );
        foreach ($elements as $key => $value) {
            $tag = $template;
            if ($active == $key) {
                $tag = str_replace('%ACTIVE%', ' class="active"', $tag);
                $tag = str_replace('%CURRENT%', '<span class="sr-only">(current)</span>', $tag);
            } else {
                $tag = str_replace('%ACTIVE%', '', $tag);
                $tag = str_replace('%CURRENT%', '', $tag);
            }
            $tag = str_replace('%URL%', $value[1], $tag);
            $tag = str_replace('%LABEL%', $value[0], $tag);
            $menu .= $tag;
        }
        return $menu;
    }
}