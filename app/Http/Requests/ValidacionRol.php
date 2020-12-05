<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionRol extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->route('id')){
            return [
            //para editar
            'rol' => 'required|max:50|unique:roles,rol,'. $this->route('id')
            ];
        }   
        else{           
            return [
                //para crear
                'rol' => 'required|max:50|unique:roles,rol'
            ];
        }
    }
    public function messages()
    {
        return [
            'rol.required' => 'Olvidaste el Nombre de Rol',
            'rol.max' => 'El Nombre de Rol debe ser mas corto (50 caracteres)',
            'rol.unique' => 'El Nombre de Rol ya ha sido tomado',
        ];
    }
}
