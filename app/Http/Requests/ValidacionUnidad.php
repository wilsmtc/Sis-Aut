<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionUnidad extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->route('id')){
            return [
                //editar
                'nombre' => 'required|max:50|unique:unidades,nombre,'. $this->route('id'),
                'sigla' => 'required|max:10|unique:unidades,sigla,'. $this->route('id'),
                'descripcion' => 'nullable|max:250'
            ];
        }
        else{
           return [
               //crear
                'nombre' => 'required|max:50|unique:unidades,nombre',
                'sigla' => 'required|max:10|unique:unidades,sigla',
                'descripcion' => 'nullable|max:250'
            ]; 
        }
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Olvidaste el Nombre de la Unidad',
            'nombre.max' => 'El nombre de la Unidad debe ser mas corto (50 caracteres)',
            'nombre.unique' => 'El nombre de la Unidad ya ha sido tomado',
            'sigla.required' => 'Olvidaste la Sigla de la Unidad',
            'sigla.max' => 'La sigla de la Unidad debe ser mas corta (10 caracteres)',
            'sigla.unique' => 'La sigla de la Unidad ya ha sido tomado',
            'descripcion.max' => 'La descripción debe ser mas corta (250 caracteres)'
        ];
    }
}
