<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingAddress extends FormRequest
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
            'first_name'    => 'required|min:3',
            'last_name'     => 'nullable',
            'email'         => 'required|min:3',
            'phone'         => 'required|min:3',
            'address_line_1'=> 'required|min:3',
            'address_line_2'=> 'nullable',
            'city'          => 'required|min:3',
            'county'        => 'nullable',
            'country'       => 'nullable',
            'postal_code'   => 'required|min:3',
            'payment_method'=> 'nullable',
            'imei'          => 'nullable',
            'message'       => 'nullable',

            'account_holder_name'       => 'nullable',
            'account_number'            => 'nullable',
            'account_short_code'        => 'nullable',
            ];
    }
}
