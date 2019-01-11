<?php

namespace Shuxhy\Http\Requests;

use Shuxhy\Http\Requests\Request;

class ComboFormRequest extends Request
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
            
            'Nombre'=>'required|max:60',
            'Descripcion'=>'max:150',
            'Descuento'=>'required|max:60'
            

        ];
    }
}
