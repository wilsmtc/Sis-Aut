<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionMenu extends FormRequest
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
            'nombre' => 'required|min:3|max:30|unique:menu,nombre,'. $this->route('id'),
            'url' => 'required|max:50|unique:menu,url,'. $this->route('id'), 
            'icono' => 'nullable|max:20'
            ];
        }   
        else{           
            return [
                //para crear
                'nombre' => 'required|max:30|unique:menu,nombre',
                'url' => 'required|max:50|unique:menu,url',   
                'icono' => 'nullable|max:20'
            ];
        }
    }
    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el nombre del Menú',
            'nombre.min' => 'El nombre del Menú debe ser mas largo (3 caracteres)',
            'nombre.max' => 'El nombre del Menú debe ser mas corto (30 caracteres)',
            'nombre.unique' => 'El nombre del Menú ya ha sido tomado',
            'url.required' => 'Olvidaste el Url',
            'url.max' => 'El Url debe ser mas corto (50 caracteres)',
            'url.unique' => 'El Url ya ha sido tomado',
            'icono.max' => 'El Icono debe ser mas corto (20 caracteres)'
        ];
    }
    
}
