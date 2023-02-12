<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckout extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
        
        'user_id' => 'nullable|exists:users,user_id',
        'address' => 'required',
        'deliveryType' => 'required|in:sdek,post',
        'name' => 'bail|alpha|required|max:50|string',
        'surname' => 'alpha_dash|required|max:50|string',
        'middle_name' => 'alpha|required|max:50|string',
        'telephone' => 'integer'
    
        ];
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'deliveryType.required' => 'Выберите тип доставки',
            'address.required' => 'Заполните адрес доставки',
        ];
    }
}
