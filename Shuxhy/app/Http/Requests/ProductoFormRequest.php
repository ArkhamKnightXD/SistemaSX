<?php

namespace Shuxhy\Http\Requests;

use Shuxhy\Http\Requests\Request;

class ProductoFormRequest extends Request
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
            'Nombre'=>'required|max:50',
            'Precio'=>'required|numeric|min:1',
            //'CostoProduccion'=>'required|numeric|min:1',
            'Descripcion'=>'max:256'
        ];
    }
}
