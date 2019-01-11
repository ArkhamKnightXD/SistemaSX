<?php

namespace Shuxhy\Http\Requests;

use Shuxhy\Http\Requests\Request;

class ClienteFormRequest extends Request
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
            'Nombre'=>'required|max:15',
            'Telefono'=>'required|numeric',
            'Direccion'=>'max:150',
            'Comentario'=>'max:150',
            'UsuarioIG'=>'max:20',
            
        ];
    }
}
