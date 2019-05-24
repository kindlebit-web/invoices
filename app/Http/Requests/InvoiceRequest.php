<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'customer_id' => 'required|string',
            'number'      => 'required|string',
            'tax'         => 'required|string',
            'status'      => 'required|string',
            'notes'       => 'required|string',
            'items'       => 'required'
        ];
    }
}
