<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class ProductPriceRequest extends FormRequest
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
            'product_id' => 'required|numeric',
            'price' => 'required|numeric',
            'special_price' => 'nullable|numeric',
            'special_price_start' => 'required_with:special_price',
            'special_price_end' => 'required_with:special_price'
        ];
    }
}
