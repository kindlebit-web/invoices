<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\EmailUniqueRule;

class CustomerRequest extends FormRequest
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
            'customer_name'     => 'required|string',    
            'customer_email'    => ['required', 'email', new EmailUniqueRule],
            'customer_phone'    => 'nullable|sometimes|string',
            'customer_location' => 'nullable|sometimes|string',
            'customer_city'     => 'nullable|sometimes|string',
            'customer_id'       => 'nullable|sometimes|string',
            'customer_zip'      => 'nullable|sometimes|string',
            'customer_country'  => 'nullable|sometimes|string'
        ];
    }
}
