<?php

use App\Models\Admin\Clinica;

if (!function_exists('getMenuActivo')) {
    function getMenuActivo($ruta)
    {
        if (request()->is($ruta) || request()->is($ruta . '/*')) {
            return 'active';
        } else {
            return '';
        }
    }
}
class MyHelper {
    public static function Datos_Clinica(){
        $clinica = Clinica::findOrfail(1);
        return $clinica;
    }
}