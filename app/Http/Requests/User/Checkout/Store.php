<?php

namespace App\Http\Requests\User\Checkout;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $expiredValidation = now()->format('Y-m');
        // $expiredValidation = date('Y-m', time());
        
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . Auth::id() . ',id',
            'occupation' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'discount_code' => 'nullable|string|min:1|max:5|exists:discounts,code,deleted_at,NULL',
            // 'card_number' => 'required|numeric|digits_between:8,16',
            // 'expired' => 'required|date|date_format:Y-m|after_or_equal:' . $expiredValidation,
            // 'cvc' => 'required|numeric|digits:3'
        ];
    }
}
