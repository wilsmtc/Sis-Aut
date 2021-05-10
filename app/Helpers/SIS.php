<?php

use App\Models\Admin\Clinica;
use App\Models\Admin\Consulta;
use App\Models\Admin\Paciente;
use App\Models\Admin\Servicio;
use App\Models\Admin\Usuario;

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

    public static function Edad_Paciente($fecha,$aux){
        $fecha_actual = new \DateTime();
        $fecha_nac =  new \DateTime($fecha);
        $diferencia = $fecha_actual->diff($fecha_nac);
        $edad = array(
            "y" => " años ",
            "m" => " meses ",
            "d" => " dias ",
        );
        if($diferencia->y==1)
            $edad["y"]=" año ";
        if($diferencia->m==1)
            $edad["m"]=" mes ";
        if($diferencia->d==1)
            $edad["d"]=" dia ";

        if($aux=="index"){
            if($diferencia->y>0)
                $edad=$diferencia->y.$edad["y"];
            else
                if($diferencia->m>0)
                    $edad=$diferencia->m.$edad["m"];
                else
                    $edad=$diferencia->d.$edad["d"];
            return $edad;
        }
        else{
            if($diferencia->y==0)
                if($diferencia->m==0)
                    $edad=$diferencia->d.$edad["d"];
                else
                    if($diferencia->d==0)
                        $edad=$diferencia->m.$edad["m"];
                    else
                        $edad=$diferencia->m.$edad["m"]." y ".$diferencia->d.$edad["d"]; 
            else
                if($diferencia->m==0)
                    if($diferencia->d==0)
                        $edad=$diferencia->y.$edad["y"];
                    else
                        $edad=$diferencia->y .$edad["y"]." y ".$diferencia->d.$edad["d"];  
                else
                    if($diferencia->d==0)
                        $edad=$diferencia->y .$edad["y"].$diferencia->m.$edad["m"];
                    else
                        $edad=$diferencia->y .$edad["y"].$diferencia->m.$edad["m"]." y ".$diferencia->d.$edad["d"];      
            return $edad; 
        }       
    }

    public static function Datos_Paciente($id){
        $paciente = Paciente::findOrfail($id);
        return $paciente;
    }
    public static function Datos_Servicio($id){
        $servicio = Servicio::findOrfail($id);
        return $servicio;
    }

    public static function Usuarios_Pendientes(){
        $usuarios = Usuario::where('estado',2)->get();
        return $usuarios;
    }
}