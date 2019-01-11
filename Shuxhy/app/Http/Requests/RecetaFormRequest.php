<?php

namespace Shuxhy\Http\Requests;

use Shuxhy\Http\Requests\Request;

class RecetaFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre'=>'required|max:25',
            'Descripcion'=>'max:150',
            'Equipo'=>'max:100',
            'TiempoPreparacion'=>'max:50',
            'IdProducto' => 'required|unique:receta',
        ];
    }
}
