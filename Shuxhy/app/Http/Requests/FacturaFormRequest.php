<?php

namespace Shuxhy\Http\Requests;

use Shuxhy\Http\Requests\Request;

class FacturaFormRequest extends Request
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
            'TotalFacturado'=>'required',
            'FormaPago'=>'required',
        ];
    }
}
